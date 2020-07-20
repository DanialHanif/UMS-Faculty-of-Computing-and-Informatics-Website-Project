<?php

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class CustomerModel extends \CodeIgniter\Model
{


    private $c_addrL1;
    private $c_addrL2;
    private $c_city;
    private $c_cFirstName;
    private $c_cLastName;
    private $c_country;
    private $c_creditLimit;
    private $c_customerName;
    private $c_customerNumber;
    private $c_phone;
    private $c_postalCode;
    private $c_salesRepEmployeeNumber;
    private $c_state;



    public function __construct()
    {

        parent::__construct();
        $this->c_addrL1 = "";
        $this->c_addrL2 = "";
        $this->c_city = "";
        $this->c_cFirstName = "";
        $this->c_cLastName = "";
        $this->c_country = "";
        $this->c_creditLimit = "";
        $this->c_customerName = "";
        $this->c_customerNumber = "";
        $this->c_phone = "";
        $this->c_postalCode = "";
        $this->c_salesRepEmployeeNumber = "";
        $this->c_state = "";
    }

    public function getCustomers($country)
    {
        $db = db_connect();
        $query = $db->query("SELECT customerNumber, customerName, phone, country FROM customers WHERE country=" . $db->escape($country));

        if (!is_null($query->getRow())) {
            foreach ($query->getResult() as $row) {
                echo $row->customerNumber;
                echo $row->customerName;
                echo $row->phone;
                echo $row->country;
                echo '</br>';
            }
        } else {
            echo "No data found!";
        }
        $db->close();
    }

    public function getCustomerByEmployee()
    {

        $db = db_connect();
        $sql = $db->table('customers');
        $sql = $sql->select('contactFirstName, customerName, phone');
        $sql = $sql->join('employees', 'customers.salesRepEmployeeNumber = employees.employeeNumber');
        $query = $sql->get();

        if (!is_null($query->getRow())) {
            foreach ($query->getResult() as $row) {
                echo $row->contactFirstName;
                echo $row->customerName;
                echo $row->phone;
                echo '</br>';
            }
        } else {
            echo "No data found!";
        }
        $db->close();
    }

    public function insertNewCustomer($data)
    {

        $db = db_connect();
        $db->transStart();

        $duplicate = $db->table('login')->where('email', trim($data['custEmail']))->get()->getRow();

        if (is_null($duplicate)) {

            $newCustomerNumber = $db->table('customers')->selectMax('customerNumber')->get()->getRow();

            if ($newCustomerNumber == null) {

                $newCustomerNumber = 10000;
            }else{
                $newCustomerNumber = $newCustomerNumber->customerNumber + 1;
            }

            $value = [

                'customerNumber' => $newCustomerNumber,
                'customerName' => trim($data['custName']),
                'contactFirstName' => trim($data['custFirstName']),
                'contactLastName' => trim($data['custLastName']),
                'phone' => trim($data['custPhone']),
                'addressLine1' => trim($data['custAddr1']),
                'addressLine2' => trim($data['custAddr2']),
                'city' => trim($data['custCity']),
                'state' => trim($data['custState']),
                'postalCode' => trim($data['custPostal']),
                'country' => trim($data['custCountry'])

            ];

            $loginValues = [

                'customerNumber' => $newCustomerNumber,
                'email' => trim($data['custEmail']),
                'password' => sha1($data['custPassword'])

            ];

            $db->table('customers')->insert($value);
            $db->table('login')->insert($loginValues);
        } else {

            $db->transRollback();
            $db->close();
            return false;
        }
        
        
        if ($db->transStatus() === FALSE) {
            
            $db->transComplete();
            $db->close();
            return true;
            //echo 'success!';
            
        } else {
            
            $db->transRollback();
            $db->close();
            return false;
            //echo 'error!';
        }
    }

    public function updateCustomer()
    {

        $limit = "150000";
        $hp = "088320323";
        $id = "500";

        $data = array(
            'creditLimit' => $limit,
            'phone' => $hp
        );

        $condition = array('customerNumber' => $id);
        $db = db_connect();
        $db->table('customers')->where($condition);

        if ($db->table('customers')->update($data)) {

            echo 'Record updated successfully!';
        } else {

            echo 'Error! Record update failed!';
        }

        $db->close();
    }

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

        //inserts current order number into a list of orderdetails
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
}
