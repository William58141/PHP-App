<?php

include("db-tilkobling.php");

$bildenr=$_GET ["bildenr"];


$sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat);
if ($antallRader!=0)
{
    $rad=mysqli_fetch_array($sqlResultat);
    $opplastingsdato=$rad["opplastingsdato"];
    $filnavn=$rad["filnavn"];
    $beskrivelse=$rad["beskrivelse"];
    print("$opplastingsdato;$filnavn;$beskrivelse");
}

?>