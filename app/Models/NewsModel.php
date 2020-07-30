<?php

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class NewsModel extends \CodeIgniter\Model
{

    protected $table = 'news';
    protected $primaryKey = 'newsid';

    protected $allowedFields = ['newsid', 'title', 'body', 'slug', 'staffNumber', 'date'];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllNews($limit)
    {
        $db = db_connect();
        $query = $db->table('news')->get($limit);

        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function getNewsByCondition($condition)
    {

        $db = db_connect();
        $query = $db->table('news')->getWhere([$condition]);
        if (!is_null($query->getRow())) {
            return $query;
        } else {
            return null;
        }
        $db->close();
    }

    public function addNewNews($data)
    {
        $db = db_connect();
        $db->transStart();
        $db->table('news')->insert($data);
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

    public function updateNews($id, $data)
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
    
    public function deleteNews($id)
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
    public function getNewsData($id)
    {
        $query = $this->find($id);
        if (!is_null($query)) {
            return $query;
        } else {
            return false;
        }
    }
}
