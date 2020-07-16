<?php namespace App\Controllers;

class About extends BaseController
{
	public function index()
	{
		//view('welcome_message');
		echo view('header');
		echo view('about_main');
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
