<?php
include "./php/models/DB.php";

class Card
{
    public $image;
    public $title;
    public $gender;
    public $age;
    public $price;


    public function __construct($id = null, $image = null, $title = null, $gender = null, $age = null, $price = null)
    {
        $this->id = $id;
        $this->image = $image;
        $this->title = $title;
        $this->gender = $gender;
        $this->age = $age;
        $this->price = $price;
    }

    public static function all()
    {
        $cards = [];
        $db = new DB();
        $query = "SELECT * FROM `cards`";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $cards[] = new Card($row['id'], $row['picture'], $row['title'], $row['gender'], $row['age'], $row['price']);
        }
        $db->conn->close();
        return $cards;
    }





}
?>