<?php
    class User{
        //properties
        public $username = 'ura0920';
        public $password = 'password0920';
        public $isAdmin = true; //booean
        public $myName = 'Urara';
        public $age;

        //methods/functions
        public function sum($arg1, $arg2){
            $total = $arg1 + $arg2;
            return $total;
        }

        public function helloWorld(){
            return "Hello World";
        }
        protected function hello(){
            return "This is protected";
        }

    }

    
    
    $user = new User();

    echo $user ->username;

    echo "<br>";

    $user -> age = 19;

    echo $user->age;
    echo "<br>";

    $user->myName = "Urara Yasaki";

    echo $user->myName;
    echo "<br>";

    echo $user->sum(100,250);