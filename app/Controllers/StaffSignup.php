<?php

namespace App\Controllers;

use StaffModel;

class StaffSignup extends BaseController
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
		echo view('staff_signupform_view');
		echo view('footer');
	}

	public function addnew()
	{
		helper(['form', 'url']);
		$model = new StaffModel;
		$rules = [
			'cFirstName'	=> ['label' => 'First Name', 'rules' => 'trim|required'],
			'cLastName' 	=> ['label' => 'Last Name', 'rules' => 'trim|required'],
			'cPhone' 		=> ['label' => 'Phone', 'rules' => 'trim|required|regex_match[/^[0-9]{5}$/]'],
			'cAddr1' 		=> ['label' => 'Addres Line 1', 'rules' => 'trim|required'],
			'cAddr2' 		=> ['label' => 'Addres Line 2', 'rules' => 'trim|required'],
			'cCity' 		=> ['label' => 'City', 'rules' => 'trim|required'],
			'cState' 		=> ['label' => 'State', 'rules' => 'trim|required'],
			'cCountry' 		=> ['label' => 'Country', 'rules' => 'trim|required'],
			'officeCode' 		=> ['label' => 'Office', 'rules' => 'trim|required'],
			'reportsTo' 		=> ['label' => 'Supervisor ID', 'rules' => 'trim|permit_empty|is_not_unique[staff.staffNumber]', 'errors' => [
				'is_not_unique' => 'Supervisor ID not found! Please recheck!'
			]],
			'cPostal' 		=> ['label' => 'Post Code', 'rules' => 'trim|required|regex_match[/^[A-Z0-9]/]'],
			'cEmail' 		=> ['label' => 'Login Email', 'rules' => 'trim|required|valid_email|is_unique[stafflogin.email]', 'errors' => [
                'is_unique' => 'Login email has already signed up! Please enter a different email!'
            ]],
			'cPassword' 	=> ['label' => 'Login Password', 'rules' => 'trim|required|min_length[6]|max_length[20]']
		];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {

				$data['staffFirstName'] = $this->request->getPost('cFirstName');
				$data['staffLastName'] = $this->request->getPost('cLastName');
				$data['phone'] = "x".$this->request->getPost('cPhone');
				$data['addressLine1'] = $this->request->getPost('cAddr1');
				$data['addressLine2'] = $this->request->getPost('cAddr2');
				$data['city'] = $this->request->getPost('cCity');
				$data['state'] = $this->request->getPost('cState');
				$data['country'] = $this->request->getPost('cCountry');
				$data['officeCode'] = $this->request->getPost('officeCode');
				$data['reportsTo'] = $this->request->getPost('reportsTo');
				$data['postalCode'] = $this->request->getPost('cPostal');
				$data['email'] = $this->request->getPost('cEmail');
				$data['password'] = password_hash($this->request->getPost('cPassword'), PASSWORD_DEFAULT);

				$model->registerNewData($data);
				$session = session();
				$session->setFlashdata('success', 'Registered Successfully! You may now Login!');
				return redirect()->to('/lab6/public/Login');
				
			}
			echo view('header');
			echo view('staff_signupform_view', $data);
			echo view('footer');

	}
	//--------------------------------------------------------------------

}
