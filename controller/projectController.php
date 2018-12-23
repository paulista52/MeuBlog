<?php 
/**
* Projects controller
*@author Vinícius Becker Bernardini
*@since 30/09/2018
*@updated for filter_input in 28/10/2018
*/
// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Getting the operation using $_GET
$operation = $_GET['operation'];
switch ($operation) {

	case 'create':
	// Getting the values of the form using $_POST
	$name = filter_input(INPUT_POST, 'projectname');
	$deliverydate = filter_input(INPUT_POST, 'deliverydate');
	$content = filter_input(INPUT_POST, 'content');
	$iduser = filter_input(INPUT_POST, 'iduser');
	$projecturl = setUri($name);
//	$nameForPhoto = str_replace(' ','_',$projecturl);
	$featuredPhoto = $_FILES['featuredphoto'];

	$deliverydate = ConvData($deliverydate);
	// Moving the photo into directory
	// Checking possible error
	if($featuredPhoto['error']){
		throw new Exception("Erro no envio do arquivo, erro: ".$featuredPhoto['error']);
	}else{
	// Crating the constant name of the directory
		define('DIRNAME', "uploads\projeto");
	// Creating the path of upload
		$dirUpload = "..".DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.date('Y').DIRECTORY_SEPARATOR.date('m');	
	// Checking if the path exists, if not create the path
		if(!is_dir($dirUpload)){
			mkdir('..'.DIRECTORY_SEPARATOR.DIRNAME);
			mkdir('..'.DIRECTORY_SEPARATOR.'uploads\projeto'.DIRECTORY_SEPARATOR.date('Y'));
			mkdir($dirUpload);
		}
	// Changing the name of the file to a pattern name
	    $featuredPhoto['userfile']['name'] = $id.'-'.time().'.jpg';
		
	}
	// Verifyng if he moves the file to directory, if its all right create the project
	if(move_uploaded_file($featuredPhoto['tmp_name'], $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']["name"])){
		// Creating the url to acess this photos after
		$featuredPhotoPath = $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']['name'];
		// Instance of ProjectDAO, passing the parameters to the constructor to set the values
	try {
		$p = new ProjectsDAO($name,$content,$featuredPhotoPath,$deliverydate,$projecturl,$iduser);
		// Using the function createProject to create the register
		$p->createProject();
		
	// Redirecting to the panel and informing the project has been created
	// Info : cp = created project
		header("Location: ".siteURL().'/list/project?info=cpj');
} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}

	}
	break;

	case 'update':
	// Getting the values of the form using $_POST
	$id 			= filter_input(INPUT_POST, 'projectid');
	$name 			= filter_input(INPUT_POST, 'projectname');
	$imgs 		 	= filter_input(INPUT_POST, 'imagem');
	$deliverydate 	= filter_input(INPUT_POST, 'deliverydate');
	$content 	  	= filter_input(INPUT_POST, 'content');
	$projecturl 	= setUri($name);
	$featuredPhoto 	= $_FILES['featuredphoto'];
	$deliverydate 	= ConvData($deliverydate);

if($_FILES['featuredphoto']['tmp_name']):
		try{
				$pdo = new PDO("mysql:host=localhost;dbname=kmblog","root","");
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		$readCadRede = $pdo->prepare("SELECT * FROM FB_PROJECTS WHERE project_id = '$id'");     
		$readCadRede->execute();
		$linha = $readCadRede->fetchAll(PDO::FETCH_OBJ);		
		foreach($linha as $img);	
		
		$pasta = '../uploads/';
		
		if(file_exists($pasta.$img->project_featuredphoto) && !is_dir($pasta.$img->project_featuredphoto)): unlink($pasta.$img->project_featuredphoto);endif;
	
endif;


	// Moving the photo into directory
	// Checking possible error
	if(!$_FILES['featuredphoto']['tmp_name']){

	}else{
		// Crating the constant name of the directory
		define('DIRNAME', "uploads\projeto");
		// Creating the path of upload
		$dirUpload = "..".DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.date('Y').DIRECTORY_SEPARATOR.date('m');	
		// Checking if the path exists, if not create the path
		if(!is_dir($dirUpload)){
			mkdir('..'.DIRECTORY_SEPARATOR.DIRNAME);
			mkdir('..'.DIRECTORY_SEPARATOR.'uploads\projeto'.DIRECTORY_SEPARATOR.date('Y'));
			mkdir($dirUpload);
		}
		// Changing the name of the file to a pattern name
		$featuredPhoto['userfile']['name'] = $id.'-'.time().'.jpg';
		}
	// Verifyng if he moves the file to directory, if its all right create the project
	if(move_uploaded_file($featuredPhoto['tmp_name'], $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']["name"])){
		// Creating the url to acess this photos after
		$featuredPhotoPath = $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']['name'];
		// Instance of ProjectDAO, passing the parameters to the constructor to set the values
		$p = new ProjectsDAO();
		// Using the function createProject to create the register
		$p->updateProject($id,$name,$content,$featuredPhotoPath,$deliverydate,$projecturl);
	// Redirecting to the panel and informing the project has been updated
	// Info : cp = updated project
		header("Location: ".siteURL().'/list/project?info=upj');
	}else{

		$p = new ProjectsDAO();
		// Using the function createProject to create the register
		$p->upProject($id,$name,$content,$deliverydate,$projecturl);

		header("Location: ".siteURL().'/list/project?info=upj');
	}
	break;

	case 'delete':
	// Getting the values of the url using $_GET
	$projectID = filter_input(INPUT_GET,'projectID');
	// Instancing the ProjectsDAO
	$p = new ProjectsDAO();
	// Setting the id of the project
	// Calling the delete function
	$p->deleteProject($projectID);
	// Redirecting to the panel and informing the project has been deleted
	// Info : cp = deleted project
	header("Location: ".siteURL().'/list/project?info=dpj');
	break;
	// If get invalid operation
	default:
	// Print error message
	echo "Operação inválida";
	break;
}
?>