<?php
include("start.php");
?> 

<h3>S&oslashk </h3>

<form method="post" action="" id="sokeSkjema" name="sokeSkjema">
    S&oslash;kestreng <input type="text" id="sokestreng" name="sokestreng" required /> <br/>
    <input type="submit" value="Fortsett" id="sokeKnapp" name="sokeKnapp" /> 
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
  if (isset($_POST ["sokeKnapp"]))
    {
      $sokestreng=$_POST ["sokestreng"];

      include("db-tilkobling.php");

      print ("Treff for s&oslash;kestrengen <strong>$sokestreng</strong> <br /><br />");  
	  

      $sqlSetning="SELECT * FROM klasse WHERE klassekode LIKE '%$sokestreng%' OR klassenavn LIKE '%$sokestreng%' OR studiumkode LIKE '%$sokestreng%';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat); 

      if ($antallRader==0) 
        {
          print ("Treff i KLASSE-tabellen: <br /> Ingen <br /> <br />");  
        }
      else 
        {
          print ("Treff i Klasse-tabellen: <br />");  
          print ("<table border=1");  
          print ("<tr><th align=left>klassekode klassenavn studiumkode</th> </tr>");

          for ($r=1;$r<=$antallRader;$r++)
            {
              $rad=mysqli_fetch_array($sqlResultat);
              $klassekode=$rad["klassekode"];     
              $klassenavn=$rad["klassenavn"];
              $studiumkode=$rad["studiumkode"];

              $sokestrenglengde=strlen($sokestreng);

              print("<tr><td> ");
              $tekst="$klassekode $klassenavn $studiumkode";
              $startpos=stripos($tekst,$sokestreng);

              while ($startpos!==false)
              {
                $tekstlengde=strlen($tekst);

                $hode=substr($tekst,0,$startpos);
                $sok=substr($tekst,$startpos,$sokestrenglengde);
                $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde);

                print("$hode<strong><font color='blue'>$sok</font></strong>");

                $tekst=$hale;
                $startpos=stripos($tekst,$sokestreng);
              }
              print("$hale</td></tr>"); 
             }
             print ("</table> </br />");
        }
        
        

        $sqlSetning="SELECT * FROM bilde WHERE bildenr LIKE '%$sokestreng%' OR opplastingsdato LIKE '%$sokestreng%' OR filnavn LIKE '%$sokestreng%' OR beskrivelse LIKE '%$sokestreng%';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat); 
  
        if ($antallRader==0) 
          {
            print ("Treff i BILDE-tabellen: <br /> Ingen <br /> <br />");  
          }
        else 
          {
            print ("Treff i Bilde-tabellen: <br />");  
            print ("<table border=1");  
            print ("<tr><th align=left>bildenr opplastingsdato filnavn beskrivelse</th> </tr>");
  
            for ($r=1;$r<=$antallRader;$r++)
              {
                $rad=mysqli_fetch_array($sqlResultat);
                $bildenr=$rad["bildenr"];     
                $opplastingsdato=$rad["opplastingsdato"];
                $filnavn=$rad["filnavn"];
                $beskrivelse=$rad["beskrivelse"];
  
                $sokestrenglengde=strlen($sokestreng);  
  
                print("<tr><td> ");
                $tekst="$bildenr $opplastingsdato $filnavn $beskrivelse";  
                $startpos=stripos($tekst,$sokestreng);  
  
                while ($startpos!==false)
                {
                  $tekstlengde=strlen($tekst);
  
                  $hode=substr($tekst,0,$startpos);
                  $sok=substr($tekst,$startpos,$sokestrenglengde);
                  $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde);
  
                  print("$hode<strong><font color='blue'>$sok</font></strong>");
  
                  $tekst=$hale;
                  $startpos=stripos($tekst,$sokestreng);
                }
                print("$hale</td></tr>"); 
               }
               print ("</table> </br />");
          }

          $sqlSetning="SELECT * FROM student WHERE brukernavn LIKE '%$sokestreng%' OR fornavn LIKE '%$sokestreng%' OR etternavn LIKE '%$sokestreng%' OR klassekode LIKE '%$sokestreng%' OR bildenr LIKE '%$sokestreng%';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 
    
          if ($antallRader==0) 
            {
              print ("Treff i STUDENT-tabellen: <br /> Ingen <br /> <br />");  
            }
          else 
            {
              print ("Treff i STUDENT-tabellen: <br />");  
              print ("<table border=1");  
              print ("<tr><th align=left>brukernavn fornavn etternavn klassekode bildenr</th> </tr>");
    
              for ($r=1;$r<=$antallRader;$r++)
                {
                  $rad=mysqli_fetch_array($sqlResultat);
                  $brukernavn=$rad["brukernavn"];     
                  $fornavn=$rad["fornavn"];
                  $etternavn=$rad["etternavn"];
                  $klassekode=$rad["klassekode"];
                  $bildenr=$rad["bildenr"];
    
                  $sokestrenglengde=strlen($sokestreng); 
    
                  print("<tr><td> ");
                  $tekst="$brukernavn $fornavn $etternavn $klassekode $bildenr";
                  $startpos=stripos($tekst,$sokestreng);
    
                  while ($startpos!==false)
                  {
                    $tekstlengde=strlen($tekst);
    
                    $hode=substr($tekst,0,$startpos);
                    $sok=substr($tekst,$startpos,$sokestrenglengde);
                    $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde);
    
                    print("$hode<strong><font color='blue'>$sok</font></strong>");
    
                    $tekst=$hale;
                    $startpos=stripos($tekst,$sokestreng);
                  }
                  print("$hale</td></tr>"); 
                 }
                 print ("</table> </br />");
            }
  

     }

     include("slutt.php");
?>  