<?php namespace App\Handlers\Events;

use App\Events\DataPersonCrimeEvent;

use App\Events\ViewDataPersonCrimeEvent;
use App\Models\MyLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use \Auth;
class ViewDataPersonCrimeHandler {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  ViewDataPersonCrimeEvent  $event
	 * @return void
	 */
	public function handle(ViewDataPersonCrimeEvent $event)
	{
        $criminalHistory = $event->criminalhistory;
        $user= Auth::user();
        $rank = $user->rank->rank;

        $str = "ตำรวจ ID ที่ : $user->id ยศ : $rank ชื่อ : $user->name_police นามสกุล : $user->surname_police
        ได้เข้าดูประวัติบุคคลที่เกี่ยวข้องกับอาชญากรรม ID ที่ : $criminalHistory->id ชื่อ : $criminalHistory->name นามสกุล : $criminalHistory->surname";

        $myLog= new MyLog();
        $myLog->details = $str;
        $myLog->save();
	}

}
