<?php
/**
*@class Posts
*@author Leonardo Pereira Oliveira & Vinícius Becker Bernardini
*/
class Posts{
	// Creating atributes
	private $postID;
	private $name;
	private $content;
	private $postCategory;
	private $featuredPhoto;
	private $postUrl;
	private $iduser;


	// Creating constructor
	public function __construct($name = "",$content = "",$postCategory = 0,$featuredPhoto ="",$postUrl = "",$iduser = ""){
		$this->setName($name);
		$this->setContent($content);
		$this->setPostCategory($postCategory);
		$this->setFeaturedphoto($featuredPhoto);
		$this->setPostUrl($postUrl);
		$this->setPostUser($iduser);

	}
	// Creating destructor
	public function __destruct(){
	}

	// Creating Getters and Setters methods
	// Getter of postsId
	public function getPostid():int{
		return $this->postsID;
	}
	// Setter of postsId
	public function setPostid(int $value){
		$this->postsID = $value;
	}
	public function getPostUser():string{
		return $this->iduser;
	}
	// Setter of postsId
	public function setPostUser(string $value){
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
		public function getPostUrl():string{
		return $this->postUrl;
	}
	// Setter of name
	public function setPostUrl(string $value){
		$this->postUrl = $value;
	}
  // Getter of content
	public function getContent():string{
		return $this->content;
	}
	// Setter of content
	public function setContent(string $value){
		$this->content = $value;
	}
  // Getter of postCategory
	public function getPostCategory():int{
		return $this->postCategory;
	}
	// Setter of postCategory
	public function setPostCategory(int $value){
		$this->postCategory = $value;
	}
	public function getFeaturedphoto():string{
		return $this->featuredPhoto;
	}
	// Setter of featured photo
	public function setFeaturedphoto(string $value){
		$this->featuredPhoto = $value;
	}

	// Creating Posts toString
	public function __toString(){
		return nl2br(
			"ID da postagem: ".getPostsid().
			"Nome da postagem: ".getName().
			"Url do Post: ".getPostUrl().
			"Conteúdo da postagem: ".getContent().
			"Imagem destacada: ".$this->getFeaturedphoto().
			"<br>".
			"Categoria da postagem: ".getPostCategory());
	}
}
