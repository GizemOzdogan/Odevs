<?php

class OrderItem extends Order
{
    private $_db,
        $_data;

    public function __construct($order = null)
    {
        $this->_db = Database::getInstance();
    }

    // get 
    public function get($order_id)
    {
        $data = $this->_db->get('app_order_items', array('order_id', '=', $order_id));

        if ($data->count()) {
            $this->_data = $data->results();
            return true;
        }
        return false;
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert('app_order_items', $fields)) {
            throw new Exception('There was a problem creating an order item.');
        }
    }

    public function update($fields = array(), $id = null)
    {

        if (!$this->_db->update('app_order_items', $id, $fields)) {

            print_r($this->_db->errorInfo());
            throw new Exception('There was a problem updating an order item.');
        }
    }

    public function delete($id = null)
    {
        if (!$this->_db->delete('app_order_items', array('id', '=', $id))) {
            throw new Exception('There was a problem deleting an order item.');
        }
    }


    public function find($order = null)
    {
        if ($order) {
            $data = $this->_db->get('app_order_items', array('id', '=', $order));

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }



    public function find_with_order_and_product_id($order_id = 0, $product_id = 0)
    {

        $sql = "SELECT * FROM app_order_items WHERE order_id = " . $order_id . " AND product_id = " . $product_id;
        $data = $this->_db->query($sql);

        if ($data->count()) {
            $this->_data = $data->first();
            return true;
        }

        return false;
    }



    public function get_all_with_order_id($order_id = null)
    {
        $sql = "SELECT * FROM app_order_items WHERE order_id = " . $order_id;
        $data = $this->_db->query($sql);
        if ($data->count()) {
            $this->_data = $data->results();
            return true;
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

    public function count()
    {
        return $this->_db->count();
    }
}
