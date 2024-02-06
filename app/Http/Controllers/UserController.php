<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Actions\SMS;
use App\Http\Requests\RegisterRequest;
use Spatie\Permission\Models\Role;
use App\Enum\Roles;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminCreateUserRequest;
use App\Http\Requests\AdminUpdateUserRequest;

class UserController extends Controller
{
    public function getLoginCode($phone)
    {
        $user = User::where('phone', $phone)->first();
        if (!$user) {
            return $this->failResponse([
                'message' => 'User Not Found'
            ], 403);
        }

        $randomCode = Str::random(4);
        $user->verify_code = Hash::make($randomCode);
        $user->save();
        $state = SMS::sendSMS($user->phone, $user->name, $randomCode);
        if ($state) {
            return $this->successResponse([
                'message' => "Check Your Phone",
            ], 200);
        } elseif (!$state) {
            return $this->failResponse([
                'error' => "your request failed",
            ], 500);
        } else {
            return $this->failResponse([
                'error' => $state,
            ], 500);
        }
    }
    public function register(RegisterRequest $request)
    {
        $check = User::where('email', $request->input('email'))->first();
        if ($check)
            return $this->failResponse([
                'errors' => ['error' => ['This E-Mail Already Exist']],
            ]);
        $data = $request->safe(['name', 'phone', 'email', 'password']);
        $user = new User([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->save();
        $user->assignRole(Role::findByName(Roles::USER, 'api'));
        if ($request->file('avatar'))
            $this->storeUserAvatar($request->file('avatar'), $user->id);
        if ($user) {
            return $this->successResponse([
                'message' => 'User Created',
            ]);
        }
        return $this->failResponse();
    }
    public function profile()
    {
        $user = User::where('id', Auth::id())->with('roles')->with('media')->first();
        if ($user) {
            return $this->successResponse([
                'user' => $user,
                'message' => 'profile',
            ]);
        } else
            return $this->failResponse();
    }
    public function updateMyProfile(UpdateProfileRequest $request, User $user)
    {
        if ($user->id !== Auth::id()) {
            return $this->failResponse([], 403);
        }
        $data = $request->safe(['name', 'phone', 'email', 'password']);

        if ($request->input('name'))
            $user->name = $data['name'];

        if ($request->input('phone') && $request->input('phone') != Auth::user()->phone) {
            if (User::where('phone', $request->input('phone'))->first()) {
                return $this->failResponse([
                    'errors' => ['error' => ['This Phone Already Exist']],
                ]);
            } else {
                $user->phone = $data['phone'];
            }
        }
        if ($request->input('email') && $request->input('email') != Auth::user()->email) {
            if (User::where('email', $request->input('email'))->first()) {
                return $this->failResponse([
                    'errors' => ['error' => ['This E-Mail Already Exist']],
                ]);
            } else {
                $user->email = $data['email'];
            }
        }
        if ($request->input('password'))
            $user->name = Hash::make($data['password']);
        $user->update();

        if ($request->file('avatar'))
            $this->storeUserAvatar($request->file('avatar'), $user->id);
        return $this->successResponse([
            'message' => 'User Updated',
        ]);
    }
    public function allUser()
    {
        $perPage = request()->input('perPage') ?
            request()->input('perPage') : 2;
        $filter = request()->input('filter');
        if (Auth::user()->getRoleNames()[0] !== Roles::ADMIN) {
            return $this->failResponse([], 403);
        }
        $query = User::query()
            ->select([
                'id',
                'name',
                'phone',
                'email'
            ])
            ->when($filter, function (Builder $limit, string $filter) {
                $limit->where(DB::raw('lower(name)'), 'like', '%' . strtolower($filter) . '%');
            })
            ->with('roles')
            ->with('media')
            ->orderBy('id', 'desc');
        $users = $query->paginate($perPage);
        return $this->paginatedSuccessResponse($users, 'users');
    }
    public function createUserByAdmin(AdminCreateUserRequest $request)
    {
        $data = $request->safe(['name', 'phone', 'email', 'password']);
        $user = new User([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->save();
        if ($request->input('role') === 'admin') {
            $user->assignRole(Role::findByName(Roles::ADMIN, 'api'));
        } else {
            $user->assignRole(Role::findByName(Roles::USER, 'api'));
        }
        if ($request->file('avatar'))
            $this->storeUserAvatar($request->file('avatar'), $user->id);
        if ($user) {
            return $this->successResponse([
                'message' => 'User Created',
            ]);
        }
        return $this->failResponse();
    }
    public function updateUserByAdmin(AdminUpdateUserRequest $request, User $user)
    {
        $data = $request->safe(['name', 'phone', 'email', 'password']);
        if ($request->input('name'))
            $user->name = $data['name'];
        if ($request->input('phone') && $request->input('phone') != $user->phone) {
            if (User::where('phone', $request->input('phone'))->first()) {
                return $this->failResponse([
                    'errors' => ['error' => ['This phone Already Exist']],
                ]);
            } else {
                $user->phone = $data['phone'];
            }
        }
        if ($request->input('email') && $request->input('email') != $user->email) {
            if (User::where('email', $request->input('email'))->first()) {
                return $this->failResponse([
                    'errors' => ['error' => ['This E-Mail Already Exist']],
                ]);
            } else {
                $user->email = $data['email'];
            }
        }
        if ($request->input('password'))
            $user->name = Hash::make($data['password']);
        $user->update();
        if ($request->input('role')) {
            DB::table('model_has_roles')->where('model_id', $user->id)->delete();
            if ($request->input('role') === 'admin') {
                $user->assignRole(Role::findByName(Roles::ADMIN, 'api'));
            } else {
                $user->assignRole(Role::findByName(Roles::USER, 'api'));
            }
        }
        if ($request->file('avatar'))
            $this->storeUserAvatar($request->file('avatar'), $user->id);
        if ($user) {
            return $this->successResponse([
                'message' => 'User Updated',
            ]);
        }
        return $this->failResponse();
    }
    public function deleteUserByAdmin(User $user)
    {
        if (Auth::user()->getRoleNames()[0] !== Roles::ADMIN) {
            return $this->failResponse([], 403);
        }
        if ($user->media)
            $this->deleteMedia($user->media);
        if ($user->delete()) {
            return $this->successResponse([
                'message' => 'User Deleted',
            ]);
        }
        return $this->failResponse();
    }
}
