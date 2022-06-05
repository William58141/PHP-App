<?php
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];

if (!$innloggetBruker)
{
    print("<meta http-equiv='refresh' content='0;url=innlogging.php'>");
}

?>

<html>
<head>
    <title>Student App</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" title="stilark" />
</head>
<body class="style">
    <div id="box">

        <header class="head">
            <h1>Student App</h1>
        </header>
<nav>
    <h3>Funksjoner</h3>
    <ul>
        <li><p><a href="hoved.php">Hjem</a><br/></p></li>
        <li><p><a href="registrer-klasse.php">Registrer klasse</a><br/></p></li>
        <li><p><a href="vis-alle-klasser.php">Vis alle klasser</a><br/></p></li>
        <li><p><a href="endre-klasse.php">Endre klasse</a><br/></p></li>
        <li><p><a href="slett-klasse.php">Slett klasse</a><br/></p></li>
        <li><p><a href="registrer-bilde.php">Registrer bilde</a><br/></p></li>
        <li><p><a href="vis-alle-bilder.php">Vis alle bilder</a><br/></p></li>
        <li><p><a href="endre-bilde.php">Endre bilde</a><br/></p></li>
        <li><p><a href="slett-bilde.php">Slett bilde</a><br/></p></li>
        <li><p><a href="registrer-student.php">Registrer student</a><br/></p></li>
        <li><p><a href="vis-alle-studenter.php">Vis alle studenter</a><br/></p></li>
        <li><p><a href="endre-student.php">Endre student</a><br/></p></li>
        <li><p><a href="slett-student.php">Slett student</a><br/></p></li>
        <li><p><a href="sok.php">Søk</a><br/></p></li>
        <li><p><a href="vis-klasseliste.php">Vis klasseliste</a><br/></p></li>
        <li><p><a href="utlogging.php">Logg ut</a><br/></p></li>
    </ul> 
</nav>

<article>
