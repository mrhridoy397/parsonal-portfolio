<?php
require_once(__dir__ . '/controller.php');
require_once('./model/ServicesModel.php');
class ServicesController extends Controller
{

    public $active = 'Services'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new servicesModel();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function getservices(): array
    {
        return $this->Model->indexservices();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createservices($data)
    {
      
        $Payload = array(
            'title' => $data['title'],
            'Description' => $data['Description'],
            'status' => $data['status']
        );
        $Response = $this->Model->servicesCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: ServicesIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function servicesedit($id): array
    {
        return $this->Model->editservices($id);
    }

    public function servicesUpdate(array $data)
    {
       
        $Payload = array(
            'id' => $data['id'],
            'title' => $data['title'],
            'Description' => $data['Description'],
            'status' => $data['status'],
        );
        $Response = $this->Model->Updateservices($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ServicesIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function servicesDelete($id)
    {

        $response = $this->Model->deleteservices($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: ServicesIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ServicesIndex.php");
            return $Response;
        }
    }

}
