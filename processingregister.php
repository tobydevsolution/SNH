<?php

// collecting the data

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$designation = $_POST['designation'];
$department = $_POST['department'];

$errorArray = [];

//verifying the data validation
    if($firstname == "") {

    $errorArray = "firstname cannot be empty";
    }

    if($lastname == "") {

        $errorArray = "lastname cannot be empty";
        }

print_r($errorArray);