<?php

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class ExamModel extends \CodeIgniter\Model
{

    protected $table = 'exams';
    protected $primaryKey = 'examNumber';

    protected $allowedFields = ['examNumber', 'examDate', 'status', 'comments', 'studentNumber', 'staffNumber'];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllExam()
    {
        $db = db_connect();
        $query = $db->table('exams')->get();

        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function getExamByCondition($condition)
    {

        $db = db_connect();
        $query = $db->table('exams')->getWhere([$condition]);
        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function addNewExam($data)
    {
        $db = db_connect();
        $db->transStart();
        $db->table('exams')->insert($data);
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

    public function updateExam($id, $data)
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
    
    public function deleteExam($id)
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
    public function getExamData($id)
    {
        $query = $this->find($id);
        if (!is_null($query)) {
            return $query;
        } else {
            return false;
        }
    }
}
