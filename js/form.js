//affichage des messages d'erreurs pour les champs du formulaire
var contactName = document.querySelector('#contactName');
var message = document.querySelector('#message');
var contactEmail = document.querySelector('#contactEmail');
var telephone = document.querySelector('#telephone');

contactName.addEventListener('change', function(e) {
	validateForm(e.target,/^[A-Za-zéèêëàîïôùç -]{2,}$/, 'contactName', 'Votre nom ne semble pas valide (entre 2 et 60 caractères, absence de chiffre)');
})

message.addEventListener('change', function(e){
	validateForm(e.target,/^[A-Za-zéèêëàîïôùç.=!?;:%,'"+*#&\(\)/@_\n 0-9-]{2,}$/, 'message', 'Veuillez entrer un message');
})

contactEmail.addEventListener('change', function(e){
	validateForm(e.target,/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/, 'contactEmail', 'Votre adresse email ne semble pas valide');
})

telephone.addEventListener('change', function(e){
	validateForm(e.target,/^0[1-68]([-. ]?[0-9]{2}){4}$/, 'telephone', 'Votre numéro de téléphone ne semble pas valide (10 chiffres commençant par 0)');
})

function validateForm(element, regex, id, text)
{
	var validationIcon = document.createElement('img');
		validationIcon.setAttribute('src', "img/valid.svg");
		validationIcon.setAttribute('alt', "icone de validation");
		validationIcon.setAttribute('id', id +"validationIcon");
	var messageElement = document.querySelector ('#'+id+'Statut');
	var Icon = document.querySelector ('#'+id+'Statut').firstChild;
	var errorIcon = document.createElement('img');
		errorIcon.setAttribute('src', "img/unValid.svg");
		errorIcon.setAttribute('alt', "icone d'erreur");
	var errorText = document.createTextNode(text);
	console.log(messageElement);
	console.log(validationIcon);
	// un icône de vérification est présent et que le contenu des chamsp ne matchent pas les regex 
	if(!regex.test(element.value) && /*Icon.nodeName.toLowerCase() == 'img'*/ messageElement.firstChild.id == id +"validationIcon"){
		messageElement.className = "errorMessage"
		messageElement.replaceChild(errorIcon, messageElement.firstChild);
		messageElement.appendChild(errorText);
		element.nextElementSibling.style.display = 'inline-block';
		element.nextElementSibling.style.color = '#e66868';

	// le contenu des champs matchent
	} else if(regex.test(element.value)){
		messageElement.className = "validationMessage"
		messageElement.innerText = "";
		messageElement.appendChild(validationIcon);

		element.nextElementSibling.style.display = 'inline-block';
		element.nextElementSibling.style.color = 'green';
	//le contenu ne matchent pas (cas où le champs est rempli pour la première fois: le message d'erreur enregistrée dans la classe FormData est celui qui s'affiche )
	} else {
		element.nextElementSibling.style.display = 'inline-block';
		element.nextElementSibling.style.color = '#e66868';
	}
}