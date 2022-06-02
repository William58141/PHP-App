<?php

include("start.php");

?>


<h3>Vis klasseliste</h3>

<form method="post" action="vis-klasseliste.php" id="visKlasseListeSkjema" name="visKlasseListeSkjema">
Klasse 
<select name="klassekode" id="klassekode">
<option value=""disabled hidden selected>Velg klasse</option>
<?php include ("dynamiske-funksjoner.php"); listeboksKlassekode(); ?>
</select>  <br/>

<input type="submit"  value="velg" name="submit" id="submit"> 
</form>

<?php

error_reporting(E_ALL ^ E_ALL);

$klassekode = $_POST["klassekode"];


        include("db-tilkobling.php");
        



        $sqlSetning = "SELECT * FROM student join klasse K on student.klassekode = K.klassekode join bilde B on student.bildenr = B.bildenr WHERE K.klassekode = '$klassekode';";

        $sqlResultat = mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

        $antallRader = mysqli_num_rows($sqlResultat);

        print ("<table border=1>");

        print ("<tr><th align=left>Bilde</th> <th align=left>Fornavn</th> <th align=left>Etternavn</th></tr>");

        for ($r = 1; $r <= $antallRader; $r++) {
            $rad = mysqli_fetch_array($sqlResultat);
            $fornavn = $rad["fornavn"];
            $etternavn = $rad["etternavn"];
            $filnavn = $rad["filnavn"];


            print ("<tr> <td> <img src='bilder/$filnavn' width='150' height='150'></td> <td>$fornavn</td> <td>$etternavn</td> </tr>");
    }

    print ("</table>");


include("slutt.php");
?>