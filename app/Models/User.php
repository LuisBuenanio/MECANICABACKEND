<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable 
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $table = 'users';
	protected $primaryKey = 'id';

    public $timestamps = false;
   
    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
    protected $appends = [
        'profile_photo_url',
    ];

    //Relacion de uno a muchos
    public function receta(){
        return $this->hasMany(Receta::class);
    }

    //Relacion de uno a muchos
    public function adminlte_profile_url(){
        return '/user/profile';
    }

    public function groupChats()
    {
        return $this->belongsToMany(GroupChat::class, 'group_chat_members')
            ->withPivot('is_admin', 'mute_notifications', 'status')
            ->withTimestamps();
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_users')->withPivot('isAdmin', 'isCreator');
    }
    
     public function chatrooms()
    {
        return $this->belongsToMany(Chatroom::class, 'chatroom_user')
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function unreadMessages()
    {
        return $this->hasMany(Message::class)
            ->whereNull('read_at');
    }
}
