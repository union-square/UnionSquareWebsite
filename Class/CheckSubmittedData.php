<?php

class CheckSubmittedData
{
	private $errorMessage;

	private $formDataValidation = true;

	/*vérification de la validité des champs du formulaire. 
	En cas de non validité, un message d'erreur est enregistré dans la varaible errorMessage et le formulaire n'est pas validé*/
	public function checkForm(FormData $data)
	{
		foreach ($data->getFormData() as $key =>$value) {
			if(!empty($value['regex']) && !preg_match($value['regex'], $_POST[$key])){
				$this->errorMessage .= '<p class="errorMessageCheckFormPhp">'.$value['errMessage'].'</p>';
				$this->formDataValidation = false;
			}					
		}
	}

	// récupération de tous les messages d'erreur après que le formulaire ai été rempli
	public function getErrorMessage(){
		return $this->errorMessage;
	}

	public function getFormDataValidation(){
		return $this->formDataValidation;
	}
}
