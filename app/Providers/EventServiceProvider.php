<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
    protected $listen = [
        'App\Events\AddDataPersonCrimeEvent' => [
            'App\Handlers\Events\AddDataPersonCrimeHandler',

        ],
        'App\Events\EditDataPersonCrimeEvent' => [
            'App\Handlers\Events\EditDataPersonCrimeHandler',
        ],
        'App\Events\DeleteDataPersonCrimeEvent' => [
            'App\Handlers\Events\DeleteDataPersonCrimeHandler',
        ],
        'App\Events\ViewDataPersonCrimeEvent' => [
            'App\Handlers\Events\ViewDataPersonCrimeHandler',
        ],
        'App\Events\PrintPdfDataPersonCrimeEvent' => [
            'App\Handlers\Events\PrintPdfDataPersonCrimeHandler',
        ],
        'App\Events\PrintPhotoDataPersonCrimeEvent' => [
            'App\Handlers\Events\PrintPhotoDataPersonCrimeHandler',
        ],
        'App\Events\AddDataPersonGeneralEvent' => [
            'App\Handlers\Events\AddDataPersonGeneralHandler',
        ],
        'App\Events\EditDataPersonGeneralEvent' => [
            'App\Handlers\Events\EditDataPersonGeneralHandler',
        ],
        'App\Events\DeleteDataPersonGeneralEvent' => [
            'App\Handlers\Events\DeleteDataPersonGeneralHandler',
        ],
        'App\Events\ViewDataPersonGeneralEvent' => [
            'App\Handlers\Events\ViewDataPersonGeneralHandler',
        ],
        'App\Events\PrintPdfDataPersonGeneralEvent' => [
            'App\Handlers\Events\PrintPdfDataPersonGeneralHandler',
        ],
        'App\Events\PrintPhotoDataPersonGeneralEvent' => [
            'App\Handlers\Events\PrintPhotoDataPersonGeneralHandler',
        ],
    ];


    /**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		//
	}

}
