<?php

class Formstructure
{
	private $input;

	public function setInput(InputData $data){
		
		foreach ($data->getData() as $value){
			
			if(!empty($value['type'])){
				
				if ($value['type'] =="reset" || $value['type'] =="button"){
				$this->input = '<input type="'.$value['type'].'" value = "'.$value['value'].'"></input>';
				
				} 
				//on met le submit à part pour inclure le captcha
				elseif($value['type'] =="submit"){
					$this->input = '<input type="'.$value['type'].'" class="g-recaptcha" data-sitekey="'.$value['data-sitekey'].'" data-callback="captchaSubmit" data-badge="inline" value = "'.$value['value'].'"></input>';
				} 

				elseif ($value['type'] == "text" || $value['type'] == "email" || $value['type'] == "number" || $value['type'] == "tel"){
				$this->input = '<p>
				<label class="labelForm" for="'.$value['name'].'">'.$value['labelContent'].'</label>
				<input type="'.$value['type'].'" class="champForm" id="'.$value['name'].'" name="'.$value['name'].'" value="'.$value['value'].'" min="0" max="12" step="1" required="required">
				<span id="'.$value['name'].'Statut" style="display:none;">'.$value['errMessage'].'</span>  
				</p>
				';
				}
				

			} elseif(!empty($value['rows'])){
				$this->input = '<p>
				<label class="labelForm" for="'.$value['name'].'">'.$value['labelContent'].'</label>
				<textarea name= "'.$value['name'].'" rows= "'.$value['rows'].'" cols="'.$value['cols'].'" required="required" maxlength="'.$value['maxLength'].'">'.$value['value'].'</textarea>
				</p>
				';
			}
			echo $this->input;
		}
	}
}