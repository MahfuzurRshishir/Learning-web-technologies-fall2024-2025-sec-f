<?php
$arr = array(1,2,3,45,66);
$searchKey = 100;
$flag = false;

for($i=0; $i<count($arr); $i++){
    if($arr[$i]===$searchKey){
        $flag= true;
        break;
    }
}
if($flag===true){
    echo "The element is found";

}else{
    echo "The element is not found";
}

?>
