<?php
    class Duck {

        public function quack() {
               echo nl2br("Quack \n");
        }
 
        public function fly() {
               echo nl2br("I'm flying \n");
        }
    }
 
    class Turkey {
 
        public function gobble() {
               echo nl2br("Gobble gobble \n");
        }
 
        public function fly() {
        echo nl2br("I'm flying a short distance \n");
        }
    }

    class TurkeyAdapter extends Turkey{
        public function quack(){
            echo nl2br("Gobble gobble \n");
        }
        public function fly(){
            $i = 0;
            do{
                echo nl2br("I'm flying a short distance \n");
                $i++;
            } while ($i<5);
        }
    }
?>