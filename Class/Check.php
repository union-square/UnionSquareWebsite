<?php

class Check
{
	private $variable;

	private $errorMessage;

	private $checkIsOk = true;

	public function checkForm(InputData $data)
	{
		// pour toutes données du formulaire
		foreach ($data->getData() as $key =>$value) {
			// ayant une regex à valider
			if(!empty($value['regex'])){
				//si les données $_POST ont été envoyé et quelles ne matches pas avec la regex
				if(!empty($_POST[$key]) && !preg_match($value['regex'], $_POST[$key])){
						//alors un message d'erreur s'affiche
						$this->errorMessage .= '<p>'.$value['errMessage'].'</p>';
						//et le check des données du formulaire n'est pas valide 
						$this->checkIsOk = false;
				}
			}					
		}
	}

	public function getErrorMessage(){
		return $this->errorMessage;
	}

	public function getCheckIsOK(){
		return $this->checkIsOk;
	}
}
