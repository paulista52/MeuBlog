<?php 
session_start();
/**
This is te freeBlog functions file
DON'T EDIT IF YOU DONT KNOW!
**/

// Creating the autoload function
function loadClass($className){
	// Creating array with all possible paths
	$filename = [
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."model".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."model".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."model".DIRECTORY_SEPARATOR.$className.".class.php",
		"model".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR.$className.".class.php",
		"DAO".DIRECTORY_SEPARATOR.$className.".class.php"
	];
	// Get the number os rows of the filename array
	$filenameCount = count($filename);
	// Creating a for to request the file if he exists
	for ($i=0; $i < $filenameCount ; $i++) {
		if(file_exists($filename[$i])){
			require_once($filename[$i]);
		} 
	}
}
// Using the spl function to register the function below
spl_autoload_register('loadClass');
// Rotine to get the site name 
function siteURL(){
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$domainName = $_SERVER['HTTP_HOST'];
	echo $protocol.$domainName;
}
// Function to verify is the user is authenticate
function verifyAuthUser(){
	session_regenerate_id();
	if(isset($_SESSION['authUser'])){
		$isAuth = $_SESSION['authUser'];
	}else{
		$isAuth = "false";	
	}
	if($isAuth == "true"){
		return true;
	}else{
		return false;
	}
}
// Route function to all the system pages
function router(){
	// GET the uri of the site
	$uri = $_SERVER['REQUEST_URI'];
	// GET the method of the site
	$method = $_SERVER['REQUEST_METHOD'];
	// If is a get method requested
	if($method == "GET"){
		switch($uri){
			// Root
			case '/':
			require_once("view/index.php");
			break;
			// Admin login
			case "/admin":
			require_once("view/admin-pages/admin-login.php");
			break;

			case "/admin/":
			require_once("view/admin-pages/admin-login.php");
			break;

			// Admin panel
			case "/admin/panel":
			require_once("view/admin-pages/admin-panel.php");
			break;

			case "/admin/logout":
			header("Location:".siteURL()."/controller/adminController.php?operation=logout");
			// Blog
			case "/blog":
			require_once("view/blog.php");
			break;
		

			// Posts
			case "/create/post":
			require_once("view/admin-pages/posts/create-post.php");
			break;
			// List post case
			case "/list/post":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			// Post responses from the controller
			case "/list/post?info=cp":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			case "/list/post?info=up":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			case "/list/post?info=dp":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			// Update post
			case "/update/post?id=".$_GET['id']."&imagem=".$_GET['imagem']:
			require_once("view/admin-pages/posts/update-post.php");	
			break;
			// Categories
			// Create category case
			case "/create/category":
			require_once("view/admin-pages/categories/create-category.php");
			break;
			// List category case
			case "/list/category":
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			// Category responses from the controller
			case "/list/category?info=cc":
			require_once("view/admin-pages/categories/list-category.php");	
			break;			
			case "/list/category?info=uc":
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			case "/list/category?info=dc":
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			// Update category
			case "/update/category?id=".$_GET['id']:
			require_once("view/admin-pages/categories/update-category.php");	
			break;
			
			// Projects 
			case "/create/project":
			require_once("view/admin-pages/projects/create-project.php");
			break;
			// List project case
			case "/list/project":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			// Project responses from the controller
			case "/list/project?info=cpj":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			case "/list/project?info=upj":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			case "/list/project?info=dpj":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			// Update project
			case "/update/project?id=".$_GET['id']."&imagem=".$_GET['imagem']:
			require_once("view/admin-pages/projects/update-project.php");	
			break;
					

			// Users
			case "/create/user":
			require_once("view/admin-pages/users/create-user.php");
			break;
			// List users case
			case "/list/user":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			// Users responses from the controller
			case "/list/user?info=cu":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			case "/list/user?info=uu":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			case "/list/user?info=du":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			// Update user
			case "/update/user?id=".$_GET['id']:
			require_once("view/admin-pages/users/update-user.php");	
			break;

			// Error page
			default:				
			require_once("view/404.php");
			break;
		}

	}	
	
}


//DETERMINA QUANTIDADE DE CARACTERES
function lmWord($string, $words = '100'){
	$string 	= strip_tags($string);
	$count		= strlen($string);
	
	if($count <= $words){
		return $string;	
	}else{
		$strpos = strrpos(substr($string,0,$words),' ');
		return substr($string,0,$strpos).'...';
	}
	
}

     function ConvData($dataCad){
                $d = explode("-", $dataCad);
                $rtData = "$d[2]/$d[1]/$d[0]";
          
                return $rtData;
          } 
          
            function ConvDataIni($dataIni){
                $d = explode("/", $dataIni);
                $rtData = "$d[2]-$d[1]-$d[0]";
          
                return $rtData;
          } 

	//GET TABELA
	function getTabela($CadTab, $catId, $id, $campo = NULL){
		try{
				$pdo = new PDO("mysql:host=localhost;dbname=kmblog","root","");
			}catch(PDOException $e){
				echo $e->getMessage();
			}

		$Tabela     = $CadTab;
		$pacot	    = addslashes($catId);
		$ids	    = addslashes($id);
				
		$readCadRede = $pdo->prepare("SELECT * FROM $Tabela WHERE $ids = '$pacot'");     
		$readCadRede->execute();
		$linha = $readCadRede->fetchAll(PDO::FETCH_OBJ);
				
		if($linha){
			if($campo){
				foreach($linha as $pacot){
					return $pacot->$campo;	
				}
			}else{
				return $readPacote;
			}
		}else{
			return 'Dados não Encontrado na Tabela: '.$Tabela;	
		}
	}
          

//TRANFORMA STRING EM URL
	function setUri($string){
$a = 'ÀÁ?ÂÃÄÅÆÇÈÉÊËÌÍ?ÎÏ?Ð?ÑÒÓÔÕÖØÙÚÛÜüÝ?ÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ"°ºª!@#$%&*()_-+={[}]/?;:.,\\\'<>';
		$b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';	
		$string = utf8_decode($string);
		$string = strtr($string, utf8_decode($a), $b);
		$string = strip_tags(trim($string));
		$string = str_replace(" ","-",$string);
		$string = str_replace(array("-----","----","---","--"),"-",$string);
		return strtolower(utf8_encode($string));

}
          

//IMAGE UPLOAD
	function uploadImage($tmp, $nome, $width, $height, $pasta){
		$ext = substr($nome,-3);
		
		switch($ext){
			case 'jpeg': $img = imagecreatefromjpeg($tmp); break;
			case 'jpg': $img = imagecreatefromjpeg($tmp); break;
			case 'png': $img = imagecreatefrompng($tmp); break;
			case 'gif': $img = imagecreatefromgif($tmp); break;	
		}
		
		$x = imagesx($img);
		$y = imagesy($img);
		//$height = ($width*$y) / $x;
		$nova   = imagecreatetruecolor($width, $height);
		
		imagealphablending($nova,false);
		imagesavealpha($nova,true);
		imagecopyresampled($nova, $img, 0, 0, 0, 0, $width, $height, $x, $y);
		
		switch($ext){
			case 'jpg': imagejpeg($nova, $pasta.$nome,100); break;
			case 'png': imagepng($nova, $pasta.$nome); break;
			case 'gif': imagegif($nova, $pasta.$nome); break;
			case 'jpeg': imagepng($nova, $pasta.$nome); break;	
		}
		imagedestroy($img);
		imagedestroy($nova);
	}          