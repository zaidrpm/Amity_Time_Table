<?php
$time=array(
'09:15 to 10:10',
'10:15 to 11:10',
'11:15 to 12:10',
'12:15 to 01:10',
'01:15 to 02:10',
'02:15 to 03:10',
'03:15 to 04:10',
'04:15 to 05:10'
);
//Value of time=index+1
$days=array(
"Monday",
"Tuesday",
"Wednesday",
"Thursday",
"Friday",
"Saturday"
);
//Value of day= index*7+1
$f=file_get_contents("Time-Table.json");
$data=json_decode($f);
?>
<html>
<head>
<title>Time-Table</title>
<link rel="stylesheet" href="style.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<script>
function scr()
{
var d = new Date();
var n = d.getDay()-1;
elmnt = document.getElementById(n);
elmnt.scrollIntoView();
}
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-132754656-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-132754656-1');
</script>
</head>
<body onload="scr()">
<div id="container">
<p style="border:3px solid black;text-align:center;"><?php echo "Last updated on: ".date("d-F-o H:i",time()+((5*60+30)*60));?></p>
<?php
$i=0;
while($i<6)
{
echo "<table>\n<tr><th colspan='2' id='$i'>" . $days[$i] . "</th></tr>\n";
$dval=$i*7+1;
$j=0;
while($j<8)
{
$tval=$j<4?($j+1):$j;
$temp="k" . ($dval+$tval);
if(isset($data->{$temp}))
$val=$data->{$temp};
else
$val="&nbsp </br> &nbsp </br> &nbsp";
if($j==4)
$val="Lunch</br>&nbsp</br>";
if($j%2==0)
echo "<tr>\n";
echo "<td><p class='time'>" . $time[$j] . "</p>";
echo $val;
echo "</td>\n";
if($j%2!=0)
echo "</tr>\n";
++$j;
}
echo "</table>\n</br></br>";
++$i;
}
?>
</div>
</body>
</html>
