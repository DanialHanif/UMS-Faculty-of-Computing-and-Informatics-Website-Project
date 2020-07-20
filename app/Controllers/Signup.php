<?php

namespace App\Controllers;

use CustomerModel;

class Signup extends BaseController
{

	public function index()
	{
		//view('welcome_message');
		echo view('header');
		echo view('signupform_view');
		echo view('footer');
	}

	public function addnew()
	{
		helper(['form', 'url']);
		$session = session();
		$model = new CustomerModel();
		$data['content'] = "formSignup";
		$rules = [
			'cName' 		=> ['label' => 'Company Name', 'rules' => 'trim|required'],
			'cFirstName'	=> ['label' => 'Contact Person\'s First Name', 'rules' => 'trim|required'],
			'cLastName' 	=> ['label' => 'Contact Person\'s Last Name', 'rules' => 'trim|required'],
			'cPhone' 		=> ['label' => 'Phone', 'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'],
			'cAddr1' 		=> ['label' => 'Addres Line 1', 'rules' => 'trim|required'],
			'cAddr2' 		=> ['label' => 'Addres Line 2', 'rules' => 'trim|required'],
			'cCity' 		=> ['label' => 'City', 'rules' => 'trim|required'],
			'cState' 		=> ['label' => 'State', 'rules' => 'trim|required'],
			'cCountry' 		=> ['label' => 'Country', 'rules' => 'trim|required'],
			'cPostal' 		=> ['label' => 'Post Code', 'rules' => 'trim|required|regex_match[/^[A-Z0-9]/]'],
			'cEmail' 		=> ['label' => 'Login Email', 'rules' => 'trim|required|valid_email'],
			'cPassword' 	=> ['label' => 'Login Password', 'rules' => 'trim|required|min_length[6]|max_length[20]']
		];

		if ($this->request->getMethod() == 'post') {
			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
				echo 'failed';
			} else {

				$data['custName'] = $this->request->getPost('cName');
				$data['custFirstName'] = $this->request->getPost('cFirstName');
				$data['custLastName'] = $this->request->getPost('cLastName');
				$data['custPhone'] = $this->request->getPost('cPhone');
				$data['custAddr1'] = $this->request->getPost('cAddr1');
				$data['custAddr2'] = $this->request->getPost('cAddr2');
				$data['custCity'] = $this->request->getPost('cCity');
				$data['custState'] = $this->request->getPost('cState');
				$data['custCountry'] = $this->request->getPost('cCountry');
				$data['custPostal'] = $this->request->getPost('cPostal');
				$data['custEmail'] = $this->request->getPost('cEmail');
				$data['custPassword'] = $this->request->getPost('cPassword');

				$result = $model->insertNewCustomer($data);
				$data['success'] = $result;
			}
			echo view('header');
			echo view('signupform_view', $data);
			echo view('footer');
		}
	}

	//--------------------------------------------------------------------

}
