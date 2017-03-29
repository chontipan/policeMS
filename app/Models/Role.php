<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Role extends Model {


    public $timestamps = true;
    protected $table = 'role';
    protected $fillable = ['name', 'description'];

    public function policeimmigration()
    {
        return $this->hasOne('App\Models\PoliceImmigration');
    }

}