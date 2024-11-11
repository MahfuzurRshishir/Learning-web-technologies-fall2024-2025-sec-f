<?php

$a=300;
$v=15;

function vat($amount,$vatP){
    return $amount*($vatP/100);

}
echo "The vat amount is: ".vat($a,$v);
?>
