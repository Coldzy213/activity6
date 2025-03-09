<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoginLog extends Model
{
    //
      /** @use HasFactory<\Database\Factories\UserFactory> */
   

      /**
       * The attributes that are mass assignable.
       *
       *
       */
      protected $fillable = [
          'user_id',
          'fullname',
          'email',
          'ip_address',
          'logged_in_at',
      ];
  

}
