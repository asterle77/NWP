<?php

if(isset($_GET['sbmt']))
{
$_input = $_GET['input'];
$_dropdown = $_GET['dropdown'];
		  
if($_dropdown == 'usd')
{
$output = $_input * 0.15;
echo "<h1>" . number_format($output,2) . " Dollar" . "</h1>";
}
else if($_dropdown == 'ero')
{
$output = $_input * 0.13;
echo "<h1>" . number_format($output,2) . " Euro" . "</h1>";
}
else if($_dropdown == 'gbp')
{
$output = $_input * 0.12;
echo "<h1>" . number_format($output,2) . " British Pound" . "</h1>"; 
}
}
// source code: https://www.youtube.com/watch?v=ht6jphIekZw, kod je odgovoru na zadnji komentar
?>