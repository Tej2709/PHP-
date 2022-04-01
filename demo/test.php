<!DOCTYPE html>
<html>
<body>

<?php 
$a = array("a"=>"one",array("b"=>"two"));
$b = array("c"=>"three");
$c = array();
$c = array_merge($a[0],$b);
/*for($i=0;$i<=count($a);$i++)
{
	echo "<pre>";
	print_r($a[0]]);
	echo "</pre>";

}*/
foreach($a as $value)
{
	if(is_array($value))
	{
		$a[0]= array_merge($value,$b);
	}
	
}
	echo "<pre>";
	print_r($a);
	echo "</pre>";

?>

</body>
</html>