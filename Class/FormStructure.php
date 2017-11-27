<?php

class Formstructure
{
	private $formElement;

	//définition du contenu des éléments composant le formulaire
	public function setFormElement(FormData $data){
		
		foreach ($data->getFormData() as $value){
			
			//définition de tous les élements Input
			if(!empty($value['type'])){

				if ($value['type'] == "text" || $value['type'] == "email" || $value['type'] == "number" || $value['type'] == "tel"){
					$this->formElement = '<p>
					<label class="labelForm" for="'.$value['name'].'">'.$value['labelContent'].'</label></br>
					<input type="'.$value['type'].'" class="champForm" id="'.$value['name'].'" name="'.$value['name'].'" value="'.$value['value'].'" placeholder="'.$value['placeholder'].'" min="0" max="12" step="1" required="'.$value['required'].'">
					<span class="messageForm" id="'.$value['name'].'Statut" style="display:none;">'.$value['errMessage'].'</span>  
					</p>
					';

				} elseif ($value['type'] =="reset" || $value['type'] =="button"){
					$this->formElement = '<input type="'.$value['type'].'" value = "'.$value['value'].'"></input>';
				} 
				//on met le submit à part pour inclure le captcha
				elseif($value['type'] =="submit"){
					$this->formElement = '<button class="g-recaptcha" data-sitekey="'.$value['data-sitekey'].'" data-callback="onSubmit">Envoyer</button>';
				} 	

			} /*définition des éléments de type textarea*/
			elseif(!empty($value['rows'])){
				$this->formElement = '<p>
				<label class="labelForm" for="'.$value['name'].'">'.$value['labelContent'].'</label></br>
				<textarea name= "'.$value['name'].'" id="'.$value['name'].'"  rows= "'.$value['rows'].'" cols="'.$value['cols'].'" required="'.$value['required'].'" maxlength="'.$value['maxLength'].'" placeholder="'.$value['placeholder'].'">'.$value['value'].'</textarea>
				<span class="messageForm" id="'.$value['name'].'Statut" style="display:none;">'.$value['errMessage'].'</span> 
				</p>
				<p>Champs Obligatoires *<p>
				';
			}
			echo $this->formElement;
		}
	}
}