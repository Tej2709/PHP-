<?php
 
 $a=array("a"=>"Sahil", array("b"=>"Jaypal"));
 echo "<pr>";
 print_r($a);
 echo "</pr>";

 $b= array ("c"=>"Milind");
    echo "After Merging the array";
    echo "<br>";

 $c= array_merge($a,$b);

   foreach($a as $value)
   {
      
   }
?>