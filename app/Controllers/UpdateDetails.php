<?php

namespace App\Controllers;

use StaffModel;
use StudentModel;

class UpdateDetails extends BaseController
{

	public function __construct()
	{
		helper(['form', 'url']);
	}
	public function index()
	{
		if (!session()->get('logged_in')) {

			return redirect()->to('/lab6/public/Home');
		}

		if ($_SESSION['logged_in']['type'] == "student") {
			$model = new StudentModel;
		} else {
			$model = new StaffModel;
		}
		$data = $model->getData($_SESSION['logged_in']['id']);

		echo view('header_logged');
		echo view('editprofile_view', $data);
		echo view('footer');
	}

	public function update()
	{
		if (!session()->get('logged_in')) {
			return redirect()->to('/lab6/public/Home');
		} else {
			echo view('header_logged');
		}
		helper(['form', 'url']);
		$model = null;

		$rules = [
			'cFirstName'	=> ['label' => 'First Name', 'rules' => 'trim|required'],
			'cLastName' 	=> ['label' => 'Last Name', 'rules' => 'trim|required'],
			'cPhone' 		=> ['label' => 'Phone', 'rules' => 'trim|required|regex_match[/^[0-9]/]'],
			'cAddr1' 		=> ['label' => 'Addres Line 1', 'rules' => 'trim|required'],
			'cAddr2' 		=> ['label' => 'Addres Line 2', 'rules' => 'trim|required'],
			'cCity' 		=> ['label' => 'City', 'rules' => 'trim|required'],
			'cState' 		=> ['label' => 'State', 'rules' => 'trim|required'],
			'cCountry' 		=> ['label' => 'Country', 'rules' => 'trim|required'],
			'cPostal' 		=> ['label' => 'Post Code', 'rules' => 'trim|required|regex_match[/^[A-Z0-9]/]']

		];
		if ($_SESSION['logged_in']['type'] == 'student') {
			$model = new StudentModel;
		} else {
			$model = new StaffModel;
		}


		if (!$this->validate($rules)) {
			$data = $model->getData($_SESSION['logged_in']['id']);
			$data['validation'] = $this->validator;
			echo view('editprofile_view', $data);
			echo view('footer');
		} else {

			if ($_SESSION['logged_in']['type'] == 'staff') {
				$id = session()->get('logged_in')['id'];
				$data['staffFirstName'] = $this->request->getPost('cFirstName');
				$data['staffLastName'] = $this->request->getPost('cLastName');
			} else {
				$id = session()->get('logged_in')['id'];
				$data['studentFirstName'] = $this->request->getPost('cFirstName');
				$data['studentLastName'] = $this->request->getPost('cLastName');
			}

			if ($_SESSION['logged_in']['type'] == 'staff') {
				$data['phone'] = "x" . $this->request->getPost('cPhone');
			} else {
				$data['phone'] = $this->request->getPost('cPhone');
			}
			$data['addressLine1'] = $this->request->getPost('cAddr1');
			$data['addressLine2'] = $this->request->getPost('cAddr2');
			$data['city'] = $this->request->getPost('cCity');
			$data['state'] = $this->request->getPost('cState');
			$data['country'] = $this->request->getPost('cCountry');
			$data['postalCode'] = $this->request->getPost('cPostal');

			$status = $model->updateData($id, $data);
			$session = session();
			if ($status) {
				$_SESSION['logged_in']['firstname'] = $this->request->getPost('cFirstName');
				$session->setFlashdata('updatesuccess', 'User information updated successfully!');
			} else {
				$session->setFlashdata('updatefailed', 'User information failed to update!');
			}
			echo view('editprofile_view', $data);
			echo view('footer');
		}



		//--------------------------------------------------------------------

	}
}
