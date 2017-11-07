<?php

class InputData
{
	private $data =[
		'contactName'=>[
			'type'=> 'text',
			'value' =>'',
			'name' =>'contactName',
			'labelContent' =>'Nom <b>*</b> : ' ,
			'errMessage' =>"Votre nom de famille ne semble pas valide (entre 2 et 60 caractères, absence de chiffre", 
			'regex'=>'/^[A-Za-zéèêëàîïôù-]{2,}$/'],
		'surname'=>[
			'type'=> 'text',
			'value' =>'',
			'name' =>'surname',
			'labelContent' =>'Prénom <b>*</b> : ' ,
			'errMessage' =>"Votre prénom ne semble pas valide (entre 2 et 60 caractères, absence de chiffre)",
			'regex' =>'/^[A-Za-zéèêëàîïôù-]{2,}$/'],
		'contactEmail'=>[
			'type'=> 'email',
			'value' =>'',
			'name' =>'contactEmail',
			'labelContent' =>'Adresse courriel<b>*</b> : ',
			'errMessage' =>"Votre email ne semble pas valide",
			'regex' =>'/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
		'telephone'=>[
			'type'=> 'tel',
			'value' =>'',
			'name' =>'telephone',
			'labelContent' =>'Numéro de téléphone<b>*</b> : ',
			'errMessage' =>"Votre numéro de téléphone ne semble pas valide",
			'regex' =>'/^0[1-68]([-. ]?[0-9]{2}){4}$/'],
		'message' =>[
			'name' => "message",
			'labelContent' => 'Message<b>*</b> : ',
			'rows' => '10',
			'cols' => '50'
		]
	];

	public function getData(){
		return $this->data;
	}
}