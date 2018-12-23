<?php 
/**
* Controller of posts
* @author Vinícius Becker Bernardini
* @since 13/10/2017
* @updated for filter_input in 28/10/2018
*/

// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Using the $_GET to get the operation request
$operation = $_GET['operation'];
switch ($operation) {
	case 'create':
	// Getting the informations using $_POST
	$name = filter_input(INPUT_POST, 'postname');
	$category = filter_input(INPUT_POST,'postcategory');
	$content = filter_input(INPUT_POST, 'postcontent');
	$iduser = filter_input(INPUT_POST, 'iduser');
	$posturl = setUri($name);
	$featuredPhoto = $_FILES['featuredphoto'];

	if($featuredPhoto['error']){
		throw new Exception("Erro no envio do arquivo, erro: ".$featuredPhoto['error']);
	}else{
	// Crating the constant name of the directory
		define('DIRNAME', "uploads\postagem");
	// Creating the path of upload
		$dirUpload = "..".DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.date('Y').DIRECTORY_SEPARATOR.date('m');	
	// Checking if the path exists, if not create the path
		if(!is_dir($dirUpload)){
			mkdir('..'.DIRECTORY_SEPARATOR.DIRNAME);
			mkdir('..'.DIRECTORY_SEPARATOR.'uploads\postagem'.DIRECTORY_SEPARATOR.date('Y'));
			mkdir($dirUpload);
		}
	// Changing the name of the file to a pattern name
		//$featuredPhoto['userfile']['name'] = 'postagem_'.$nameForPhoto.'_'.date('d_m_y_g_i_h').'.jpg'; 
		
		$featuredPhoto['userfile']['name'] = $category.'-'.time().'.jpg'; 
	}
	// Verifyng if he moves the file to directory, if its all right create the project
	if(move_uploaded_file($featuredPhoto['tmp_name'], $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']["name"])){
		// Creating the url to acess this photos after
		$featuredPhotoPath = $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']['name'];
		// Instance of ProjectDAO, passing the parameters to the constructor to set the values
		// 
	try {
		// Instancing the PostsDAO class
		// Passing the values through the constructor
		$p = new PostsDAO($name,$content,$category,$featuredPhotoPath,$posturl,$iduser);
		// Acessing the createPost method to create the post
		$p->createPost();

		// Redirecting to the panel and informing the post has been created
		// Info : cp = created post
		header("Location: ".siteURL().'/list/post?info=cp');	
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}
	break;


case 'update':
	
	$id 			= filter_input(INPUT_POST, 'postid');
	$imgs 			= filter_input(INPUT_POST, 'imagem');
	$name 			= filter_input(INPUT_POST, 'postname');
	$category 		= filter_input(INPUT_POST,'postcategory');
	$content 		= filter_input(INPUT_POST, 'postcontent');
	$posturl 		= setUri($name);
	$featuredPhoto 	= $_FILES['featuredphoto'];

if($_FILES['featuredphoto']['tmp_name']):
		try{
				$pdo = new PDO("mysql:host=localhost;dbname=kmblog","root","");
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		$readCadRede = $pdo->prepare("SELECT * FROM FB_POST WHERE post_id = '$id'");     
		$readCadRede->execute();
		$linha = $readCadRede->fetchAll(PDO::FETCH_OBJ);		
		foreach($linha as $img);	
		
		$pasta = '../uploads/';
		
		if(file_exists($pasta.$img->post_thumbnail) && !is_dir($pasta.$img->post_thumbnail)): unlink($pasta.$img->post_thumbnail);endif;
	
endif;	

	if(!$_FILES['featuredphoto']['tmp_name']){

	}else{
		// Crating the constant name of the directory
		define('DIRNAME', "uploads\postagem");
		// Creating the path of upload
		$dirUpload = "..".DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.date('Y').DIRECTORY_SEPARATOR.date('m');	
		// Checking if the path exists, if not create the path
		if(!is_dir($dirUpload)){
			mkdir('..'.DIRECTORY_SEPARATOR.DIRNAME);
			mkdir('..'.DIRECTORY_SEPARATOR.'uploads\postagem'.DIRECTORY_SEPARATOR.date('Y'));
			mkdir($dirUpload);
		}		
	 
		$featuredPhoto['userfile']['name'] = $id.'-'.time().'.jpg'; 
	}
	// Verifyng if he moves the file to directory, if its all right create the project
	if(move_uploaded_file($featuredPhoto['tmp_name'], $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']["name"])){

		$featuredPhotoPath = $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']['name'];
		// Instance of ProjectDAO, passing the parameters to the constructor to set the values
		$p = new PostsDAO();
		// Using the function createProject to create the register
		$p->updatePost($id,$name,$content,$category,$featuredPhotoPath,$posturl);
	// Redirecting to the panel and informing the project has been updated
	// Info : cp = updated project
		header("Location: ".siteURL().'/list/post?info=up');
	}else{

		$p = new PostsDAO();
		// Using the function createProject to create the register
		$p->upPost($id,$name,$content,$category,$posturl);

		header("Location: ".siteURL().'/list/post?info=up');
	}
	break;



	case 'delete':
	// Getting the post id using superglobal $_GET
	$postID = filter_input(INPUT_GET, 'postID');
	// Instancing the PostsDAO class
	$p = new PostsDAO();
	// Acessing the delete post method to delete post by id
	$p->deletePost($postID);
	// Redirecting to the panel and informing the category has been created
	// Info : dp = deleted post
	header("Location: ".siteURL().'/list/post?info=dp');
	break;
	// If get invalid operation
	default:
	// Print error message
	echo "Operação inválida";
	break;
}


