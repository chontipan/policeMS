<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AddressOriginal extends Model {
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'addressoriginal';
    protected $fillable = array('original_address','original_tel','created_at','updated_at');
    public function criminalhistory()
    {
        return $this->hasOne('App\Models\CriminalHistory');
    }
    public function guesthistory()
    {
        return $this->hasOne('App\Models\GuestHistory');
    }



}