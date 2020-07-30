<?php

namespace App\Controllers;

use StudentModel;
use StaffModel;

class Login extends BaseController
{

	public function __construct()
	{
		helper(['form', 'url']);
	}

	public function index()
	{
		if (session()->get('logged_in')) {

			return redirect()->to('/lab6/public/Dashboard');
		} else {
			echo view('header');
		}
		echo view('loginform_view');
		echo view('footer');
	}


	public function verifyUser()
	{

		

		$rules = [
			'cEmail' 		=> ['label' => 'Login Email', 'rules' => 'trim|required|valid_email'],
			'cPassword' 	=> ['label' => 'Login Password', 'rules' => 'trim|required|min_length[6]|max_length[20]']
		];

		if (!$this->validate($rules)) {
			$data['validation'] = $this->validator;
		} else {
			$data['email'] = $this->request->getPost('cEmail');
			$data['password'] = $this->request->getPost('cPassword');
			$id = $this->checkDatabase($data['email'], $data['password']);
			if(is_bool($id)){
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

		$rules = [
			'cEmail' 		=> ['label' => 'Login Email', 'rules' => 'trim|is_unique[stafflogin.email]'],
		];

		if (!$this->validate($rules)) {
			$model = new StaffModel;
		} else {
			$model = new StudentModel;
		}
        
        $result = $model->verifyLogin($email, $password);

        if(!is_bool($result)){


			if (isset($result->getRow()->staffNumber)) {
				$data = [
					'id' => $result->getRow()->staffNumber,
					'firstName' => $result->getRow()->staffFirstName,
					'email' => $email,
					'type' => 'staff'
				];
			} else {
				$data = [
					'id' => $result->getRow()->studentNumber,
					'firstName' => $result->getRow()->studentFirstName,
					'email' => $email,
					'type' => 'student'
	
				];
			}

			session()->set('logged_in', $data);
			return $data['id'];

		}else{

			session()->setFlashdata('login_status', 'Login error. Please check your login details!');
			return false;

		}

		

    }
	//--------------------------------------------------------------------

}
