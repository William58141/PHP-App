function finn(bildenr) {
	var foresporsel=new XMLHttpRequest();


foresporsel.onreadystatechange=function() {

	if (foresporsel.readyState === 4 && foresporsel.status === 200) 
	{
		var svar=foresporsel.responseText;
		var del=svar.split(";");
		var opplastingsdato=del[0];
		var filnavn=del[1];
		var beskrivelse=del[2];

		document.getElementById("opplastingsdato").value = opplastingsdato;
		document.getElementById("filnavn").value = filnavn;
		document.getElementById("beskrivelse").value = beskrivelse;
	}
};

foresporsel.open("GET","finn-bilde.php?bildenr=" + bildenr);
foresporsel.send();

}