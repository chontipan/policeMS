<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Position extends Model {
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'position';

    public function policeimmigration()
    {
        return $this->hasmany('App\Models\PoliceImmigration');
    }

}