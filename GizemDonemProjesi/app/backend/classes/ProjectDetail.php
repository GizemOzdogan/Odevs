<?php

class ProjectDetail
{
    private $_db, $_data;

    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public function getAll($project = null)
    {
        if ($project) {
            $field = (is_numeric($project)) ? 'project_id' : 'name';
            $data = $this->_db->get('project_detail', array($field, '=', $project));
            if ($data->count()) {
                $this->_data = $data->results();
                return true;
            }
        }
        return false;
    }


    public function data()
    {
        return $this->_data;
    }


    public function insert($fields = array())
    {
        if (!$this->_db->insert('project_detail', $fields)) {
            throw new Exception('There was a problem creating an project detail.');
        }
    }

    public function update($fields = array(), $id = null)
    {
        if (!$this->_db->update('project_detail', $id, $fields)) {
            throw new Exception('There was a problem updating an project detail.');
        }
    }

    public function delete($id = null)
    {
        if (!$this->_db->delete('project_detail', array('project_id', '=', $id))) {
            throw new Exception('There was a problem deleting an project detail.');
        }
    }

    public function find($project = null)
    {
        if ($project) {
            $field = (is_numeric($project)) ? 'project_id' : 'name';
            $data = $this->_db->get('project_detail', array($field, '=', $project));
            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }
}
