<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRooms extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'room_id'];
}
