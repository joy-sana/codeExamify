<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Admin_Data extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = "admin_data";
    protected $table = "admin_data";
    protected $primaryKey= "Admin_number";
}
