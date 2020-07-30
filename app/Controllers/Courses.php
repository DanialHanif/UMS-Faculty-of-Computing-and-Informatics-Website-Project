<?php

namespace App\Controllers;

use CourseModel;

class Courses extends BaseController
{
	public function index()
	{
		if (session()->get('logged_in')) {

			echo view('header_logged');
		} else {
			echo view('header');
		}

		$courses = new CourseModel;
		if ($_SESSION['logged_in']['type'] == 'staff') {
			$data['courses'] = $courses->getAllCourses();
		} else {
			$data['courses'] = $courses->getCoursesByStudent($_SESSION['logged_in']['id']);
		}
		echo view('courses_view', $data);
		echo view('footer');
	}
	
	public function viewAll()
	{
		if (session()->get('logged_in')) {

			echo view('header_logged');
		} else {
			echo view('header');
		}

		$courses = new CourseModel;
			$data['courses'] = $courses->getAllCourses();
		echo view('courses_view', $data);
		echo view('footer');
	}
	//--------------------------------------------------------------------

}
