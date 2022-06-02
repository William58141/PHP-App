<?php

include("start.php");

?>

<script src="ajax-finn-student.js"></script>

<h3>Endre student</h3>

<form method="post" action="endre-student.php" id="endreStudentSkjema" name="endreStudentSkjema">
Brukernavn
    <select name="brukernavn" id="brukernavn" onChange="finn(this.value)">
    <?php print ("<option value='' disabled hidden selected>Velg brukernavn </option>");
    include ("dynamiske-funksjoner.php"); listeboksStudent(); ?>
    </select> <br/>


Fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>

Etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>

Klassekode 
<select name="klassekode" id="klassekode">
<?php listeboksKlassekode(); ?>
</select>  <br/>

Bildenr
    <select name="bildenr" id="bildenr">
    <?php listeboksBilde(); ?>
    </select> <br/>

<input type="submit"  value="Endre student" name="endreStudentKnapp" id="endreStudentKnapp">
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />

</form>

<?php
    if (isset($_POST ["endreStudentKnapp"]))
    {
        $brukernavn=$_POST ["brukernavn"];
        $fornavn=$_POST ["fornavn"];
        $etternavn=$_POST ["etternavn"];
        $klassekode=$_POST ["klassekode"];
        $bildenr=$_POST ["bildenr"];

        if(!$brukernavn || !$fornavn || !$etternavn || !$klassekode || !$bildenr)
        {
            print("Alle felt m&aring; fylles ut");
        }
        else
        {
            include ("db-tilkobling.php");

            $sqlSetning="UPDATE student SET fornavn='$fornavn', etternavn='$etternavn', klassekode='$klassekode',bildenr='$bildenr' WHERE brukernavn='$brukernavn';";
            mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen");
            
            print ("Studenten er n&aring; endret<br />");

        }
    }

    include("slutt.php");
?>
    

