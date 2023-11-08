<?php
require_once(__dir__ . '/controller.php');
require_once('./model/factsModel.php');
class factsController extends Controller
{

    public $active = 'Facts'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new factsModel();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function getfacts(): array
    {
        return $this->Model->indexfacts();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createfacts($data)
    {
      
        $Payload = array(
            'title' => $data['title'],
            'success' => $data['success'],
            'status' => $data['status']
        );
        $Response = $this->Model->factsCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: FactsIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function factsedit($id): array
    {
        return $this->Model->editfacts($id);
    }

    public function factsUpdate(array $data)
    {
       
        $Payload = array(
            'id' => $data['id'],
            'title' => $data['title'],
            'success' => $data['success'],
            'status' => $data['status']
        );
        $Response = $this->Model->Updatefacts($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: FactsIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function factsDelete($id)
    {

        $response = $this->Model->deletefacts($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: FactsIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: FactsIndex.php");
            return $Response;
        }
    }

}
