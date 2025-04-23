<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected string $username;
    protected string $password;
    protected string $email;
    protected string $ra;

    protected $table = "user_tbl";
    protected $fillable = array( "username", "password", "email", "ra" );
}
