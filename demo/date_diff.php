<?php


$date1=date_create("2010-03-15");
$date2=date_create("2022-03-25");
$diff=date_diff($date1,$date2);

echo $diff->format("%R%a days");


?>