<?php

namespace App\Controllers;

use CustomerModel;

class Logout extends BaseController
{

	public function __construct()
	{
		helper(['form', 'url']);
	}

	public function index()
	{
		$session = session();
		$session->stop();
		session_destroy();
		return redirect()->to('/lab6/public/Home');
	}


}
