<?php

$markscat=2;
$markssum=30;
if($markscat>50 || $markssum>50)
{
    echo"enter valid marks 50 and bellow";
}
else{
$sum=$markscat+$markssum;
echo"total marks is= $sum <br>";
if($sum >= 50 && $sum <= 100 ){
    echo"pass";
}
else{
    echo"faile";
}
}
?> 