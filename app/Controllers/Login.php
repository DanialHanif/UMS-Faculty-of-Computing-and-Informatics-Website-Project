<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		//view('welcome_message');
		echo view('header');
		echo view('loginform_view');
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
