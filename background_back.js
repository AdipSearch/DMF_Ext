
function getKeywordsList(){
	// xhttp = new XMLHttpRequest();
 //  xhttp.onreadystatechange = function() {
 //    if (this.readyState == 4 && this.status == 200) {
 //    var keywordsList = this.responseText;
 //    }
 //  };
 //  xhttp.open("GET","getKeywordsList.php", true);
 //  xhttp.send();
 console.log('gogogo');
 const req = new XMLHttpRequest();
req.open('GET', 'http://localhost/Comparateur_ethique_(copie)/getKeywordsList.php', false); 
req.send(null);

if (req.status === 200) {
	showNotification();

    console.log("Réponse reçue: %s", req.responseText);
} else {
    console.log("Status de la réponse: %d (%s)", req.status, req.statusText);
}
}





//Lance la fonction showNotification dès qu'une page est rafraîchie.
chrome.tabs.onUpdated.addListener(function() {
	
					getKeywordsList();
				}); 


// test notification avec boucle
function showNotification()//gestion de la boite de dialogue
{
	chrome.tabs.query({'active': true, 'lastFocusedWindow': true}, function (tabs) {
		//récupère url
		var url = tabs[0].url;
		//liste tous les numéros de tableaux qui ont pour mot clé le mot trouvé dans l'url
		var modelesAAfficher = new Array();
		
		for (var i = 0; i <= keywords.length-1; i++) {
			
			var recherche = url.indexOf(keywords[i]);
			
			if (recherche>-1) {
				
				modelesAAfficher.push(i);
				var myKeyword = keywords[i];

			}else{}

		}

		if (modelesAAfficher.length>=1){

			//Ouvre notification si on trouve un modèle de notre base de donnée dans l'url
			chrome.notifications.create('reminder', {
				type: 'basic',
				iconUrl:'icon.png',
				title: 'Des marques plus éthiques',
				message: 'DressMeFair peut vous proposer des modèles plus éthiques.'
			});
			//Ouvre une fenêtre quand on clique sur la notification

			chrome.notifications.onClicked.addListener(function() {

				
				var myWindow = window.open("http://localhost/Comparateur_ethique/list.php?keyword="+myKeyword, "MsgWindow", "width=600px,height=600px");
				/*myWindow.document.write("<h1>DressMeFair</h1>");
				//intègre un à un dans la fenêtre, les modèles éthiques correspondant aux modèles consultés.
				for (var j = 0; j <= modelesAAfficher.length-1; j++) {
					myWindow.document.write(tables[modelesAAfficher[j]].join('')+'');
				}*/

				

				
			});

		}
	});
};

