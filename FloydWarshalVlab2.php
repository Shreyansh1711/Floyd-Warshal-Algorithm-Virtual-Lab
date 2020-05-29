<html>
<head>
<head><title>For 3 nodes</title> </head>
</head>
<body bgcolor="powderblue">
<?php
$inf = 999; 
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
	for($i = 0; $i < $n; $i++)
	{
		for($j = 0; $j < $n; $j++)
		{	
			$flag[$i][$j] = 0;
			$dist[$i][$j] = $arr[$i][$j];
		}
	}
	$b = 1;
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
		$a = $k + 1; 
		Display($dist, $n, $a);
		echo "<br>" ;
	}
	echo "<h1>Final Graph with only original weights : </h1><br><canvas id='myCanvas4' width='1000' height='470'></canvas>";
}
$flag = array();
$dist = array();
$arr = $_POST["val"];
$n = 3;
echo "<h1>Graph : </h1><br><canvas id='myCanvas1' width='1000' height='470'></canvas>";
floydwarshall($arr ,$n);
?>
<script language='javascript'>
	var c = document.getElementById('myCanvas1');
	var ctx = c.getContext('2d');
	ctx.beginPath();
	ctx.arc(100 , 100 , 50, 0, 2 * Math.PI);
	ctx.stroke();
	ctx.beginPath();
	ctx.arc(100 , 400 , 50, 0, 2 * Math.PI);
	ctx.stroke();
	ctx.beginPath();
	ctx.arc(400 , 100 , 50, 0, 2 * Math.PI);
	ctx.stroke();
	ctx.font = '20px Georgia';
    ctx.fillText('1', 100 , 100);
	ctx.fillText('2', 400 , 100);
	ctx.fillText('3', 100 , 400);

	var dist = <?php echo json_encode($arr) ?>;
	if(dist[0][1] != 0 && dist[0][1] != 999)
	{
		ctx.beginPath();
		ctx.moveTo(145,80);
		ctx.lineTo(355,80);
		ctx.fillText(dist[0][1],250,70);
		ctx.moveTo(355,80);
		ctx.lineTo(335,60);
		ctx.moveTo(355,80);
		ctx.lineTo(335,100);
		ctx.stroke();
	}
	if(dist[1][0] != 0 && dist[1][0] != 999)
	{
		ctx.beginPath();
		ctx.moveTo(355,120);
		ctx.lineTo(145,120);
		ctx.fillText(dist[1][0],250,140);
		ctx.moveTo(145,120);
		ctx.lineTo(165,100);
		ctx.moveTo(145,120);
		ctx.lineTo(165,140);
		ctx.stroke();
	}
	if(dist[0][2] != 0 && dist[0][2] != 999)
	{
		ctx.beginPath();
		ctx.moveTo(120,145);
		ctx.lineTo(120,355);
		ctx.fillText(dist[0][2],130,250);
		ctx.moveTo(120,355);
		ctx.lineTo(100,335);
		ctx.moveTo(120,355);
		ctx.lineTo(140,335);
		ctx.stroke();
	}
	if(dist[2][0] != 0 && dist[2][0] != 999)
	{
		ctx.beginPath();
		ctx.moveTo(80,355);
		ctx.lineTo(80,145);
		ctx.fillText(dist[2][0],60,250);
		ctx.moveTo(80,145);
		ctx.lineTo(60,165);
		ctx.moveTo(80,145);
		ctx.lineTo(100,165);
		ctx.stroke();
	}
		if(dist[2][1] != 0 && dist[2][1] != 999)
	{
		ctx.beginPath();
		ctx.moveTo(125,360);
		ctx.lineTo(360,132);
		ctx.fillText(dist[2][1],310,170);
		ctx.moveTo(360,132);
		ctx.lineTo(320,146);
		ctx.moveTo(360,132);
		ctx.lineTo(353,162);
		ctx.stroke();
	}
	if(dist[1][2] != 0 && dist[1][2] != 999)
	{
		ctx.beginPath();
		ctx.moveTo(374,141);
		ctx.lineTo(140,373);
		ctx.fillText(dist[1][2],180,350);
		ctx.moveTo(140,373);
		ctx.lineTo(144,345);
		ctx.moveTo(140,373);
		ctx.lineTo(175,367);
		ctx.stroke();
	}
