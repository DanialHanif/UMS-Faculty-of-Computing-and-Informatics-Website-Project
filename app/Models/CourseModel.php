<?php

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class CourseModel extends \CodeIgniter\Model
{

    protected $table = 'courses';
    protected $primaryKey = 'courseCode';

    protected $allowedFields = ['courseCode', 'courseName', 'courseDetails', 'availableNumbers'];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCourses()
    {
        $db = db_connect();
        $query = $db->table('courses')->orderBy('courseCode')->get();

        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function getAllRegisteredCourses()
    {
        $db = db_connect();
        $query = $db->table('registeredcourses')->get();

        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function getCoursesByStudent($studentNumber)
    {

        $db = db_connect();
        $builder = $db->table('registeredcourses');
        $builder = $builder->select('registeredcourses.courseCode, courses.courseName');
        $builder = $builder->join('courses', 'courses.courseCode = registeredcourses.courseCode');
        $builder = $builder->where('registeredcourses.courseCode', $studentNumber);
        $query = $builder->get();

        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function registerNewCourse($data)
    {
        $db = db_connect();
        $db->transStart();
        $db->table('registeredcourses')->insert($data);
        if ($db->transStatus() === FALSE) {
            $db->transRollback();
            $db->close();
            return false;
        } else {
            $db->transComplete();
            $db->close();
            return true;
        }
    }

    public function updateCourse($id, $data)
    {
        $db = db_connect();
        $db->transStart();
        $this->update($id, $data);
        if ($db->transStatus() === FALSE) {
            $db->transRollback();
            $db->close();
            return false;
        } else {
            $db->transComplete();
            $db->close();
            return true;
        }
    }

    //to be removed, only staff
    public function insertNewTransaction($data1, $data2)
    {
        $db = db_connect();
        $db->transStart();
        $currentOrderNumber = $db->table('orders')->selectMax('orderNumber')->get()->getRow()->orderNumber + 1;
        $builder = $db->table('orders');
        $builder->set('orderNumber', $currentOrderNumber);
        $builder->set($data1);
        $builder->insert();
        $builder = $db->table('orderdetails');

        for ($i = 0; $i < count($data2); $i++) {
            $data2[$i]['orderNumber'] = $currentOrderNumber;
        }
        $builder->insertBatch($data2);
        $db->transComplete();
        if ($db->transStatus() === FALSE) {

            echo 'Transaction Error Occured!';
        } else {

            echo 'Transaction Success!';
        }
    }

    public function getCourseData($id)
    {
        $query = $this->find($id);
        if (!is_null($query)) {
            return $query;
        } else {
            return false;
        }
    }
}
