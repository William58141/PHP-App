<?php

include("db-tilkobling.php");

$klassekode=$_GET ["klassekode"];


$sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");


$antallRader=mysqli_num_rows($sqlResultat);

if ($antallRader!=0)
{
    $rad=mysqli_fetch_array($sqlResultat);
    $klassenavn=$rad["klassenavn"];
    $studiumkode=$rad["studiumkode"];
    print ("$klassenavn;$studiumkode");
}
?>