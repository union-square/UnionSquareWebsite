//affichage des messages d'erreurs pour les champs du formulaire
var contactName = document.querySelector('#contactName');
var surname = document.querySelector('#surname');
var contactEmail = document.querySelector('#contactEmail');
var telephone = document.querySelector('#telephone');

contactName.addEventListener('keyup', function(e){
	validateForm(e.target,/^[A-Za-zéèêëàîïôù-]{2,}$/);
})

surname.addEventListener('keyup', function(e){
	validateForm(e.target,/^[A-Za-zéèêëàîïôù-]{2,}$/);
})

contactEmail.addEventListener('keyup', function(e){
	validateForm(e.target,/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
})

telephone.addEventListener('keyup', function(e){
	validateForm(e.target,/^0[1-68]([-. ]?[0-9]{2}){4}$/);
})

function validateForm(element, regex)
{
	if(!regex.test(element.value)){
		element.nextElementSibling.style.display = 'inline-block';
		element.nextElementSibling.style.color = 'red';
	} else{
	element.nextElementSibling.style.display = 'none';
	}
}