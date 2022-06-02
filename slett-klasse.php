<?php

include ("start.php");
?>

<script src="funksjoner.js"></script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
Klassekode
<select name="klassekode" id="klassekode">
<option value="">velg klasse</option>
<?php include ("dynamiske-funksjoner.php"); listeboksKlassekode(); ?> 
</select>
<input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" />
</form>

<?php

if (isset($_POST ["slettKlasseKnapp"]))
{
    $klassekode=$_POST ["klassekode"];

    if(!$klassekode)
    {
        print("Det er ikke valgt noen klasse");
    }
    else
    {
        include("db-tilkobling.php");

        $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
        mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette data i databasen");

        print("F&oslash;lgende klasse er n&aring; slettet: $klassekode  <br />");
    }
}
     
include("slutt.php");

?>
