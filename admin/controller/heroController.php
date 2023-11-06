<?php
require_once(__dir__ . '/controller.php');
require_once('./model/heroModel.php');
require_once('./controller/UploadFile.php');
class HeroController extends Controller
{

    public $active = 'Hero'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new HeroModel();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function getHero(): array
    {
        return $this->Model->indexHero();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createHero($data)
    {
      
        $Payload = array(
            'Name' => $data['Name'],
            'subject' => $data['subject'],
            'title' => $data['title'],
            'status' => $data['status']
        );
        $Response = $this->Model->HeroCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: heroIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function Heroedit($id): array
    {
        return $this->Model->editHero($id);
    }

    public function SliderUpdate(array $data)
    {
       
        $Payload = array(
            'id' => $data['id'],
            'Name' => $data['Name'],
            'subject' => $data['subject'],
            'title' => $data['title'],
            'status' => $data['status'],
        );
        $Response = $this->Model->UpdateHero($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: heroIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function HeroDelete($id)
    {

        $response = $this->Model->deleteHero($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: heroIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: heroIndex.php");
            return $Response;
        }
    }

}
