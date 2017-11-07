<?php

class Formstructure
{
	private $input;

	public function input($type = "", $value = "", $name = "", $labelContent = "", $errMessage = ""){
		
		
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

	public function textArea($name = "", $labelContent = "", $rows = "", $cols = ""){
		$this->input = '<p>
		<label class="labelForm" for="'.$name.'">'.$labelContent.'</label>
		<textarea name= "'.$name.'" rows= "'.$rows.'" cols="'.$cols.'" ></textarea>
		</p>
		';
		echo $this->input;
	}
}