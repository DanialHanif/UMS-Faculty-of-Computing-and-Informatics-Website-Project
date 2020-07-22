<?php namespace App\Controllers;

class Contact extends BaseController
{
	public function index()
	{
		if (session()->get('logged_in')) {

			echo view('header_logged');
		} else {
			echo view('header');
		}
		echo view('contact_main');
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
