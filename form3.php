<html> 
<head> 
<meta charset=utf-8 /> 
<title>More than 4 nodes</title> 
<style type="text/css">  
</style>  
</head><body bgcolor="powderblue"> 
<h1>Example</h1>
<h3>Enter values at the end of page</h3>
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
			$dist[$i][$j] = $arr[$i][$j];
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
$arr = array(array(0,5,999,2,999), array(999,0,2,999,999), array(3,999,0,999,7), array(999,999,4,0,1), array(1,3,999,999,0));
$n = 5;
floydwarshall($arr ,$n);
?>
<form method = "get" target="_blank" action = "FloydWarshalVlab.php"> 
<h1>To try it yourself click on the button .</h1>
<table id="myTable" border="1" width="25%" height="25%"> 
<input type="button" onclick="createTable()" value="Create the table"> 
<br><br><br>
</table>
<table id="myTable" border="1" width="100" height="100"> 
<h1>If you want to make any changes or Submit then click here.</h1>
<h3>Enter 'y' to make changes and 'n' to submit</h3>
<input type="reset" onclick="changeTable()" value="Makes changes"> 
</table>
</form>
<script language="javascript">
window.count = 0;
function createTable()
{
window.rn = window.prompt("Input number of rows", 1);
cn = rn
var s = ' ';  
window.val= new Array(rn);
for(var r=0;r<parseInt(rn,10);r++)
	{
		val[r] = new Array(rn);
		var x=document.getElementById('myTable').insertRow(r);
		for(var c=0;c<parseInt(cn,10);c++)  
		{
			var y =  x.insertCell(c);
			if(r==c)
			{
				val[r][c] = 0;
			}
			else
			{
				var str = "Enter weight from node"+(r+1)+" to "+(c+1)+" : ";
				val[r][c] =  parseInt(window.prompt(str, 0));
			}
			y.innerHTML=val[r][c]
		}	
   }

}
function changeTable(){   
var s = "Do you want to make any changes ? (y/n)";
var ans = window.prompt(s);
//document.write(ans);
try
{
	if(ans.toUpperCase() == "Y")
	{
		window.location.href = "form3.php";   
	}
	else if(ans.toUpperCase() != "N")
	{
	alert("Invalid input");
	changeTable();
	}
	else
	{
	window.location.href = "FloydWarshalVlab5.php?val="+val+"&n="+rn;   
	}
}
catch (err)
{
	document.write(err);
}
}
</script>
<br>
<a href="FWV.html"><input type="button" value="Back to Homepage"></a>
</body></html>
