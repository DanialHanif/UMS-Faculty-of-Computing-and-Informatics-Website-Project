<?php

namespace App\Controllers;

use ExamModel;

class Exams extends BaseController
{
	public function index()
	{
		if (session()->get('logged_in')) {

			echo view('header_logged');
		} else {
			echo view('header');
		}

		$exams = new ExamModel;
		if ($_SESSION['logged_in']['type'] == 'staff') {
			$data['exams'] = $exams->getAllExam();
		} else {
			$data['exams'] = $exams->getExamByCondition(["studentNumber" => $_SESSION['logged_in']['id']]);
		}
		echo view('exams_view', $data);
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
