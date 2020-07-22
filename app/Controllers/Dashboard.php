<?php

namespace App\Controllers;

use CustomerModel;

class Dashboard extends BaseController
{

	
	public function index()
	{
		helper(['form', 'url']);
		if (!session()->get('logged_in')) {
			return redirect()->to('/lab6/public/Home');
		} else {
			echo view('header_logged');
		}
		$model = new CustomerModel();
		$data = $model->getCustomerData(session()->get('logged_in')['id']);
		echo view('customer_main_view', $data);
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
