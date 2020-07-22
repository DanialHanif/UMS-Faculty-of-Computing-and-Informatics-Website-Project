<?php

namespace App\Controllers;

use CustomerModel;

class UpdateCustomer extends BaseController
{

	public function __construct()
	{
		helper(['form', 'url']);
	}
	public function index()
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
			'cPostal' 		=> ['label' => 'Post Code', 'rules' => 'trim|required|regex_match[/^[A-Z0-9]/]']
			
		];
		if (!$this->validate($rules)) {
			$data = $model->getCustomerData(session()->get('logged_in')['id']);
			$data['validation'] = $this->validator;
			if (!session()->get('logged_in')) {
				
				return redirect()->to('/lab6/public/Home');
			} else {
				echo view('header');
			}
			echo view('customer_main_view', $data);
			echo view('footer');
		} else {
			
			$cNumber = session()->get('logged_in')['id'];
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

			$status = $model->updateCustomer($cNumber,$data);
			$session = session();
			if($status){
				
				$session->setFlashdata('updatesuccess', 'User information updated successfully!');
				
			}else{
				$session->setFlashdata('updatefailed', 'User information updated successfully!');

			}
			return redirect()->to('/lab6/public/Dashboard');
		}


		//--------------------------------------------------------------------

	}
}
