<?php
$montd = Date('M'); // "d-m-Y"

function isLeapYear($y){
	if (($y%4) == 0){
		return true;
	}else{
		return false;
	}
}
function getDaysOffset($d){
	$f = Date ( "1-m-Y");
	$f = strtotime($f);
	$f = Date("D",$f);
	$f = getWeekDay($f);
	return $f;
}
function getWeekDay($d){
	$d = strtolower($d);
	switch ($d) {
		case 'sun':
			return 0;
			break;

		case 'mon':
			return 1;
			break;

		case 'tue':
			return 2;
			break;

		case 'wed':
			return 3;
			break;

		case 'thu':
			return 4;
			break;

		case 'fri':
			return 5;
			break;
		
		default:
			throw new Exception("Invalid Date");
			break;
	}
}
function getDays($month){
	switch($month){
		case 1:
			return 31;
			break;
		case 2:
			if(isLeapYear($month)){
				return 29;	
			}else{
				return 28;
			}
			break;
		case 3:
			return 31;
			break;
		case 4:
			return 30;
			break;
		case 5:
			return 31;
			break;
		case 6:
			return 30;
			break;
		case 7:
			return 31;
			break;
		case 8:
			return 31;
			break;
		case 9:
			return 30;
			break;
		case 10:
			return 31;
			break;
		case 11:
			return 30;
			break;
		case 12:
			return 31;
			break;
		default:
		throw new Exception("Invalid Montd");
	}
}
?>
<!doctype html>
<html>
<head>
<title>
Calender - <?php echo $montd ?>
</title>
<style>
*{
font-family: sans-serif;
}
h3{
	text-decoration: none;
}
.month{
	width: 80%;
    min-width: 220px;
    padding: 20px;
    background: none repeat scroll 0% 0% rgba(255,255,255,0.3);
    margin: 5% auto 0px;
    border: 1px solid rgba(255,255,255,0.0);
    box-shadow: 0px 0px 5px rgba(255,255,255,1);
}
table{
	width:100%;
	border:none;
}
body{
	background-image:url("img13.jpg");
}
td{
	text-decoration: none;
	width:10%;
}
.hidden{
	visibility: hidden;
}
table thead td, table tbody td{
	border:none;
	border-collapse:collapse;
	box-shadow: 0px 0px 5px rgba(119, 179, 222, 0.43);
	transition: color 0.2s linear 0s, border 0.2s linear 0s, box-shadow 0.2s linear 0s;
}
tr#header{
	border-style:solid;
	border-width:50px;
	border-color:#0099dd;
}
tr#header td{
	border-style:none;
	font-size:128.2%;
	text-align: left;
}
.today{
	border:none;
	padding:5%;
	background-color:rgba(0, 153, 221, 0.3);
	text-align: center;
}
.else{
	border:none;
	padding:5%;
	text-align: center;
	background-color:rgba(119, 179, 222, 0.43);
}
.else:hover{
	background-color: rgba(0, 153, 221, 0.3);
}
.else:active{
	background-color: rgba(0, 153, 221, 0.3);
}
</style>
</head>
<body>

<div class ="month">
	<h1>
		Calender - <?php echo $montd ?>	
	</h1>
	<table border="1">
		
			<tr id="header">
			<td>
				Sun
			</td>
			<td>
				Mon
			</td>
			<td>
				Tue
			</td>
			<td>
				Wed
			</td>
			<td>
				Thu
			</td>
			<td>
				Fri
			</td>
			<td>
				Sat
			</td>
			</tr>
			<?php
				$month = Date("m");
				$days = getDays($month);
				$c=0;
				$t = Date("d");
				$f = getDaysOffset(Date("d-m-Y"));
				$r=0;
				while($c<$days){
					echo "<tr>";
					$r++;
					for($x=0;$x<7;$x++){
						
						if($f>0 && ($r==1)){
							echo '<td class="hidden"> </td>';
							$f--;	
						}else{
							$c++;
							if($t == $c){
								$class ='class ="today"';
							}else{
								$class ='class ="else"';
							}
							echo "<td $class> $c</td>";                                 
						}
					}
					echo "</tr>";
				}
			?>
	</table>
	<div>
	
	</div>
</div>

</body>
</html>
