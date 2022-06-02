<?php

include("start.php");
?>

<script src="funksjoner.js"></script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
Student 
<select name="brukernavn" id="brukernavn">
<option value=""> Velg Student </option>
<?php include ("dynamiske-funksjoner.php"); listeboksStudent(); ?> 
</select>
<input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>

<?php

if (isset($_POST ["slettStudentKnapp"]))
{
    $brukernavn=$_POST ["brukernavn"];

    if(!$brukernavn)
    {
        print("Det er ikke valgt noen studenter");

    }
    else
    {
        include("db-tilkobling.php");

        $sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
        mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette data i databasen");

        print("F&oslash;lgende student er n&aring; slettet: $brukernavn  <br />");
    }
}
     
include("slutt.php");

?>
