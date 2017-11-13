<?php
//appel des classes requises
require ("class/FormStructure.php");
require ("class/CheckSubmittedData.php");
require ("class/FormData.php");
require ("class/Recaptcha.php");
require ("class/Email.php");

//définition des variables 
$form = new FormStructure();
$formData = new FormData();
$checkSubmittedData = new CheckSubmittedData();
$recaptcha = new Recaptcha();
$email = new Email();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script>
        function onSubmit(data) {
            document.getElementById("contact").submit();
        }
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
	<div id="formFrame">
		<?php
			if(!empty($_POST)){
				
				echo 'hello1';
				$varPostRecaptcha = $_POST['g-recaptcha-response'];
			
				$response = $recaptcha->verifyResponse($_POST['g-recaptcha-response']);
				// si le formulaire a été posté
				echo 'hello2';
			
			//vérification reCaptcha 
			
			if(!empty($varPostRecaptcha)){
			echo 'hello3';
			//on vérifie si les données renseignées sont valides
			$checkSubmittedData->checkForm($formData);
				//si les données renseignées sont valides
				if ($checkSubmittedData->getFormDataValidation() == true){
					//si une erreur est survenu au niveau du recaptcha
					if(isset($response['success']) and $response['success'] != true) {
						echo "An Error Occured and Error code is :".$response['error-codes'];
					}
					//si le recaptcha a validé l'envoi
					else {
					
					//on envoie un mail au client indiquant que la demande a bien été prise en compte
					//on inscrit l'adresse du destinaitaire
					$email->setAddresseeEmail("boulord.anthony@hotmail.com");
					// on inscrit  l'adresse de l'expéditeur (c'està dire nous)
					$email->setHeader("Anthony", "boulord.anthony@gmail.com", "Anthony", "boulord.anthony@gmail.com");
					//on inscrit le sujet du mail
					$email->setSubject("nous avons bien reçu votre demande");

					$email->setMessage("<p>Bonjour ".$_POST['contactName'].",</br></br>
						Vous êtes entré en contact avec le collectif <b>Union Square</b> et nous vous en remercions. </br></br>
						Cette email vous a été envoyé automatiquement pour vous confirmer que votre demande nous a bien été transmise.</br></br>
						L'équipe d'Union Square vous recontactera rapidement.</br></br>
						A très bientôt,</br></br>
						Union Square</br></br>
						</p>");
					//on expédie le mail
					$email->sentEmail();
					
					//on s'envoie une mail contenant le message du client		
					$email->setAddresseeEmail("boulord.anthony@hotmail.com");
					$email->setHeader("Anthony", "boulord.anthony@gmail.com", "Anthony", "boulord.anthony@gmail.com");
					$email->setSubject("message du client: ".$_POST['contactName']."");
					$email->setMessage("".$_POST['message']."");
					$email->sentEmail();
					
					}
					?>
					<form id="contact" method="post">
						<?php
						$form->setFormElement($formData);
						?>
					</form>	
					<?php
					//messages pour indiquer si le mail a été envoyé ou non
					if($email->sentEmail()){
						echo'<div id="formSucceedMessage">
						<p>Votre message nous a été transmis, vous recevrez un email pour confirmer l\'envoi de votre message</p>
						<p>Nous vous recontacterons au plus vite. A bientôt!</p>
					</div>';
					} else{
						echo '<div id="formFailedMessage">
						<p>Une erreur est survenue, votre message n\'a pu nous être délivré</p>
						<p>Veuillez essayer à nouveau ou nous contacter par téléphone au 06.89.21.07.19</p>
					</div>';
					}
				} 
				// si les données renseignée ne sont pas valides
				else{
					//on affiche les messages d'erreur
					echo $checkSubmittedData->getErrorMessage();
					//on enregistrer les valeurs qui sont valides afin de ne pas avoir à les renseignées à nouveau
					$formData->setFormDataValue($_POST);
					?>
					<form id="contact" method="post">
						<?php
						$form->setFormElement($formData);
						?>
					</form>		
					<?php } 
				
			}
		}
			//si le formulaire n'a pas été envoyé ou comporte des erreurs, on propose le formulaire à l'utilisateur
			else{
				?>
				<form id="contact" method="post">
					<?php
					$form->setFormElement($formData);
					?>
				</form>		
			<?php } ?>
		
	</div>

	<script type="text/javascript" src="js/form.js"></script>
</body>
</html>