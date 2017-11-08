<?php
require ("class/FormStructure.php");
require ("class/Check.php");
require ("class/InputData.php");
require ("class/Recaptcha.php");
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
		$form = new FormStructure();
		$data = new InputData();
		$check = new Check();
		$recaptcha = new Recaptcha();
		echo'hello1';

		$check->checkForm($data);
		if(!empty($_POST) && $check->getCheckIsOK() == true){
			//echo $_POST["g-recaptcha-response"];
			$recaptcha->curlRequest();
			$recaptcha->parseData();
			echo 'hello2';

		//si le formulaire a été envoyé: 
			//vérification donnée bonne
			//vérification du capchat
				//si capcha faux, rediriger vers formulaire
				//si captcha bon: 
					//message indiquant que le message a bien été envoyé avec lien de retour vers la page d'accueil
					//envoi mail au client 
					//envoi mail à nous 

		//si le formulaire n'a pas été envoyé: 
		} else{
			/*var_dump($_POST);*/
			$data->setData($_POST);
			echo $check->getErrorMessage();
			echo'hello3';
			?>
			<form id="contact" method="post">
				<?php
				$form->setInput($data);
				?>
			</form>		
		<?php } ?>
		
	</div>
</body>
</html>