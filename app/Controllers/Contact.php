<?php namespace App\Controllers;

class Contact extends BaseController
{
	public function index()
	{
		//view('welcome_message');
		echo view('header');
		echo view('contact_main');
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
