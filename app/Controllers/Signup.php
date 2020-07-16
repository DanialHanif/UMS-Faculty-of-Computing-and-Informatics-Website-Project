<?php namespace App\Controllers;

class Signup extends BaseController
{
	public function index()
	{
		//view('welcome_message');
		echo view('header');
		echo view('signupform_view');
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
