<html>
<body bgcolor="powderblue">
<br>
<?php
$inf = 999;
function gettable($n)
{

}	
function Display($dist, $n, $k)
{	
	global $inf ;
	global $dist ;		
	if($k == 0)
	{
		echo "<br><h1>Original Matrix :</h1><br>";
	}
	else 
	{
		echo "<h1>A<sub>$k</sub> :</h1><br>";
	}
	echo "<table border='1px solid black' width='25%' height='25%'>";
	for($i = 0; $i < $n; $i++)
	{	
		echo "<tr><center>";
		for($j = 0; $j < $n; $j++)
		{
			if($dist[$i][$j] == $inf)
			{
				echo "<td><h1>inf</h1></td>" ;
			}
			else
			{
				echo "<td><h1>".$dist[$i][$j]."</h1></td>";
			}
		}
		echo "</center></tr>";
	}
	echo "</table>";
}

function floydwarshall($arr ,$n)
{
	global $flag ; 
	global $inf ;
	global $dist ;
	$k = 0;
	for($i = 0; $i < $n; $i++)
	{
		for($j = 0; $j < $n; $j++)
		{	
			$flag[$i][$j] = 0;
			$dist[$i][$j] = $arr[$k];
			$k = $k + 1;
		}
	}
	
	Display($dist, $n ,0);
	echo "<br>" ;
	for($k = 0; $k < $n; $k++)
	{
		for($i = 0; $i < $n; $i++)
		{
			for($j = 0; $j < $n; $j++)
			{
				if($dist[$i][$k] + $dist[$k][$j] < $dist[$i][$j])
				{	
					echo "<h3>Value of A<sub>$i$j</sub> = ".$dist[$i][$j]."</h3>";
					echo "<h3>Value of A<sub>$i$k</sub> = ".$dist[$i][$k]."</h3>";
					echo "<h3>Value of A<sub>$k$j</sub> = ".$dist[$k][$j]."</h3>";
					echo "<h3>Since value of A<sub>$k$j</sub> + A<sub>$i$k</sub> is less than value of A<sub>$i$j</sub> we replace it by value of (A<sub>$k$j</sub> + A<sub>$i$k</sub>).</h3>"; 
					$flag[$i][$j] = 1;
					$dist[$i][$j] = $dist[$i][$k] + $dist[$k][$j] ;
					echo "<h3>After swap value of A<sub>$i$j</sub> = ".$dist[$i][$j]."</h3><hr>";
					
				}
				if($k == ($n-1)&&$i == ($n-1)&&$j == ($n-1))
				{
					for($p = 0; $p < $n; $p ++)
					{
						if($dist[$p][$p] < 0)
						{
							echo "<h3>Negative cycle is present as value for (".$p.", ".$p.") is negative = ".$dist[$p][$p]."</h3>";
						}
					}
				}
			}
		}
		$a = $k + 1 ;
		Display($dist, $n, $a);
		echo "<br>" ;
	}
}
$flag = array();
$dist = array();
$ar = $_GET["val"];
$n = $_GET["n"];
$arr = explode(",",$ar);
floydwarshall($arr ,$n);
?>
<a href="form3.php"><input type="button" value="Back"></a>
<a href="FWV.html"><input type="button" value="Back to Homepage"></a>
</body>
</html>