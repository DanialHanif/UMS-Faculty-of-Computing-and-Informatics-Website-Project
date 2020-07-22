<?php

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class EventModel extends \CodeIgniter\Model
{

    protected $table = 'events';
    protected $primaryKey = 'eventid';

    protected $allowedFields = ['eventid', 'title', 'body', 'slug', 'staffNumber', 'date'];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllEvent()
    {
        $db = db_connect();
        $query = $db->table('events')->get();

        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function getEventByCondition($condition)
    {

        $db = db_connect();
        $query = $db->table('events')->getWhere([$condition]);
        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function addNewEvent($data)
    {
        $db = db_connect();
        $db->transStart();
        $db->table('events')->insert($data);
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

    public function updateEvent($id, $data)
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
    
    public function deleteEvent($id)
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
    public function getEventData($id)
    {
        $query = $this->find($id);
        if (!is_null($query)) {
            return $query;
        } else {
            return false;
        }
    }
}
