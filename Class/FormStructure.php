<?php

class Formstructure
{
	private $input;

	public function setInput($type = "", $value = "", $name = "", $labelContent = "", $errMessage = ""){
		
		
		if ($type =="submit" || $type =="reset" || $type =="button"){
			$this->input = '<input type="'.$type.'" value = "'.$value.'"></input>';
		
		} elseif ($type == "text" || $type == "email" || $type == "number" || $type == "tel"){
			$this->input = '<p>
			<label class="labelForm" for="'.$name.'">'.$labelContent.'</label>
			<input type="'.$type.'" class="champForm" id="'.$name.'" name="'.$name.'" value="'.$value.'" min="0" max="12" step="1" required="required">
			<span id="'.$name.'Statut" style="display:none;">'.$errMessage.'</span>  
			</p>
			';
		}
		echo $this->input;
	}

	public function textArea($name = "", $labelContent = "", $value = "", $rows = "", $cols = "", $maxLength= "2000"){
		$this->input = '<p>
		<label class="labelForm" for="'.$name.'">'.$labelContent.'</label>
		<textarea name= "'.$name.'" rows= "'.$rows.'" cols="'.$cols.'" required="required" maxlength="'.$maxLength.'">'.$value.'</textarea>
		</p>
		';
		echo $this->input;
	}
}