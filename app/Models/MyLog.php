<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MyLog extends Model {


    public $timestamps = true;
    protected $table = 'mylog';
    protected $fillable = ['details'];


}