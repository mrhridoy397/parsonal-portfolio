
<?php
require_once(__dir__ . './Controller.php');
require_once('./model/CMSModel.php');
require_once('./controller/UploadFile.php');
class CMSController extends Controller
{

    public $active = 'CMS'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        $this->Model = new CMSModel();
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/


    // Hero index page
    public function getHero()
    {
        return $this->Model->indexHero();
    }

    // About index page
    public function getAbout()
    {
        return $this->Model->About();
    }

    // testimonials index page
    public function gettestimonials()
    {
        return $this->Model->testimonials();
    }

    // Settings
    public function getSetting()
    {
        return $this->Model->settings();
    }

    
    // CreateMassege Index page
    public function CreateMassege($data)
    {
        $Payload = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'status' => 1,
        );
        $data = $this->Model->CreateMassege($Payload);
        echo $data;
    }
}