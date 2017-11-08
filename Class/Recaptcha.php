<?php

class Recaptcha
{
	private $secret;

	private $remoteip;

	private $url;

	private $response;

	private $curl;

	private $curlData;

	private $recaptcha;

	private $errorMessage;

	public function setSecret()
	{
		$this->secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";
	}

	public function getSecret()
	{
		return $this->secret;
	}

	public function setRemoteip()
	{
		$this->remoteip = $_SERVER["REMOTE_ADDR"];
	}

	public function getRemoteip()
	{
		return $this->remoteip;
	}



	public function setUrl()
	{
		$this->url = "https://www.google.com/recaptcha/api/siteverify";
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function setResponse()
	{
		$this->response = $_POST["g-recaptcha-response"];
	}

	public function getResponse()
	{
		return $this->response;
	}

	public function setCurl()
	{
		$this->curl = curl_init();
	}

	public function getCurl()
	{
		return $this->curl;
	}

	public function setCurlData()
	{
		$this->curlData = curl_exec($this->getCurl());
	}

	public function getCurlData()
	{
		return $this->curlData;
	}

	public function setRecaptcha()
	{
		$this->recaptcha = json_decode($this->getCurlData(), true);
	}

	public function getRecaptcha()
	{
		return $this->recaptcha;
	}

	public function setErrorMessage()
	{
		$this->errorMessage = '<p>La validation Recaptcha indique que la demande n\'est pas valide. Veuillez reformuler votre message.<p>
        		<form action="http://localhost/form/index.php">
    				<input type="submit" value="retour au formulaire" />
				</form>';
	}

	public function getErrorMessage()
	{
		return $this->errorMessage;
	}

	public function curlRequest()
	{
		$this->setCurl();
		$this->setUrl();
		$this->setRemoteip();
		$this->setSecret();
		$this->setResponse();
		$this->setCurlData();
		curl_setopt($this->getCurl(), CURLOPT_URL, $this->getUrl());
        curl_setopt($this->getCurl(), CURLOPT_POST, true);
        curl_setopt($this->getCurl(), CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->getCurl(), CURLOPT_POSTFIELDS, array(
            'secret' => $this->getSecret(),
            'response' => $this->getResponse(),
            'remoteip' => $this->getRemoteip()
            ));
        $this->getCurlData();
        curl_close($this->getCurl());
	}

	public function parseData()
	{
		$this->setRecaptcha();
		$recaptcha = $this->getRecaptcha();
		if ($recaptcha["success"]){
				return true;
		} else{
				return false;
        }
	}


}
