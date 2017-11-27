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
        function onSubmit(data) 
        {
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
			$postRecaptcha = $_POST['g-recaptcha-response'];
			$response = $recaptcha->verifyResponse($_POST['g-recaptcha-response']);

			if(!empty($postRecaptcha)){
			//on vérifie si les données renseignées sont valides
			$checkSubmittedData->checkForm($formData);
				
				if ($checkSubmittedData->getFormDataValidation() == true){
					//si une erreur est survenu au niveau du recaptcha
					if(isset($response['success']) and $response['success'] != true) {
						echo "Une erreur est survenue. Le code de l'erreur est :".$response['error-codes'];
					}
					//si le recaptcha a validé l'envoi
					else {	
					//on envoie un mail au client indiquant que la demande a bien été prise en compte
					$email->setAddresseeEmail("boulord.anthony@hotmail.com");
					$email->setHeader("Anthony", "boulord.anthony@gmail.com", "Anthony", "boulord.anthony@gmail.com");
					$email->setSubject("nous avons bien reçu votre demande");
					$email->setMessage("<p>Bonjour ".$_POST['contactName'].",</br></br>
						Vous êtes entré en contact avec le collectif <b>Union Square</b> et nous vous en remercions. </br></br>
						Cette email vous a été envoyé automatiquement pour vous confirmer que votre demande nous a bien été transmise.</br></br>
						L'équipe d'Union Square vous recontactera rapidement.</br></br>
						A très bientôt,</br></br>
						Union Square</br></br>
						</p>");
					$email->sentEmail();
					
					//on s'envoie un mail contenant le message du client		
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
					echo $checkSubmittedData->getErrorMessage();
					//on enregistrer les valeurs qui sont valides afin de ne pas avoir à les renseignées à nouveau
					$formData->setFormDataValue($_POST);
					?>
					<form id="contact" method="post">
						<?php
						$form->setFormElement($formData);
						?>
					</form>		
					<?php 
				} 
			}
		} else{
			?>
			<form id="contact" method="post">
				<?php
				$form->setFormElement($formData);
				?>
			</form>		
			<?php 
		} ?>
	</div>

	<script type="text/javascript" src="js/form.js"></script>
</body>
</html>