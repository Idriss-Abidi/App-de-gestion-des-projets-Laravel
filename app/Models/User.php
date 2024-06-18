<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'utilisateurs';

      /**
     * The primary key associated with the table.
     *
     * @var string
     */

    protected $primaryKey = 'id';



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom', 'prenom', 'email', 'mdp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'mdp', 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'int',
        'creation' => 'datetime',
        'modification' => 'datetime',
    ];
}
