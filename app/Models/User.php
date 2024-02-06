<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guard_name = "api";
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function upVotes()
    {
        return $this->hasMany(UpVote::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function media()
    {
        return $this->morphToMany(Media::class, 'model', 'model_has_media');
    }
    public function findForPassport(string $username): User
    {
        return $this
            ->where('phone', $username)
            ->orWhere('email', $username)
            ->first();
    }
    public function validateForPassportPasswordGrant(string $password): bool
    {
        return (
            Hash::check($password, $this->password)
            ||
            Hash::check($password, $this->verify_code)
        );
    }
}
