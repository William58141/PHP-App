<?php

include("start.php");

?>

<script src="finn-bilde.js"> </script> 

<h3>Endre bilde</h3>

<form method="post" action="endre-bilde.php" id="endreBildekjema" name="endreBildeSkjema">
Bilde 
<select name="bildenr" id="bildenr" onChange="finn(this.value)">
<option value=""disabled hidden selected>Velg bilde</option>
<?php include ("dynamiske-funksjoner.php"); listeboksBilde(); ?>
</select>  <br/>
Opplastingsdato <input type="date" id="opplastingsdato" name="opplastingsdato" required /> <br/>
Filnavn <input type="text" id="filnavn" name="filnavn" required /> <br/>
Beskrivelse <input type="text" id="beskrivelse" name="beskrivelse" required /> <br/>

<input type="submit"  value="Endre Opplastingsdato" name="endreOpplastingsdatoKnapp" id="endreOpplastingsdatoKnapp"> 
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
if (isset($_POST ["endreOpplastingsdatoKnapp"]))
{
    $bildenr=$_POST ["bildenr"];
    $opplastingsdato=$_POST ["opplastingsdato"];
    $filnavn=$_POST ["filnavn"];
    $beskrivelse=$_POST ["beskrivelse"];

    if (!$bildenr || !$opplastingsdato || !$filnavn || !$beskrivelse)
    {
        print ("Alle felt m&aring; fylles ut"); 
    }
    else
    {

        include("db-tilkobling.php");

        $sqlSetning="UPDATE bilde SET opplastingsdato='$opplastingsdato', filnavn='$filnavn', beskrivelse='$beskrivelse' WHERE bildenr='$bildenr';";
        mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen"); 

        print ("Bildet med bildenummeret $bildenr er n&aring; endret<br />");
    }
}

include("slutt.php");

?>