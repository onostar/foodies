<?php

    $connectdb = new PDO("mysql:host=localhost; dbname=foodies", "root", "");
    $connectdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connectdb->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    /* class Connection{
        public $connectdb;

        public function __construct(){
            $this->connectdb = new PDO("mysql:host=localhost; dbname=foodies", "root", "");
            $this->connectdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            

        }

        // check user existence
        public function check_user($users){
            
            $check = $this->$connectdb->prepare("SELECT * FROM users WHERE email = :email");
            $check->bindvalue('email', $users['email']);
            $check->execute();
            // if($check->rowCount() > 0){
            //     $_SESSION['message'] = "user already exists!";
            // }
            return $check->rowCount();
            
        }

        public function register($user){
            $statment = $this->connectdb->prepare("INSERT INTO users (first_name, last_name, email, phone_number, user_password) VALUES(:first_name, :last_name, :email, :phone_number, :user_password)");
            $statement->bindvalue('first_name', $user['first_name']);
            $statement->bindvalue('last_name', $user['last_name']);
            $statement->bindvalue('email', $user['email']);
            $statement->bindvalue('phone_number', $user['phone_number']);
            $statement->bindvalue('email', $user['user_password']);
            return $statement->execute();
        }
    }


    return new Connection(); */