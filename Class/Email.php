<?php

class Email
{
	private $addresseeEmail;

	private $header;

	private $subject;

	private $message;

	private $txtMessage;

	private $htmlMessage;

	private $boundary;

	private $lineBreak;

	private $validationMessage;

	public function setAddresseeEmail($emailAdress){
		$this->addresseeEmail = $emailAdress;
	}

	public function getAddresseeEmail(){
		return $this->addresseeEmail;
	}

	public function setHeader($sender, $sendAddress, $reply, $replyAddress)
	{
		$this->setLineBreak($this->getAddresseeEmail());
		$this->setBoundary();
		$this->header = "From: ".$sender."<".$sendAddress.">".$this->getLineBreak();
		$this->header .= "Reply-to: ".$reply." <".$replyAddress.">".$this->getLineBreak();
		$this->header .= "MIME-Version: 1.0".$this->getLineBreak(); 
		$this->header .= "Content-Type: multipart/alternative;".$this->getLineBreak()." boundary=".$this->getBoundary().$this->getLineBreak();
	}

	public function getHeader()
	{
		return $this->header;
	}

	public function setSubject($subject)
	{
		$this->subject = $subject;
	}

	public function getSubject()
	{
		return $this->subject;
	}

	public function setMessage()
	{
		$this->setLineBreak($this->getAddresseeEmail());
		$this->setBoundary();
		$this->message = $this->getLineBreak()."--".$this->getBoundary().$this->getLineBreak();
		//ajout du message au format texte
		$this->message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$this->getLineBreak();
		$this->message .= "Content-Transfer-Encoding: 8bit".$this->getLineBreak();
		$this->message .= $this->getLineBreak().$this->getTxtMessage().$this->getLineBreak();

		$this->message .= $this->getLineBreak()."--".$this->getBoundary().$this->getLineBreak();
		//ajout du message au format HTML
		$this->message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$this->getLineBreak();
		$this->message .= "Content-Transfer-Encoding: 8bit".$this->getLineBreak();
		$this->message .= $this->getLineBreak().$this->getHtmlMessage().$this->getLineBreak();

		$this->message .= $this->getLineBreak()."--".$this->getBoundary().$this->getLineBreak();
		$this->message .= $this->getLineBreak()."--".$this->getBoundary().$this->getLineBreak();

	}

	public function getMessage()
	{
		return $this->message;
	}

	public function setTxtMessage($txtMessage)
	{
		$this->txtMessage = $txtMessage;
	}

	public function getTxtMessage()
	{
		return $this->txtMessage;
	}

	public function setHtmlMessage($htmlMessage)
	{
		$this->htmlMessage = $htmlMessage;
	}

	public function getHtmlMessage()
	{
		return $this->htmlMessage;
	}

	public function setBoundary()
	{
		$this->boundary = "-----=".md5(rand());
	}

	public function getBoundary()
	{
		return $this->boundary;
	}

	public function setLineBreak($email){
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email)) // On filtre les serveurs qui rencontrent des bogues.
		{
			$this->lineBreak = "\r\n";
		}
		else
		{
			$this->lineBreak = "\n";
		}
	}

	public function getLineBreak(){
		return $this->lineBreak;
	}

	public function setValidationMessage()
	{
		$this->validationMessage = '<p>Votre message a bien été transmis au collectif Union Square, vous recevrez une réponse dans les meilleurs délais.<p>
        		<form action="http://localhost/form/index.php">
    				<input type="submit" value="retour à la page d\'accueil" />
				</form>';
	}

	public function getValidationMessage()
	{
		return $this->validationMessage;
	}

	public function sentEmail()
	{
		$this->setMessage();
		return mail($this->getAddresseeEmail(), $this->getSubject(), $this->getMessage(), $this->getHeader());
	}

}