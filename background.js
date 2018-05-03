// Reçoit l liste de smots clés depuis fichier getKeywordsList.php
function getKeywordsList(){
 const req = new XMLHttpRequest();
req.open('GET', 'http://localhost/Comparateur_ethique/getKeywordsList.php', false); 
req.send(null);

if (req.status === 200) {

    console.log("Réponse reçue: %s", req.responseText);
    return JSON.parse(req.responseText);
} else {
    console.log("Status de la réponse: %d (%s)", req.status, req.statusText);
}
}



//Lance la fonction showNotification dès qu'une page est rafraîchie.
chrome.tabs.onUpdated.addListener(function() {

					var keywords = getKeywordsList();
					//console.log ('ma liste est ', keywords)
					showNotification();
				}); 


// test notification avec boucle
function showNotification()//gestion de la boite de dialogue
{
	chrome.tabs.query({'active': true, 'lastFocusedWindow': true}, function (tabs) {
		//récupère url
		var url = tabs[0].url;
		//console.log('mon url =', url);
		//liste tous les numéros de tableaux qui ont pour mot clé le mot trouvé dans l'url
		var modelesAAfficher = new Array();

		var keywordsList = getKeywordsList();

		console.log("ma keywordlist = ", keywordsList);
		
		for (var i = 0; i <= keywordsList.length-1; i++) {
			
			var recherche = url.indexOf(keywordsList[i]);
			//console.log('mot cherché =', keywordsList[i]);
			
			if (recherche>-1) {
				//trouve = tables[i][0];
				modelesAAfficher.push(i);
				var myKeyword = keywordsList[i];
				

			}else{}

		}

		if (modelesAAfficher.length>=1){
		

			//Ouvre notification si on trouve un modèle de notre base de donnée dans l'url
			chrome.notifications.create('reminder', {
				type: 'basic',
				iconUrl:'icon.png',
				title: 'Dress Me Fair',
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

