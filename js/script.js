//	*****	SANDWICH ICON	*****

var header = document.querySelector('header');
var burgerIcon = document.querySelector('header>div');
var nav = document.querySelector('header>nav');
var ul = document.querySelector('header>nav>ul');
var li = document.querySelectorAll('header>nav>ul>li');

burgerIcon.addEventListener('click', function(){
	if(header.id == "desactivatedBurger"){
		header.id = 'activatedBurger';
		burgerIcon.setAttribute("class","activatedBurger");
		nav.setAttribute("class","activatedBurger");
		ul.setAttribute("class","activatedBurger");
		for (i = 0; i<li.length; i++){
			li[i].setAttribute("class","activatedBurger");
			burgerIcon.innerHTML = '&#10006';
		}	
	} else if(header.id == "activatedBurger"){
		header.id = 'desactivatedBurger';
		burgerIcon.removeAttribute("class");
		nav.removeAttribute("class");
		ul.removeAttribute("class");
		for (i = 0; i<li.length; i++){
			li[i].removeAttribute("class");
			burgerIcon.innerHTML = '&#9776';
		}
		
	}
});

for (i =0; i<li.length; i++){
	li[i].addEventListener('click', function(){
		if(header.id == "activatedBurger"){
			header.id = 'desactivatedBurger';
			burgerIcon.removeAttribute("class");
			nav.removeAttribute("class");
			ul.removeAttribute("class");
			for (i = 0; i<li.length; i++){
				li[i].removeAttribute("class");
				burgerIcon.innerHTML = '&#9776';
			}	
		}
	});
};