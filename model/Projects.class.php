<?php 	
/**
* @class Projetcs
* @author Vinícius Becker Bernardini
*/

class Projects{
	// Creating the atributes
	private $projectID;
	private $name;
	private $content;
	private $featuredPhoto;
	private $deliveryDate;
	private $projecturl;
	private $iduser;

	// Creating the constructor
	public function __construct($name = "",$content ="",$featuredPhoto ="",$deliveryDate="", $projecturl="",$iduser = ""){
		$this->setName($name);
		$this->setContent($content);
		$this->setFeaturedphoto($featuredPhoto);
		$this->setDeliverydate($deliveryDate);
		$this->setProjUrl($projecturl);
		$this->setProjUser($iduser);
	}
	// Creating the destructor
	public function __destruct(){
		$this->setProjectid(-1);
		$this->setName('');
		$this->setContent('');
		$this->setFeaturedphoto('');
		$this->setDeliverydate('');
		$this->setProjUrl("");
		$this->setProjUser("");
	}
	// Creating the gettes and setters methods
	// Getter of projectID
	public function getProjUrl():string{
		return $this->projecturl;
	}
	// Setter of projectID
	public function setProjUrl(string $value){
		$this->projecturl = $value;
	}
	
	public function getProjectid():int{
		return $this->projectID;
	}
	// Setter of projectID
	public function setProjectid(int $value){
		$this->projectID = $value;
	}
	public function getProjUser():string{
		return $this->iduser;
	}
	// Setter of postsId
	public function setProjUser(string $value){
		$this->iduser = $value;
	}
	// Getter of name
	public function getName():string{
		return $this->name;
	}
	// Setter of name
	public function setName(string $value){
		$this->name = $value;
	}

	// Getter of content
	public function getContent():string{
		return $this->content;
	}
	// Setter of content
	public function setContent(string $value){
		$this->content = $value;
	}
	// Getter of featured content
	public function getFeaturedphoto():string{
		return $this->featuredPhoto;
	}
	// Setter of featured photo
	public function setFeaturedphoto(string $value){
		$this->featuredPhoto = $value;
	}
	// Getter of Delivery date
	public function getDeliverydate():string{
		return $this->deliveryDate;
	}
	// Setter of Delivery date
	public function setDeliverydate(string $value){
		$this->deliveryDate = $value;
	}

	// Projects tooString
	public function __toString(){
		return 
		"Nome do projeto: ".$this->getName().
		"<br>".
		"Conteúdo: ".$this->getContent().
		"<br>".
		"Imagem destacada: ".$this->getFeaturedphoto().
		"<br>".
		"Data de entrega: ".$this->getDeliverydate();
	}
}