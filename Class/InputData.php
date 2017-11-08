<?php

class InputData
{
	//tableau contenant les données nécessaires à la création du formulaire
	private $data =[
		'surname'=>[
			'type'=> 'text',
			'value' =>'',
			'name' =>'surname',
			'labelContent' =>'Prénom <b>*</b> : ' ,
			'errMessage' =>"Votre prénom ne semble pas valide (entre 2 et 60 caractères, absence de chiffre)",
			'regex' =>'/^[A-Za-zéèêëàîïôù-]{2,}$/'],
		'contactName'=>[
			'type'=> 'text',
			'value' =>'',
			'name' =>'contactName',
			'labelContent' =>'Nom <b>*</b> : ' ,
			'errMessage' =>"Votre nom de famille ne semble pas valide (entre 2 et 60 caractères, absence de chiffre)", 
			'regex'=>'/^[A-Za-zéèêëàîïôù-]{2,}$/'],
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
			'labelContent' =>'Téléphone<b>*</b> : ',
			'errMessage' =>"Votre numéro de téléphone ne semble pas valide (10 chiffres commençant par 0)",
			'regex' =>'/^0[1-68]([-. ]?[0-9]{2}){4}$/'],
		'message' =>[
			'name' => "message",
			'labelContent' => 'Message (2000 caractères maximum)<b>*</b> : ',
			'value' => '',
			'rows' => '10',
			'cols' => '50',
			'maxLength' => '2000'],
		'reset' =>[
			'type' => 'reset',
			'value' => 'Réinitialiser le formulaire'],
		'submit' =>[
			'type' => 'submit',
			'value' => 'Envoyer',
			'data-sitekey' =>  '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI']
	];

	public function getData(){
		return $this->data;
	}

	//permet d'afficher dans chaque champs les valeurs qui avait été rentrées dans le formulaire après que ce formulaire ai été soumis
	public function setData($post){
		foreach ($this->data as $key => &$value) {
			if(!empty($post)){
				if ($value['value'] == ''){
					$value['value'] = $post[$key];
				}
			}
		}
	}
}