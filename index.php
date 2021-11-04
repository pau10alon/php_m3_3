<?php
    require_once "poultry.php";
    function duck_interaction($duck) {
        $duck->quack();
        $duck->fly();
    }

    $duck = new Duck;
    $turkey = new Turkey;
    $turkey_adapter = new TurkeyAdapter($turkey);
    echo nl2br("The Turkey says...\n");
    $turkey->gobble();
    $turkey->fly();
    echo nl2br("The Duck says...\n");
    duck_interaction($duck);
    echo nl2br("The TurkeyAdapter says...\n");
    duck_interaction($turkey_adapter);

?>