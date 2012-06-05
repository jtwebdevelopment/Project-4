window.onload = koppelevents;

function koppelevents(){
	var links = document.getElementsByTagName('a');
	for (i = 0; links.length; i++) {
		if(links[i].getAttribute('id') == 'loginpopoutbtn')
		{
			links[i].onclick = togglelogincontainer;
		}
		
		if(links[i].getAttribute('id') == 'maakopdrachtbtn')
		{
			links[i].onclick = togglecreateopdracht;
		}	

		if(links[i].getAttribute('id') == 'maaknotitiebtn')
		{
			links[i].onclick = togglecreatenotitie;
		}		

		if(links[i].getAttribute('id') == 'sluitLoginMenu')
		{
			links[i].onclick = togglelogincontainer;
		}	
	}	
}

function togglelogincontainer(){
	var visibility = document.getElementById('logincontainer');
	if(visibility.getAttribute('class') == 'visible')
		{
			visibility.setAttribute('class','invisible');
		}
	else visibility.setAttribute('class','visible');
	}

function togglecreateopdracht(){
	var visibility = document.getElementById('createopdracht');
	if(visibility.getAttribute('class') == 'visible')
		{
			visibility.setAttribute('class','invisible');
		}
	else visibility.setAttribute('class','visible');
	}
	
	function togglecreatenotitie(){
	var visibility = document.getElementById('createnotitie');
	if(visibility.getAttribute('class') == 'visible')
		{
			visibility.setAttribute('class','invisible');
		}
	else visibility.setAttribute('class','visible');
	}