</script>
<script language='javascript'>
	var c = document.getElementById('myCanvas4');
	var ctx = c.getContext('2d');
	ctx.beginPath();
	ctx.arc(100 , 100 , 50, 0, 2 * Math.PI);
	ctx.stroke();
	ctx.beginPath();
	ctx.arc(100 , 400 , 50, 0, 2 * Math.PI);
	ctx.stroke();
	ctx.beginPath();
	ctx.arc(400 , 100 , 50, 0, 2 * Math.PI);
	ctx.stroke();
	ctx.font = '20px Georgia';
    ctx.fillText('1', 100 , 100);
	ctx.fillText('2', 400 , 100);
	ctx.fillText('3', 100 , 400);
	var flag = <?php echo json_encode($flag) ?>;
	var dist = <?php echo json_encode($dist) ?>;
	if(dist[0][1] != 0 && dist[0][1] != 999 && flag[0][1] != 1)
	{
		ctx.beginPath();
		ctx.moveTo(145,80);
		ctx.lineTo(355,80);
		ctx.fillText(dist[0][1],250,70);
		ctx.moveTo(355,80);
		ctx.lineTo(335,60);
		ctx.moveTo(355,80);
		ctx.lineTo(335,100);
		ctx.stroke();
	}
	if(dist[1][0] != 0 && dist[1][0] != 999 && flag[1][0] != 1)
	{
		ctx.beginPath();
		ctx.moveTo(355,120);
		ctx.lineTo(145,120);
		ctx.fillText(dist[1][0],250,140);
		ctx.moveTo(145,120);
		ctx.lineTo(165,100);
		ctx.moveTo(145,120);
		ctx.lineTo(165,140);
		ctx.stroke();
	}
	if(dist[0][2] != 0 && dist[0][2] != 999 && flag[0][2] != 1)
	{
		ctx.beginPath();
		ctx.moveTo(120,145);
		ctx.lineTo(120,355);
		ctx.fillText(dist[0][2],130,250);
		ctx.moveTo(120,355);
		ctx.lineTo(100,335);
		ctx.moveTo(120,355);
		ctx.lineTo(140,335);
		ctx.stroke();
	}
	if(dist[2][0] != 0 && dist[2][0] != 999 && flag[2][0] != 1)
	{
		ctx.beginPath();
		ctx.moveTo(80,355);
		ctx.lineTo(80,145);
		ctx.fillText(dist[2][0],60,250);
		ctx.moveTo(80,145);
		ctx.lineTo(60,165);
		ctx.moveTo(80,145);
		ctx.lineTo(100,165);
		ctx.stroke();
	}
		if(dist[2][1] != 0 && dist[2][1] != 999 && flag[2][1] != 1)
	{
		ctx.beginPath();
		ctx.moveTo(125,360);
		ctx.lineTo(360,132);
		ctx.fillText(dist[2][1],310,170);
		ctx.moveTo(360,132);
		ctx.lineTo(320,146);
		ctx.moveTo(360,132);
		ctx.lineTo(353,162);
		ctx.stroke();
	}
	if(dist[1][2] != 0 && dist[1][2] != 999 && flag[1][2] != 1)
	{
		ctx.beginPath();
		ctx.moveTo(374,141);
		ctx.lineTo(140,373);
		ctx.fillText(dist[1][2],180,350);
		ctx.moveTo(140,373);
		ctx.lineTo(144,345);
		ctx.moveTo(140,373);
		ctx.lineTo(175,367);
		ctx.stroke();
	}
</script>

<br>
<a href="form2.php"><input type="button" value="Back to Previous Page"></a>
<a href="FWV.html"><input type="button" value="Back to Homepage"></a>
</body>
</html>
