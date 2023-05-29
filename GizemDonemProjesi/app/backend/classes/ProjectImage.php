<?php

class ProjectImage
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
            $data = $this->_db->get('project_image', array($field, '=', $project));
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
}
