<?php 
//appel des classes requises
require ("Class/FormStructure.php");
require ("Class/CheckSubmittedData.php");
require ("Class/FormData.php");
require ("Class/Recaptcha.php");
require ("Class/Email.php");

//définition des variables 
$form = new FormStructure();
$formData = new FormData();
$checkSubmittedData = new CheckSubmittedData();
$recaptcha = new Recaptcha();
$email = new Email();

require'incl/header.php'; 

?>
	<section id="contact">
	<div class="row">
		<div class="col-md-offset-1 col-md-4">
			<h1>Contactez-nous &#38; rencontrez-nous !</h1>
			<p>Vous avez un projet, une idée ou juste l’envie de prendre un café en notre compagnie ?<br>
			Remplissez le formulaire à votre disposition et nous vous contacterons <b>dans les plus brefs délais.</b></p>
		</div>
		<div class="col-md-offset-2 col-md-4" id="formFrame">
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
						$email->setAddresseeEmail($_POST['contactEmail']);
						$email->setHeader("Union Square", "contact@unionsquare.fr");
						$email->setSubject("Nous avons bien reçu votre demande");
						$email->setMessage("<p>Bonjour ".$_POST['contactName'].",</br></br>
							Vous êtes entré en contact avec le collectif <b>Union Square</b> et nous vous en remercions. </br></br>
							Cette email vous a été envoyé automatiquement pour vous confirmer que votre demande nous a bien été transmise.</br></br>
							L'équipe d'Union Square vous recontactera rapidement.</br></br>
							A très bientôt,</br></br>
							Union Square</br></br>
							</p>");
						$email->sentEmail();
						
						//on s'envoie un mail contenant le message du client		
						$email->setAddresseeEmail("contact@unionsquare.fr");
						$email->setHeader("Union Square", "contact@unionsquare.fr");
						$email->setSubject("message du client: ".$_POST['contactName']."");
						$email->setMessage("<p>
												nom du client : ".$_POST['contactName']."</br></br>
												contenu du message : ".$_POST['message']."</br></br>
												numéro de téléphone du client : ".$_POST['telephone']."</br></br>
												email du client : ".$_POST['contactEmail']."</br></br>
											</p>");
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
	</div>
	</section>
<?php require 'incl/footer.php';?>