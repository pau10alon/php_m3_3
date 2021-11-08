<?php
/*Strategy

Penseu en la següent funció simple amb el nom couponGenerator que genera diferents cupons per a diferents tipus d'automòbils. Per a aquells que estan interessats en comprar un BMW ofereix un cupó diferent a el d'aquells que estiguin interessats en comprar un Mercedes.

El cupó té en compte els següents factors per ponderar la taxa de descompte:

    És possible que desitgem oferir un descompte durant una recessió en la compra d'automòbils. En el nostre codi se li denomina a aquest atribut com isHighSeason.
    És possible que desitgem oferir un descompte quan l'estoc d'automòbils a la venda sigui massa gran. En el nostre codi se li denomina a aquest atribut com bigStock.

function cupounGenerator($car) {

       $discount = 0;
       $isHighSeason = false;
       $bigStock = true;

       if($car == "bmw"){
           if(!$isHighSeason) {$discount += 5;}
          if($bigStock) {$discount += 7;}
       } else if($car == "mercedes") {
          if(!$isHighSeason) {$discount += 4;}
          if($bigStock) {$discount += 10;}
       
       }
       return $cupoun = "Get {$discount}% off the price of your new car.";
}
echo cupounGenerator("bmw");

Segons les consideracions anteriors necessitem utilitzar el patró strategy perquè donada la marca d'un automòbil, el nostre programa calculi el descompte.

Assegureu-vos de tenir en compte el següent:

    Cal crear una funció anomenada addSeasonDiscount que afegeix un descompte quan les vendes baixen.
    Cal crear una funció anomenada addStockDiscount que afegeix un descompte quan l'inventari és massa gran.

Ja que els cupons varien d'acord a cada tipus d'automòbil, l'ideal seria convocar aquestes funcions en classes separades. Pel que serà necessari implementar les classes bmwCuoponGenerator i mercedesCuoponGenerator.

De fet, com els mètodes anteriors per a cada cupó tenen el mateix nom; és necessari crear la interfície carCouponGenerator que obligui a totes les classes que la implementin a utilitzar-los, incloses les que acabem d'escriure i les que ens agradaria afegir en el futur.

Imprimeix per pantalla el resultat de l'cupó per a les dues marques de cotxe (BMW i Mercedes).*/

  interface carCouponGenerator { //strategy
    public function addSeasonDiscount();
    public function addStockDiscount();
  }

  class couponGenerator {
    private $strategy;
    
    public function __construct(carCouponGenerator $strategy){
      $this->strategy = $strategy;
    }

    public function setStrategy(carCouponGenerator $strategy){
      $this->strategy = $strategy;
    }
    public function handle() {
      $this->strategy->addSeasonDiscount();
      $this->strategy->addStockDiscount();
    }
  }
  class bmwCouponGenerator implements carCouponGenerator {
    public $discount = 0;
    public $isHighSeason = false;
    public $bigStock = true;
    public function addSeasonDiscount() {
      if(!$this->isHighSeason) {
        $this->discount += 5;
        echo "el descuento es del {$this->discount}% cuando haya recesión.<br>";
      }
    }
    public function addStockDiscount() {
      if ($this->bigStock) {
        $this->discount += 7;
        echo "el descuento es del {$this->discount}% cuando haya a la vez un gran stock.<br>";
      }
    }
  }

  class mercedesCouponGenerator implements carCouponGenerator {
    public $discount = 0;
    public $isHighSeason = false;
    public $bigStock = true;
    public function addSeasonDiscount() {
      if (!$this->isHighSeason) {$this->discount += 4;}
      echo "el descuento es del {$this->discount}% cuando haya recesión.<br>";
    }
    public function addStockDiscount() {
      if ($this->bigStock) {
        $this->discount += 10;
        echo "el descuento es del {$this->discount}% cuando haya a la vez un gran stock.<br>";
      }
    }
  }

  //llamada del cliente

  $cd = new couponGenerator(new bmwCouponGenerator());
  echo "Los clientes de BMW pueden disfutar de un:<br>";
  $cd->handle();

  $cd->setStrategy(new mercedesCouponGenerator());
  echo "Los clientes de Mercedes pueden disfrutar de un:<br>";
  $cd->handle();


?>
