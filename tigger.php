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
            echo self::$i. " veces a rugido el Tigre";

        }
    }

    $tigre = Tigger::getInstance();
    for ($j = 0; $j < 170; $j++){
        $tigre->roar();
    }
    $tigre->getCounter();
?>