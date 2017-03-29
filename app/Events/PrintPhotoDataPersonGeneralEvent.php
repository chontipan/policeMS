<?php namespace App\Events;

use App\Events\Event;

use App\Models\GuestHistory;
use Illuminate\Queue\SerializesModels;

class PrintPhotoDataPersonGeneralEvent extends Event {

	use SerializesModels;
    var $guesthistory;
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(GuestHistory $guesthistory)
	{
		$this->guesthistory = $guesthistory;
	}

}
