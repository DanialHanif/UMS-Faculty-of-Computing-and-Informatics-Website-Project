<?php namespace App\Controllers;

class About extends BaseController
{
	public function index()
	{
		if (session()->get('logged_in')) {

			echo view('header_logged');
		} else {
			echo view('header');
		}
		echo view('about_main');
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
