<?php 
/**
*@classname ProjectDAO
*@author Vinícius Becker
*@since 30/09/2018
*/


// Creating the Data Acess Object of Projects
class ProjectsDAO extends Projects{
	// Making the create project
		public function createProject(){
	try {			
			$sql = new SQL();
			$statement = $sql->query("INSERT INTO FB_PROJECTS (project_name,project_content,project_featuredphoto,project_deliverydate,project_url,project_user)
				VALUES (:NAME,:CONTENT,:FEATUREDPHOTO,:DELIVERYDATE,:PROJURL,:PROJUSER)",
				array(":NAME"=>$this->getName(),
					":CONTENT"=>$this->getContent(),
					":FEATUREDPHOTO"=>$this->getFeaturedphoto(),
					":DELIVERYDATE"=>$this->getDeliverydate(),
					":PROJURL"=>$this->getProjUrl(),
					":PROJUSER"=>$this->getProjUser())
			);
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
	// Making the update project
	public function updateProject($id,$name,$content,$featuredphoto,$deliverydate,$projecturl){
		// Setting the parameters to update the project
		try {
			$this->setProjectid($id);
			$this->setName($name);
			$this->setContent($content);
			$this->setFeaturedphoto($featuredphoto);
			$this->setDeliverydate($deliverydate);
			$this->setProjUrl($projecturl);
			// Making the steatement calling the query function
			$sql = new SQL();
			$statement = $sql->query("UPDATE FB_PROJECTS SET project_name=:NAME, project_content=:CONTENT,project_featuredphoto=:FEATUREDPHOTO,project_deliverydate=:DELIVERYDATE,project_url=:PROJURL WHERE project_id = :ID",
				array(":NAME"=>$this->getName(),
					":CONTENT"=>$this->getContent(),
					":FEATUREDPHOTO"=>$this->getFeaturedphoto(),
					":DELIVERYDATE"=>$this->getDeliverydate(),
					":PROJURL"=>$this->getProjUrl(),
					":ID"=>$this->getProjectid())
			);	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	public function upProject($id,$name,$content,$deliverydate,$projecturl){
		// Setting the parameters to update the project
		try {
			$this->setProjectid($id);
			$this->setName($name);
			$this->setContent($content);
			$this->setDeliverydate($deliverydate);
			$this->setProjUrl($projecturl);
			// Making the steatement calling the query function
			$sql = new SQL();
			$statement = $sql->query("UPDATE FB_PROJECTS SET project_name=:NAME, project_content=:CONTENT,project_deliverydate=:DELIVERYDATE,project_url=:PROJURL WHERE project_id = :ID",
				array(":NAME"=>$this->getName(),
					":CONTENT"=>$this->getContent(),
					":DELIVERYDATE"=>$this->getDeliverydate(),
					":PROJURL"=>$this->getProjUrl(),
					":ID"=>$this->getProjectid())
			);	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
	// Making the delete project
	public function deleteProject($id){
		try {
			$this->setProjectid($id);
			$sql = new SQL();
			$statement = $sql->query("DELETE from FB_PROJECTS WHERE project_id = :ID",
				array(":ID"=>$this->getProjectid()));	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	// Creating list function
	public function listProject(){
		try {
			$sql = new SQL();
			$id = $_SESSION['logUser']->user_id;
			$statement = $sql->query("SELECT * FROM FB_PROJECTS WHERE project_user = '$id'");
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	// Creating getInfoById function
	function getInfoByIdProj(){
			$id = $_GET['id'];				
		try {		
			$sql = new SQL();
			$statement = $sql->query("SELECT * FROM FB_PROJECTS WHERE project_id = :ID",
				array(":ID"=>$id)
			);
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result[0];	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

}
