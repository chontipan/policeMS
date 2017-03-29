<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Weapon extends Model {
   // use SoftDeletes;

    public $timestamps = true;
    protected $table = 'weapon';
    protected $fillable = array('name_weapon');

    public function datacase()
    {
        return $this->belongsTo('App\Models\DataCase');
    }


}