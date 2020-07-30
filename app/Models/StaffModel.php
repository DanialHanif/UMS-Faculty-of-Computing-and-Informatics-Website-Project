<?php

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class StaffModel extends \CodeIgniter\Model
{

    protected $table = 'staff';
    protected $primaryKey = 'staffNumber';

    protected $allowedFields = ['staffNumber', 'staffLastName', 'staffFirstName','dateofbirth', 'phone', 'officeCode', 'reportsTo', 'jobTitle', 'addressLine1', 'addressLine2', 'city', 'postalCode', 'country', 'state', 'active'];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
        $db = db_connect();
        $query = $db->table('staff')->get();
        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function getDataByCondition($condition)
    {

        $db = db_connect();
        $query = $db->table('staff')->getWhere($condition);
        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function registerNewData($data)
    {
        $db = db_connect();
        $db->transStart();
        $newstaffNumber = $db->table('staff')->selectMax('staffNumber')->get()->getRow()->staffNumber + 1;
        $data['active'] = 1;

        $login = [
            'staffNumber' => $newstaffNumber,
            'email' => $data['email'],
            'password' => $data['password'],
            'active' => $data['active']
        ];

        if($data['reportsTo'] == "") {
            $data['reportsTo'] = NULL;
        }
        unset($data['email'], $data['password']);
        $this->insert($data);
        $db->table('stafflogin')->insert($login);
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

    public function updateData($id, $data)
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

    //to be put in exam
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
        $sql = $db->table('stafflogin');
        $sql = $sql->select('stafflogin.staffNumber, stafflogin.password, staff.staffFirstName');
        $sql = $sql->join('staff', 'staff.staffNumber = stafflogin.staffNumber');
        $sql = $sql->where('stafflogin.email', $email);
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

    public function getData($id)
    {
        $query = $this->find($id);
        if (!is_null($query)) {
            return $query;
        } else {
            return false;
        }
    }
}
