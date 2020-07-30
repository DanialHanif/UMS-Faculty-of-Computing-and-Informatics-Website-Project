<?php

namespace App\Controllers;

use StaffModel;

class Staff extends BaseController
{
	public function index()
	{
		helper(['form', 'url']);
		if (!session()->get('logged_in') || $_SESSION['logged_in']['type'] != 'staff') {
			return redirect()->to('/lab6/public/Home');
		} else {
			echo view('header_logged');
		}

		$staff = new StaffModel;
		if ($_SESSION['logged_in']['type'] == 'staff') {
			$data['staff'] = $staff->getAllData();
			echo view('staff_view', $data);
			echo view('footer');
		}
	}
	public function search()
	{
		if (!session()->get('logged_in') || $_SESSION['logged_in']['type'] != 'staff') {
			return redirect()->to('/lab6/public/Home');
		} else {
			echo view('header_logged');
		}
		helper(['form', 'url']);
		$staffNumber = $this->request->getPost('staffNumber');

		$staff = new StaffModel;
		if ($_SESSION['logged_in']['type'] == 'staff') {
			$data['staff'] = $staff->getDataByCondition(['staffNumber' => $staffNumber]);
			echo view('staff_view', $data);
			echo view('footer');
		}
	}
	//--------------------------------------------------------------------

}
