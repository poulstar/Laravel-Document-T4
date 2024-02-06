<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Enum\Roles;
use App\Models\Media;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        # First User
        $user = User::create([
            'name' => 'root',
            'email' => 'root@root.com',
            'phone' => '09123456789',
            'password' => Hash::make('root')
        ]);
        $user->assignRole(Role::findByName(Roles::ADMIN, 'api'));
        $media = new Media([
            'size' => 298124,
            'mime_type' => 'image/png',
            'url' => 'default-image/Avatar.png'
        ]);
        $media->user()->associate($user->id);
        $media->save();

        $user->media()->sync($media, [ 'create_at' => Carbon::now()]);
        $user->save();
        # Second User
        $user = User::create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'phone' => '09223456789',
            'password' => Hash::make('123456')
        ]);
        $user->assignRole(Role::findByName(Roles::USER, 'api'));
        $media = new Media([
            'size' => 298124,
            'mime_type' => 'image/png',
            'url' => 'default-image/Avatar.png'
        ]);
        $media->user()->associate($user->id);
        $media->save();

        $user->media()->sync($media, [ 'create_at' => Carbon::now()]);
        $user->save();
        # Third User
        $user = User::create([
            'name' => 'hassan',
            'email' => 'hassan@gmail.com',
            'phone' => '09323456789',
            'password' => Hash::make('123456')
        ]);
        $user->assignRole(Role::findByName(Roles::USER, 'api'));
        $media = new Media([
            'size' => 298124,
            'mime_type' => 'image/png',
            'url' => 'default-image/Avatar.png'
        ]);
        $media->user()->associate($user->id);
        $media->save();

        $user->media()->sync($media, [ 'create_at' => Carbon::now()]);
        $user->save();
        # Fourth User
        $user = User::create([
            'name' => 'hossein',
            'email' => 'hossein@gmail.com',
            'phone' => '09423456789',
            'password' => Hash::make('123456')
        ]);
        $user->assignRole(Role::findByName(Roles::USER, 'api'));
        $media = new Media([
            'size' => 298124,
            'mime_type' => 'image/png',
            'url' => 'default-image/Avatar.png'
        ]);
        $media->user()->associate($user->id);
        $media->save();

        $user->media()->sync($media, [ 'create_at' => Carbon::now()]);
        $user->save();
        # Fifth User
        $user = User::create([
            'name' => 'sajjad',
            'email' => 'sajjad@gmail.com',
            'phone' => '09523456789',
            'password' => Hash::make('123456')
        ]);
        $user->assignRole(Role::findByName(Roles::USER, 'api'));
        $media = new Media([
            'size' => 298124,
            'mime_type' => 'image/png',
            'url' => 'default-image/Avatar.png'
        ]);
        $media->user()->associate($user->id);
        $media->save();

        $user->media()->sync($media, [ 'create_at' => Carbon::now()]);
        $user->save();
        # Sixth User
        $user = User::create([
            'name' => 'farhad',
            'email' => 'farhad@gmail.com',
            'phone' => '09623456789',
            'password' => Hash::make('123456')
        ]);
        $user->assignRole(Role::findByName(Roles::USER, 'api'));
        $media = new Media([
            'size' => 298124,
            'mime_type' => 'image/png',
            'url' => 'default-image/Avatar.png'
        ]);
        $media->user()->associate($user->id);
        $media->save();

        $user->media()->sync($media, [ 'create_at' => Carbon::now()]);
        $user->save();
        # Seventh User
        $user = User::create([
            'name' => 'naghme',
            'email' => 'naghme@gmail.com',
            'phone' => '09723456789',
            'password' => Hash::make('123456')
        ]);
        $user->assignRole(Role::findByName(Roles::USER, 'api'));
        $media = new Media([
            'size' => 298124,
            'mime_type' => 'image/png',
            'url' => 'default-image/Avatar.png'
        ]);
        $media->user()->associate($user->id);
        $media->save();

        $user->media()->sync($media, [ 'create_at' => Carbon::now()]);
        $user->save();
        # Eighth User
        $user = User::create([
            'name' => 'aryan',
            'email' => 'aryan@gmail.com',
            'phone' => '09823456789',
            'password' => Hash::make('123456')
        ]);
        $user->assignRole(Role::findByName(Roles::USER, 'api'));
        $media = new Media([
            'size' => 298124,
            'mime_type' => 'image/png',
            'url' => 'default-image/Avatar.png'
        ]);
        $media->user()->associate($user->id);
        $media->save();

        $user->media()->sync($media, [ 'create_at' => Carbon::now()]);
        $user->save();
        # Ninth User
        $user = User::create([
            'name' => 'vahid',
            'email' => 'vahid@gmail.com',
            'phone' => '09923456789',
            'password' => Hash::make('123456')
        ]);
        $user->assignRole(Role::findByName(Roles::USER, 'api'));
        $media = new Media([
            'size' => 298124,
            'mime_type' => 'image/png',
            'url' => 'default-image/Avatar.png'
        ]);
        $media->user()->associate($user->id);
        $media->save();

        $user->media()->sync($media, [ 'create_at' => Carbon::now()]);
        $user->save();
        # Tenth User
        $user = User::create([
            'name' => 'toba',
            'email' => 'toba@gmail.com',
            'phone' => '09133456789',
            'password' => Hash::make('123456')
        ]);
        $user->assignRole(Role::findByName(Roles::USER, 'api'));
        $media = new Media([
            'size' => 298124,
            'mime_type' => 'image/png',
            'url' => 'default-image/Avatar.png'
        ]);
        $media->user()->associate($user->id);
        $media->save();

        $user->media()->sync($media, [ 'create_at' => Carbon::now()]);
        $user->save();
    }
}
