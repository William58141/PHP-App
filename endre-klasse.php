<?php

include("start.php");

?>
<script src="finn-klasse.js"></script>

<h3>Endre klasse</h3>

<form method="post" action="endre-klasse.php" id="endreKlasseSkjema" name="endreKlasseSkjema">
Klassekode 
<select name='klassekode' id='klassekode' onChange="finn(this.value)">
<option value="" disabled hidden selected>Velg klasse</option>
<?php include ("dynamiske-funksjoner.php"); listeboksKlassekode(); ?>
</select>  <br/>
Klassenavn (ny verdi)<input type='text' id='klassenavn' name='klassenavn' required /> <br/>
Studiumkode (ny verdi)<input type='text' id='studiumkode' name='studiumkode' required /> <br/>
<input type='submit'  value='Endre klasse' name='endreKlasseKnapp' id='endreKlasseKnapp'> 

</form>

<?php
if(isset($_POST["endreKlasseKnapp"]))
{

    $klassekode=$_POST["klassekode"];
    $klassenavn=$_POST["klassenavn"];
    $studiumkode=$_POST["studiumkode"];

    if (!$klassekode || !$klassenavn || !$studiumkode)
    {
        print("Alle felt m&aring; fylles ut");
    }
    else
    {

        include("db-tilkobling.php");

        $sqlSetning="UPDATE klasse SET klassenavn='$klassenavn', studiumkode='$studiumkode' WHERE klassekode='$klassekode';";
        mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen");

        print ("Klassen med klassekoden $klassekode er n&aring; endret<br />");
    }
}

include("slutt.php");
?>