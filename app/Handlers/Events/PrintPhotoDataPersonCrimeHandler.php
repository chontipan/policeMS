<?php namespace App\Handlers\Events;

use App\Events\PrintPhotoDataPersonCrimeEvent;

use App\Models\MyLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use \Auth;
class PrintPhotoDataPersonCrimeHandler {

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
	 * @param  PrintPhotoDataPersonCrimeEvent  $event
	 * @return void
	 */
	public function handle(PrintPhotoDataPersonCrimeEvent $event)
	{
        $criminalHistory = $event->criminalhistory;
        $user= Auth::user();
        $rank = $user->rank->rank;

        $str = "ตำรวจ ID ที่ : $user->id ยศ : $rank ชื่อ : $user->name_police นามสกุล : $user->surname_police
        ได้สั่งพิมพ์รูปภาพบุคคลที่เกี่ยวข้องกับอาชญากรรม ID ที่ : $criminalHistory->id ชื่อ : $criminalHistory->name นามสกุล : $criminalHistory->surname";

        $myLog= new MyLog();
        $myLog->details = $str;
        $myLog->save();
	}

}
