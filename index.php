<?php
//appel des classes requises
require ("class/FormStructure.php");
require ("class/Check.php");
require ("class/InputData.php");
require ("class/Recaptcha.php");
require ("class/Email.php");

//définition des variables 
$form = new FormStructure();
$data = new InputData();
$check = new Check();
$recaptcha = new Recaptcha();
$email = new Email();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script>
        function captchaSubmit(data) {
            document.getElementById("contact").submit();
        }
    </script>
</head>
<body>
	<div>
		<?php
		// si le formulaire a été posté
		if(!empty($_POST)){
		//on vérifie si le recaptcha est valide 
		$recaptcha->curlRequest();
		$recaptchaTest = $recaptcha->parseData();
		//on vérifie si les champs informés sont valides
		$check->checkForm($data);
		}
		//si le formulaire a été soumis et que les champs sont valides
		if(!empty($_POST) && $check->getCheckIsOK() == true){
			//si le test recaptcha est validé
			if($recaptchaTest == true){
				//on envoie un mail au client indiquant que la demande a bien été prise en compte
				//on inscrit l'adresse du destinaitaire
				$email->setAddresseeEmail("boulord.anthony@hotmail.com");
				// on inscrit  l'adresse de l'expéditeur (c'està dire nous)
				$email->setHeader("Anthony", "boulord.anthony@gmail.com", "Anthony", "boulord.anthony@gmail.com");
				//on inscrit le sujet du mail
				$email->setSubject("nous avons bien reçu votre demande");
				//on inscrit le contenu du mail au format texte
				$email->setTxtMessage("salut à tous voici un message écrit en txt");
				//on inscrit le contenu du mail au format HTML
				$email->setHtmlMessage("<html><head></head><body><b>salut à tous</b> voici un message écrit en txt</body></html>");
				//on expédie le mail
				$email->sentEmail();
				
				//on s'envoie une mail contenant le message du client		
				$email->setAddresseeEmail("boulord.anthony@hotmail.com");
				$email->setHeader("Anthony", "boulord.anthony@gmail.com", "Anthony", "boulord.anthony@gmail.com");
				$email->setSubject("message du client: ".$_POST['surname']." ".$_POST['contactName']."");
				$email->setTxtMessage("".$_POST['message']."");
				$email->setHtmlMessage("<html><head></head><body><p>".$_POST['message']."</p></body></html>");
				$email->sentEmail();
				
				//on inscrit un message au client indiquant que le mail à bien été envoyé et on lui propose une redirection vers la page d'accueil
				$email->setValidationMessage();
				echo $email->getValidationMessage();

			} else {
				//on inscrit un message au client indiquant que le test recaptcha n'a pas fonctionné et on lui propose de revenir au formulaire
				$recaptcha->setErrorMessage();
				echo $recaptcha->getErrorMessage();
			}
		} 
		//si le formulaire n'a pas été envoyé ou comporte des erreurs, on propose le formulaire à l'utilisateur
		else{
			// on affiche les messages d'erreur si certains champs du formulaire ne correspondent pas au regex définie dans la classe InputData
			echo $check->getErrorMessage();
			//si le formulaire comporte des erreurs, on laisse les champs affiché après soumission afin de ne pas avoir à les ré-écrire
			$data->setData($_POST);
			//on affiche le formulaire
			?>
			<form id="contact" method="post">
				<?php
				$form->setInput($data);
				?>
			</form>		
		<?php } ?>
		
	</div>

	<script type="text/javascript" src="js/form.js"></script>
</body>
</html>