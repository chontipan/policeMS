<?php namespace App\Handlers\Events;

use App\Events\PrintPdfDataPersonCrimeEvent;

use App\Models\MyLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use \Auth;
class PrintPdfDataPersonCrimeHandler {

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
	 * @param  PrintPdfDataPersonCrimeEvent  $event
	 * @return void
	 */
	public function handle(PrintPdfDataPersonCrimeEvent $event)
	{
        $criminalHistory = $event->criminalhistory;
        $user= Auth::user();
        $rank = $user->rank->rank;

        $str = "ตำรวจ ID ที่ : $user->id ยศ : $rank ชื่อ : $user->name_police นามสกุล : $user->surname_police
        ได้สั่งพิมพ์ประวัติบุคคลที่เกี่ยวข้องกับอาชญากรรม ID ที่ : $criminalHistory->id ชื่อ : $criminalHistory->name นามสกุล : $criminalHistory->surname";

        $myLog= new MyLog();
        $myLog->details = $str;
        $myLog->save();
	}

}
