<?php

class ProductImage
{
    private $_db, $_data;

    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public function getAll($product = null)
    {
        if ($product) {
            $field = (is_numeric($product)) ? 'product_id' : 'name';
            $data = $this->_db->get('product_image', array($field, '=', $product));
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
