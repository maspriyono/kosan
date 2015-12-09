<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'houses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'floors_total', 'address', 'picture', 'phone'];

    public function floors() {
        return $this->hasMany('App\Models\Floor');
    }

    protected static function boot() {
        parent::boot();
    }
}
