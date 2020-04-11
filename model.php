<?php

//$pdo = new PDO('mysql:host=database-teste.ca9jtuep5rwb.us-east-1.rds.amazonaws.com;port=3306;dbname=mvc;charset=UTF8;','rafateste','teste477');
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=mvc;charset=UTF8;','root','root');	
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$models = array(
    "pessoa" => new Table($pdo, "pessoa"),
    "carro" => new Table($pdo, "carro")
);
