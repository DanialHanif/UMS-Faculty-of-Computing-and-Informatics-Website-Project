<?php

namespace App\Controllers;

use CustomerModel;

class Login extends BaseController
{

	public function __construct()
	{
		helper(['form', 'url']);
	}

	public function index()
	{
		if (session()->get('logged_in')) {

			echo view('header_logged');
		} else {
			echo view('header');
		}
		echo view('loginform_view');
		echo view('footer');
	}


	public function verifyUser()
	{

		$model = new CustomerModel;
		$rules = [
			'cEmail' 		=> ['label' => 'Login Email', 'rules' => 'trim|required|valid_email'],
			'cPassword' 	=> ['label' => 'Login Password', 'rules' => 'trim|required|min_length[6]|max_length[20]']
		];

		if (!$this->validate($rules)) {
			$data['validation'] = $this->validator;
		} else {
			$data['email'] = $this->request->getPost('cEmail');
			$data['password'] = $this->request->getPost('cPassword');
			$cNumber = $this->checkDatabase($data['email'], $data['password']);
			if(is_bool($cNumber)){
				return redirect()->to('/lab6/public/Login');	
			}
			else{
			
				return redirect()->to('/lab6/public/Dashboard');
			}
		}
		echo view('header');
		echo view('loginform_view', $data);
		echo view('footer');
	}

	public function checkDatabase($email, $password){

        $model = new CustomerModel;
        $result = $model->verifyLogin($email, $password);

        if(!is_bool($result)){

			$data = [

				'id' => $result->getRow()->customerNumber,
				'name' => $result->getRow()->customerName,
				'firstName' => $result->getRow()->contactFirstName,
				'email' => $email

			];

			session()->set('logged_in', $data);
			return $data['id'];

		}else{

			session()->setFlashdata('login_status', 'Login error. Please check your login details!');
			return false;

		}

		

    }
	//--------------------------------------------------------------------

}
