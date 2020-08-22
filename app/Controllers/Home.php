<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (session()->get('logged_in')) {

			echo view('header_logged');
		} else {
			echo view('header');
		}

		echo view('content_main');
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
