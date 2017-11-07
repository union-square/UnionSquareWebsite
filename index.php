<?php
require ("class/FormStructure.php");
require ("class/Check.php");
require ("class/InputData.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<?php
		$form = new FormStructure();
		$data = new InputData();
		
		$check = new Check();
		echo'hello1';
		$check->checkForm($data);
		if(!empty($_POST) && $check->getCheckIsOK() == true){

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
			<form method="post">
				<?php
				$form->setInput($data);
				?>
			</form>		
		<?php } ?>
		
	</div>
</body>
</html>