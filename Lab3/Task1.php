<?php

$l = 10;
$w = 20;

function area($a,$b){
    return $a*$b;
}
function perimeter($a,$b){
    return 2*($a+$b);
}

echo "The area of rectangle is: ". area($l,$w);
echo "<br>";
echo "The perimeter of rectangle is: ". perimeter($l,$w);

?>
