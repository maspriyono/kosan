<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'floors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rooms_total', 'house_id'];

    public function rooms() {
        return $this->hasMany('App\Models\Room');
    }

    public function house() {
    	return $this->belongsTo('App\Models\House');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($floor) {
            $floor->rooms()->delete();
        });
    }
}
