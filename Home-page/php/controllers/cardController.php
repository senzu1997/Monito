<?php
include "./php/models/Card.php";

class CardController
{
    public static function index()
    {
        $cards = Card::all();
        return $cards;
    }
}









?>