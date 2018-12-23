<?php
/**
*@class Category
*@author Vinícius Becker Bernardini
*/

class Category{
	// Creating the atributes
	private $categoryId;
	private $name;
	private $catUrl;
	
	
	// Creating the constructor
	public function __construct($name = "",$catUrl= ""){
		$this->setName($name);
		$this->setCategoryUrl($catUrl);
	}
	// Creating the destructor
	public function __destruct(){
		$this->setCategoryId(-1);
		$this->setName("");
		$this->setCategoryUrl("");

	}
	// Getters and Setters methods
	// Getter of category id
	// 
	public function getCategoryUrl():string{
		return $this->url;
	}
	// Setter of name
	public function setCategoryUrl(string $value){
		$this->url = $value;
	}

	public function getCategoryId():int{
		return $this->categoryId;
	}
	// Setter of category id
	public function setCategoryId(int $value){
		$this->categoryId = $value;
	}
	// Getter of name
	public function getName():string{
		return $this->name;
	}
	// Setter of name
	public function setName(string $value){
		$this->name = $value;
	}

	// Category tooString
	public function __toString(){
		return nl2br(
		"ID da categoria: ".getCategoryId().
		"Nome da categoria: ".getName());
	}

}
