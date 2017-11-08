<?php

class Check
{
	private $variable;

	private $errorMessage;

	private $checkIsOk = true;

	//fonction permettant de vérifier si tous les champs sont valides. 
	public function checkForm(InputData $data)
	{
		// pour toutes données du formulaire 
		foreach ($data->getData() as $key =>$value) {
			// ayant une regex définie dans la classe InputData
			if(!empty($value['regex'])){
				//si les données $_POST soumises ne matchent pas avec la regex
				if(!preg_match($value['regex'], $_POST[$key])){
					//alors le message d'erreur définir dans la classe Inpudata est enregistré dans la variable errorMessage
					$this->errorMessage .= '<p>'.$value['errMessage'].'</p>';
					//et la variable checkIsOk prend la valeur false
					$this->checkIsOk = false;
				}
			}					
		}
	}
	// fonction permettant de récupérer tous les messages d'erreur après que le formulaire ai été rempli
	public function getErrorMessage(){
		return $this->errorMessage;
	}

	public function getCheckIsOK(){
		return $this->checkIsOk;
	}
}
