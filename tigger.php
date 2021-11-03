<?php
    
    class Tigger {
        private static $instance = null;
        private static $i = 0;
        private function __construct() {
            echo "Building character..." . PHP_EOL;    
        }
        public static function getInstance(){
            if (self::$instance == null){
                self::$instance = new Tigger();
            }
            return self::$instance;
        }
        public function roar() {
            echo "Grrr!" . PHP_EOL;
            self::$i++;
        }
        public function getCounter(){
            echo self::$i. " veces han rugido los tigres";

        }
    }

    $tigre1 = Tigger::getInstance();
    $tigre2 = Tigger::getInstance();
    for ($j = 0; $j < 170; $j++){
        $tigre1->roar();
        if ($j > 30){
            $tigre2->roar();   
        }
    }
    $tigre1->getCounter();
?>