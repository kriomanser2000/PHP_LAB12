<?php
class Product
{
    private $_name;
    private $_count;
    private $_price;
    public function __construct($name, $count, $price)
    {
        $this->_name = $name;
        $this->_count = $count;
        $this->_price = $price;
    }
    public function getName()
    {
        return $this->_name;
    }
    public function getCount()
    {
        return $this->_count;
    }
    public function getPrice()
    {
        return $this->_price;
    }
    public function getTotal()
    {
        return $this->_count * $this->_price;
    }
}