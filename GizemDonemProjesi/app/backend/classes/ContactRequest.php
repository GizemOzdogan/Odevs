<?php


class ContactRequest
{
    private $_db,
        $_data;

    public function __construct($contact_request = null)
    {
        $this->_db = Database::getInstance();
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert('contact_requests', $fields)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function find($contact_request = null)
    {
        if ($contact_request) {
            $field = (is_numeric($contact_request)) ? 'id' : 'name';
            $data = $this->_db->get('contact_requests', array($field, '=', $contact_request));

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

    public function data()
    {
        return $this->_data;
    }
}
