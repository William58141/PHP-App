<?php

include("start.php");

?>

<h3>Registrer Klasse<h3>

<form method="post" action="" id="registrerStudiumSkjema" name="registrerStudiumSkjema">
Klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
Klassenavn <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
Studiumkode <input type="text" id="studiumkode" name="studiumkode" required /> <br/>
<input type="submit" value="Registrer klasse" id="registrerStudiumKnapp" name="registrerStudiumKnapp" /> 
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
if (isset($_POST["registrerStudiumKnapp"]))
{
    $klassekode=$_POST["klassekode"];
    $klassenavn=$_POST["klassenavn"];
    $studiumkode=$_POST["studiumkode"];


if (!$klassekode || !$klassenavn || !$studiumkode)
{
    print ("Alle feltene m&aring; fylles ut");
}
else
{
    include("db-tilkobling.php");
    $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
    $antallRader=mysqli_num_rows($sqlResultat);

    if($antallRader!=0)
    {
        print("Klassen er registrert fra f&oslashr");
    }
    else
    {
        $sqlSetning="INSERT INTO klasse (klassekode,klassenavn,studiumkode)
        VALUES('$klassekode','$klassenavn','$studiumkode');";
        mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");

        print ("F&oslash;lgende klasse er n&aring; registrert: $klassekode $klassenavn $studiumkode ");
        }
}}
include("slutt.php");
?>