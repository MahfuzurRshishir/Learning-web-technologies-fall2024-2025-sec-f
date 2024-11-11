<?php
$a=30;
$b=40;
$c=10;

if($a>$b){
    if($a>$c){
        echo "The largest number is A";
    }else{
        echo "The largest number is C";
    }
}else if($b>$a){
    if($b>$c){
        echo "The largest number is B";
    }else{
        echo "The largest number is C";
    }
}
?>
