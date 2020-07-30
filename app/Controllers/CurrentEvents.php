<?php

namespace App\Controllers;

use EventModel;

class CurrentEvents extends BaseController
{
	public function index()
	{
		if (session()->get('logged_in')) {

			echo view('header_logged');
		} else {
			echo view('header');
		}

		$events = new EventModel;
		$data['events'] = $events->getAllEvent(5);

		echo view('events_view', $data);
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
