<?php

namespace App\Controllers;

use StudentModel;

class Students extends BaseController
{
	public function index()
	{
		helper(['form', 'url']);
		if (!session()->get('logged_in') || $_SESSION['logged_in']['type'] != 'staff') {
			return redirect()->to('/lab6/public/Home');
		} else {
			echo view('header_logged');
		}

		$students = new StudentModel;
		if ($_SESSION['logged_in']['type'] == 'staff') {
			$data['students'] = $students->getAllData();
			echo view('students_view', $data);
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
		$studentNumber = $this->request->getPost('studentNumber');

		$students = new StudentModel;
		if ($_SESSION['logged_in']['type'] == 'staff') {
			$data['students'] = $students->getDataByCondition(['studentNumber' => $studentNumber]);
			echo view('students_view', $data);
			echo view('footer');
		}
	}
	//--------------------------------------------------------------------

}
