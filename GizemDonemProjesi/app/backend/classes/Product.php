<?php

class Product
{

    private $_db, $_data;

    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert('product', $fields)) {
            throw new Exception("Unable to create the product.");
        }
    }

    public function update($fields = array(), $id = null)
    {
        if (!$id) {
            throw new Exception('There was a problem updating the product.');
        }

        if (!$this->_db->update('products', $id, $fields)) {
            throw new Exception('Unable to update the product.');
        }
    }


    public function delete($id = null)
    {
        if (!$id) {
            throw new Exception('There was a problem deleting the product.');
        }

        if (!$this->_db->delete('product', array('id', '=', $id))) {
            throw new Exception('Unable to delete the product.');
        }
    }


    public function find($product = null)
    {
        if ($product) {
            $field = (is_numeric($product)) ? 'id' : 'name';
            $data = $this->_db->get('product', array($field, '=', $product));

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

    public function get($id = null)
    {
        if (!$id) {
            throw new Exception('There was a problem getting the product.');
        }

        $data = $this->_db->get('product', array('id', '=', $id));

        if ($data->count()) {
            $this->_data = $data->first();
            return true;
        }
        return false;
    }


    public function getAll()
    {
        $data = $this->_db->get('product', array('id', '>', 0));

        if ($data->count()) {
            $this->_data = $data->results();
            return true;
        }
        return false;
    }
}
