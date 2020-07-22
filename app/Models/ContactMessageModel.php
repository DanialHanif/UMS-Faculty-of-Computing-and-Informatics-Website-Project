<?php

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class ContactMessageModel extends \CodeIgniter\Model
{

    protected $table = 'contactmessages';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'subject', 'message', 'date'];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllContactMessage()
    {
        $db = db_connect();
        $query = $db->table('contactmessages')->get();

        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function getContactMessageByCondition($condition)
    {

        $db = db_connect();
        $query = $db->table('contactmessages')->getWhere([$condition]);
        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function addNewContactMessage($data)
    {
        $db = db_connect();
        $db->transStart();
        $db->table('contactmessages')->insert($data);
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

    public function updateContactMessage($id, $data)
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
    
    public function deleteContactMessage($id)
    {
        $db = db_connect();
        $db->transStart();
        $this->delete($id);
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
    public function getContactMessageData($id)
    {
        $query = $this->find($id);
        if (!is_null($query)) {
            return $query;
        } else {
            return false;
        }
    }
}
