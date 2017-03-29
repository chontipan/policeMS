<?php namespace App\Events;

use App\Events\Event;

use App\Models\CriminalHistory;
use Illuminate\Queue\SerializesModels;

class EditDataPersonCrimeEvent extends Event {

	use SerializesModels;
    var $criminalhistory;
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(CriminalHistory $criminalhistory)
	{
		$this->criminalhistory = $criminalhistory;
	}

}
