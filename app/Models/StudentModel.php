<?php

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class StudentModel extends \CodeIgniter\Model
{

    protected $table = 'students';
    protected $primaryKey = 'studentNumber';

    protected $allowedFields = ['studentNumber', 'studentLastName', 'studentFirstName','dateofbirth', 'phone', 'addressLine1', 'addressLine2', 'city', 'postalCode', 'country', 'state', 'gender', 'active'];

    public function __construct()
    {

        parent::__construct();
    }

    public function getAllStudents()
    {
        $db = db_connect();
        $query = $db->table('students')->get();

        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function getStudentsByCourse($courseCode)
    {

        $db = db_connect();
        $builder = $db->table('students');
        $builder = $builder->select('students.studentNumber, students.studentFirstName, students.studentLastName');
        $builder = $builder->join('registeredcourses', 'students.studentNumber = registeredcourses.studentNumber');
        $builder = $builder->where('registeredcourses.courseCode', $courseCode);
        $query = $builder->get();

        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function registerNewStudent($data)
    {
        $db = db_connect();
        $db->transStart();
        $newstudentNumber = $db->table('students')->selectMax('studentNumber')->get()->getRow();
        $data['active'] = 1;

        $login = [
            'studentNumber' => $newstudentNumber,
            'email' => $data['email'],
            'password' => $data['password'],
            'active' => $data['active']
        ];
        unset($data['email'], $data['password']);
        $this->insert($data);
        $db->table('studentlogin')->insert($login);
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

    public function updateStudent($id, $data)
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

    public function verifyLogin($email, $password)
    {
        $db = db_connect();
        $sql = $db->table('studentlogin');
        $sql = $sql->select('studetlogin.studentNumber, studentlogin.password, students.studentName, students.studentFirstName');
        $sql = $sql->join('students', 'students.studentNumber = studentlogin.studentNumber');
        $sql = $sql->where('studentlogin.email', $email);
        $sql->limit(1);
        $query = $sql->get();
        if (!is_null($query->getRow())) {
            $passwordHashed = $query->getRowObject()->password;
            $check = password_verify($password, $passwordHashed);
            if ($check) {
                return $query;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getStudentData($id)
    {
        $query = $this->find($id);
        if (!is_null($query)) {
            return $query;
        } else {
            return false;
        }
    }

    public function getStudentByCondition($condition)
    {

        $db = db_connect();
        $query = $db->table('students')->getWhere([$condition]);
        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }
}
