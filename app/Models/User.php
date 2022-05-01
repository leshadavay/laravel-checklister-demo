<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN_ROLE_ID = 1;
    const MANAGER_ROLE_ID = 2;
    const USER_ROLE_ID = 3;

    //php artisan tinker
    //User::create(['name'=>'Manager','email'=>'manager@manager.com','password'=>bcrypt('manager@manager.com'),'role_id'=>2])
    //User::create(['name'=>'User','email'=>'user@user.com','password'=>bcrypt('user@user.com'),'role_id'=>3])


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'website'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /** Custom accessors below
     * usage: $user->is_admin
     * @return bool
     */


    public function getIsAdminAttribute(){
        return $this->role_id == self::ADMIN_ROLE_ID;
    }

    public function getIsManagerAttribute(){
        return $this->role_id == self::MANAGER_ROLE_ID;
    }

    public function getIsUserAttribute(){
        return $this->role_id == self::USER_ROLE_ID;
    }

    //Scope a query to only admin users.
    public function scopeAdmins($query)
    {
        $query->where('role_id',self::ADMIN_ROLE_ID);
    }

    public function scopeManagers($query)
    {
        $query->where('role_id',self::MANAGER_ROLE_ID);
    }

    public function scopeUsers($query)
    {
        $query->where('role_id',self::USER_ROLE_ID);
    }

}
