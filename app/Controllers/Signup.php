<?php namespace App\Controllers;

class Signup extends BaseController
{

	public function __construct()
	{
		//parent::__construct();

	}

	public function index()
	{
		//view('welcome_message');
		echo view('header');
		echo view('signupform_view');
		echo view('footer');
	}

	public function addnew(){



	}

	//--------------------------------------------------------------------

}
