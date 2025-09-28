<?php

$marks= 90;
if($marks<0 || $marks>100)
{
    echo("enter valid marks >0 and <=100");
}
else{ 

if($marks>=80 && $marks<=100){
    echo"Grade A";
}
else if($marks>=70 && $marks<80){
    echo"Grade B";
}
else if($marks>=60 && $marks<70){
    echo"Grade c";
}
else if($marks>=50 && $marks<60){
    echo"Grade D";
}
else if($marks<50){
    echo" FAIL";
}
}
?>