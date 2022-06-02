<?php

include("start.php");

?>

<h3>Registrer bilde<h3>

<form method="post" action="" id="registrerBildeSkjema" enctype="multipart/form-data"  name="registrerBildeSkjema">
Bildenr <input type="number" min="0" max="150" id="bildenr" name="bildenr" required /> <br/>
Opplastingsdato <input type="date" id="opplastingsdato" name="opplastingsdato" required /> <br/>
Filnavn <input type="file" id="fil" name="fil" size="60"/> <br/>
Beskrivelse <input type="text" id="beskrivelse" name="beskrivelse" required /> <br/>

<input type="submit" value="Registrer bilde" id="registrerBildeKnapp" name="registrerBildeKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />

</form>

<?php
if (isset($_POST ["registrerBildeKnapp"]))
{
    $bildenr=$_POST ["bildenr"];
    $opplastingsdato=$_POST ["opplastingsdato"];
    $beskrivelse=$_POST ["beskrivelse"];
    
    $filnavn=$_FILES ["fil"]["name"];
    $filtype=$_FILES ["fil"]["type"];
    $filstorrelse=$_FILES ["fil"]["size"];
    $tmpnavn=$_FILES ["fil"]["tmp_name"];
    $nyttnavn="bilder/".$filnavn;

    if (!$bildenr || !$opplastingsdato || !$filnavn || !$beskrivelse)
    {
        print ("Alle felt m&aring; fylles ut"); 
    }
    else if ($filtype != "image/gif" && $filtype != "image/jpeg" && $filtype != "image/png")
    {
        print ("Det er kun tillatt &aring; laste opp bilder ");
    }
    else if ($filstorrelse > 5000000)
    {
        print ("Bildet er for stor til &aring; kunne lastes opp ");
    }
    else
    {
        include("db-tilkobling.php");

        $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat); 

        if ($antallRader!=0)
        {
            print ("Bildet er registrert fra f&oslashr");
        }
        else
        {
            move_uploaded_file($tmpnavn,$nyttnavn) or die ("ikke mulig &aring; laste opp fil");  

            $sqlSetning="INSERT INTO bilde VALUES('$bildenr','$opplastingsdato','$filnavn','$beskrivelse');";

            if (mysqli_query($db,$sqlSetning))
            {
                print ("F&oslash;lgende bilde er n&aring; registrert:<br/> bildenr: $bildenr <br/> filavn: $filnavn <br/> beskrivelse:$beskrivelse <br/>");
            }
            else
            {
                print ("ikke mulig &aring; registrere data i databasen");
                unlink($nyttnavn) or die ("ikke mulig &aring; slette bilde på serveren igjen");
            }
        }
    }
}
include("slutt.php");
?>