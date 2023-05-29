<?php

class Order
{
    private $_db,
        $_data;

    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert('app_order', $fields)) {
            print_r($this->_db->errorInfo());
            throw new Exception($this->_db->errorInfo());
        }
    }

    public function find($order = null)
    {
        if ($order) {
            $data = $this->_db->get('app_order', array('id', '=', $order));

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

    public function update($fields = array(), $id = null)
    {
        if (!$this->_db->update('app_order', $id, $fields)) {
            throw new Exception('There was a problem updating.');
        }
    }

    public function delete($id = null)
    {
        if (!$this->_db->delete('app_order', array('id', '=', $id))) {
            throw new Exception('There was a problem deleting.');
        }
    }

    public function get_current_order()
    {
        if (Session::exists('order_number')) {
            $order_number = Session::get('order_number');
            $order = $this->find($order_number);
            if ($order) {
                return $this->data();
            }
        }
        return false;
    }

    public function recalculate($order_id)
    {
        $order = new Order();
        $order->find($order_id);
        $order_items = new OrderItem();
        $order_items->get($order_id);
        $total = 0;
        foreach ($order_items->data() as $item) {
            $total += $item->price * $item->quantity;
        }
        $order->update(array('total_price' => $total), $order_id);
    }


    public function last_order()
    {
        $data = $this->_db->query("SELECT * FROM app_order ORDER BY id DESC LIMIT 1");
        if ($data->count()) {
            $this->_data = $data->first();
            return true;
        }
        return false;
    }

    public function get_user_orders($user_id)
    {
        $data = $this->_db->query("SELECT * FROM app_order WHERE user_id = ?", array($user_id));
        if ($data->count()) {
            $this->_data = $data->results();
            return true;
        }
        return false;
    }
}
