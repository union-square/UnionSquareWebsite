<?php

class FormData
{
	//tableau contenant les données nécessaires à la création du formulaire
	private $formData =[
		'contactName'=>[
			'type'=> 'text',
			'value' =>'',
			'name' =>'contactName',
			'labelContent' => 'Nom *',
			'placeholder' =>'' ,
			'required'=>'required',
			'errMessage' =>"<img src=\"img/unValid.svg\" alt=\"icône d'erreur\"> Votre nom ne semble pas valide (entre 2 et 60 caractères, absence de chiffre)", 
			'regex'=>'/^[A-Za-zéèêëàîïôù-]{2,}$/'],
		'companyName'=>[
			'type'=> 'text',
			'value' =>'',
			'name' =>'companyName',
			'labelContent' => 'Société ',
			'placeholder' =>'' ,
			'required'=>'',
			'errMessage' =>""],
		'contactEmail'=>[
			'type'=> 'email',
			'value' =>'',
			'name' =>'contactEmail',
			'labelContent' => 'Email *',
			'placeholder' =>'' ,
			'required'=>'required',
			'errMessage' =>"<img src=\"img/unValid.svg\" alt=\"icône d'erreur\"> Votre adresse Email ne semble pas valide",
			'regex' =>'/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
		'telephone'=>[
			'type'=> 'tel',
			'value' =>'',
			'name' =>'telephone',
			'labelContent' => 'Téléphone *',
			'placeholder' =>'' ,
			'required'=>'required',
			'errMessage' =>"<img src=\"img/unValid.svg\" alt=\"icône d'erreur\"> Votre numéro de téléphone ne semble pas valide (10 chiffres commençant par 0)",
			'regex' =>'/^0[1-68]([-. ]?[0-9]{2}){4}$/'],
		'message' =>[
			'name' => "message",
			'labelContent' => 'Votre Message *',
			'placeholder' =>'' ,
			'required'=>'required',
			'errMessage' =>"<img src=\"img/unValid.svg\" alt=\"icône d'erreur\"> Veuillez entrer un message",
			'value' => '',
			'rows' => '5',
			'cols' => '60',
			'maxLength' => '2000',
			'regex'=>'/^[A-Za-zéèêëàîïôù-]{2,}$/'],
		'submit' =>[
			'type' => 'submit',
			'value' => 'Envoyer',
			'data-sitekey' =>  '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI']
	];

	public function getFormData(){
		return $this->formData;
	}

	//permet d'afficher dans chaque champs les valeurs qui avait été rentrées dans le formulaire après que ce formulaire ai été soumis
	public function setFormDataValue($post){
		foreach ($this->formData as $key => &$value) {
			if(!empty($post)){
				if ($value['value'] == ''){
					$value['value'] = $post[$key];
				}
			}
		}
	}
}