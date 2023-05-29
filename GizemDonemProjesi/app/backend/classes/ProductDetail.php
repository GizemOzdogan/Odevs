<?php


class ProductDetail
{
    private $_db, $_data;

    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public function find($product = null)
    {
        if ($product) {
            $field = (is_numeric($product)) ? 'id' : 'name';
            $data = $this->_db->get('product_detail', array($field, '=', $product));

            if ($data->count()) {
                $this->_data = $data->first();
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
