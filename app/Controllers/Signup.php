<?php

namespace App\Controllers;

use CustomerModel;

class Signup extends BaseController
{

	public function __construct()
	{
		helper(['form', 'url']);
	}
	public function index()
	{
		if (session()->get('logged_in')) {

			return redirect()->to('/lab6/public/Home');
		} else {
			echo view('header');
		}
		echo view('signupform_view');
		echo view('footer');
	}

	public function addnew()
	{
		helper(['form', 'url']);
		$model = new CustomerModel();
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
			'cEmail' 		=> ['label' => 'Login Email', 'rules' => 'trim|required|valid_email|is_unique[login.email]', 'errors' => [
                'is_unique' => 'Login email has already signed up! Please enter a different email!'
            ]],
			'cPassword' 	=> ['label' => 'Login Password', 'rules' => 'trim|required|min_length[6]|max_length[20]']
		];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {

				$data['customerName'] = $this->request->getPost('cName');
				$data['contactFirstName'] = $this->request->getPost('cFirstName');
				$data['contactLastName'] = $this->request->getPost('cLastName');
				$data['phone'] = $this->request->getPost('cPhone');
				$data['addressLine1'] = $this->request->getPost('cAddr1');
				$data['addressLine2'] = $this->request->getPost('cAddr2');
				$data['city'] = $this->request->getPost('cCity');
				$data['state'] = $this->request->getPost('cState');
				$data['country'] = $this->request->getPost('cCountry');
				$data['postalCode'] = $this->request->getPost('cPostal');
				$data['email'] = $this->request->getPost('cEmail');
				$data['password'] = password_hash($this->request->getPost('cPassword'), PASSWORD_DEFAULT);

				$model->insertNewCustomer($data);
				$session = session();
				$session->setFlashdata('success', 'Registered Successfully! You may now Login!');
				return redirect()->to('/lab6/public/Login');
				
			}
			echo view('header');
			echo view('signupform_view', $data);
			echo view('footer');

	}

	//--------------------------------------------------------------------

}
