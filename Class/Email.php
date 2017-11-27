<?php

class Email
{
	private $addresseeEmail;

	private $header;

	private $subject;

	private $message;

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
		/*$this->setBoundary();*/
		$this->header .= "From: ".$sender."<".$sendAddress.">".$this->getLineBreak();
		$this->header .= "Reply-to: ".$reply." <".$replyAddress.">".$this->getLineBreak();
		$this->header .= "Content-Type: text/html;charset=\"utf-8\"".$this->getLineBreak();
	}

	public function getHeader()
	{
		return $this->header;
	}

	public function setSubject($subject)
	{
		$this->subject = utf8_encode($subject);
	}

	public function getSubject()
	{
		return $this->subject;
	}

	public function setMessage($message)
	{
		$this->message = $message;

	}

	public function getMessage()
	{
		return $this->message;
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

	public function setValidationMessage($message)
	{
		$this->validationMessage = $message;
	}

	public function getValidationMessage()
	{
		return $this->validationMessage;
	}

	public function sentEmail()
	{
		return mail($this->getAddresseeEmail(), utf8_decode($this->getSubject()), $this->getMessage(), $this->getHeader());
	}

}