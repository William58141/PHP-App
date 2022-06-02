function finn(klassekode) 
{
var foresporsel=new XMLHttpRequest();
foresporsel.onreadystatechange=function() 
{

	if (foresporsel.readyState === 4 && foresporsel.status === 200) 
	{
		var svar=foresporsel.responseText;
		var del=svar.split(";");
		var klassenavn=del[0];
		var studiumkode=del[1];

		document.getElementById("klassenavn").value = klassenavn;
		document.getElementById("studiumkode").value = studiumkode;
		
	}
};

foresporsel.open("GET","finn-klasse.php?klassekode=" + klassekode);
foresporsel.send();

}