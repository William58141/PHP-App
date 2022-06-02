<?php

function listeboksStudent ()
{
    include ("db-tilkobling.php");
    $sqlSetning="SELECT * FROM student ORDER BY brukernavn";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente fra databasen");

    $antallRader=mysqli_num_rows ($sqlResultat);

    for($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $brukernavn=$rad ["brukernavn"];
        $fornavn=$rad ["fornavn"];
        $etternavn=$rad ["etternavn"];
        $bildenr=$rad ["bildenr"];
        $klassekode=$rad ["klassekode"];

        print ("<option value='$brukernavn'>$brukernavn</option>");
    }

}


function listeboksKlassekode ()
{
    include ("db-tilkobling.php");

$sqlSetning="SELECT * FROM klasse ORDER BY klassekode";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat);  

for($r=1;$r<=$antallRader;$r++)
{
    $rad=mysqli_fetch_array($sqlResultat);
    $klassekode=$rad["klassekode"];
    $klassenavn=$rad["klassenavn"];
    $studiumkode=$rad["studiumkode"];
    
    print("<option value='$klassekode'>$klassekode</option>");

    }
}

function listeboksBilde ()
{
    include("db-tilkobling.php");
    $sqlSetning="SELECT * FROM bilde ORDER BY bildenr";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente fra databasen");
    $antallRader=mysqli_num_rows ($sqlResultat);

    for($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $bildenr=$rad["bildenr"];
        $opplastingsdato=$rad["opplastingsdato"];
        $filnavn=$rad ["filnavn"];
        $beskrivelse=$rad ["beskrivelse"];

        print("<option value='$bildenr'>$bildenr</option>");
    }
}

function listeboksBildenrFilnavn()
{
    include("db-tilkobling.php");

    $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 

    $antallRader=mysqli_num_rows($sqlResultat);

    for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $bildenr=$rad["bildenr"];
        $filnavn=$rad["filnavn"];

        print("<option value='$bildenr;$filnavn'>$bildenr $filnavn</option>"); 
    }
}



?>