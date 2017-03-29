<?php namespace App\Handlers\Events;

use App\Events\PrintPdfDataPersonGeneralEvent;

use App\Models\MyLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use \Auth;
class PrintPdfDataPersonGeneralHandler {

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
	 * @param  PrintPdfDataPersonGeneralEvent  $event
	 * @return void
	 */
	public function handle(PrintPdfDataPersonGeneralEvent $event)
	{
        $guesthistory = $event->guesthistory;
        $user= Auth::user();
        $rank = $user->rank->rank;

        $str = "ตำรวจ ID ที่ : $user->id ยศ : $rank ชื่อ : $user->name_police นามสกุล : $user->surname_police
        ได้พิมพ์ประวัติบุคคลทั่วไป ID ที่ : $guesthistory->id ชื่อ : $guesthistory->name นามสกุล : $guesthistory->surname";

        $myLog= new MyLog();
        $myLog->details = $str;
        $myLog->save();
	}

}
