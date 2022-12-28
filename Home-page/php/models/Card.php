<?php
class Card
{
    public $title;
    public $gender;
    public $age;
    public $price;


    public function __construct($id = null, $title = null, $gender = null, $age = null, $price = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->gender = $gender;
        $this->age = $age;
        $this->price = $price;
    }






}
?>