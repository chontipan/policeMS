<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Rank extends Model {
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'rank';

    public function policeimmigration()
    {
        return $this->hasmany('App\Models\PoliceImmigration');
    }

}