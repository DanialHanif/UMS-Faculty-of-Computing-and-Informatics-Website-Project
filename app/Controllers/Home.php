<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		//view('welcome_message');
		echo view('header');
		echo view('content_main');
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
