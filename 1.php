<?php 
$n = 5;
	for($i=1;$i<=$n;$i++)
		{
			for($j=1;$j<=$i;$j++)
 			{
 				if($j==1 || $j==$i)
 				{
 					$value[$i][$j]=1;
 				}
 				else{
 					$value[$i][$j] = $value[$i-1][$j] + $value[$i-1][$j-1];
 				}
 				echo $value[$i][$j]." ";
 			}
 			echo "<br>";
		}
 ?>
