<?php
require_once(__dir__ . '/controller.php');
require_once('./model/SkillsModel.php');
class skillsController extends Controller
{

    public $active = 'Skills'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new skillsModel();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function getskills(): array
    {
        return $this->Model->indexskills();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createskills($data)
    {
      
        $Payload = array(
            'name' => $data['name'],
            'skills' => $data['skills'],
            'status' => $data['status']
        );
        $Response = $this->Model->skillsCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: skillsIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function skillsedit($id): array
    {
        return $this->Model->editskills($id);
    }

    public function skillsUpdate(array $data)
    {
       
        $Payload = array(
            'id' => $data['id'],
            'name' => $data['name'],
            'skills' => $data['skills'],
            'status' => $data['status'],
        );
        $Response = $this->Model->Updateskills($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: skillsIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function skillsDelete($id)
    {

        $response = $this->Model->deleteskills($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: skillsIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: skillsIndex.php");
            return $Response;
        }
    }

}
