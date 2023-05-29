<?php

class Project
{

    private $_db, $_data;

    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert('project', $fields)) {
            throw new Exception("Unable to create the project.");
        }
    }

    public function update($fields = array(), $id = null)
    {
        if (!$id) {
            throw new Exception('There was a problem updating the project.');
        }

        if (!$this->_db->update('project', $id, $fields)) {
            throw new Exception('Unable to update the project.');
        }
    }


    public function delete($id = null)
    {
        if (!$id) {
            throw new Exception('There was a problem deleting the project.');
        }

        if (!$this->_db->delete('project', array('id', '=', $id))) {
            throw new Exception('Unable to delete the project.');
        }
    }


    public function find($project = null)
    {
        if ($project) {
            $field = (is_numeric($project)) ? 'id' : 'name';
            $data = $this->_db->get('project', array($field, '=', $project));

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }


    public function exists()
    {
        return (!empty($this->_data)) ? true : false;
    }


    public function getAll()
    {
        $data = $this->_db->get('project', array('id', '>', '0'));
        if ($data->count()) {
            $this->_data = $data->results();
            return true;
        }
        return false;
    }


    public function data()
    {
        return $this->_data;
    }
}
