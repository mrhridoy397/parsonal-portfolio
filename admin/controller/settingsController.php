<?php
require_once(__dir__ . '/controller.php');
require_once('./model/settingsModel.php');
require_once('./controller/newUploadsFile-2.php');
class Settings extends Controller
{

    public $active = 'Settings'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new SettingModel();
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function edit(): array
    {
        return $this->Model->edit();
    }

    public function Update($data, $file)
    {

        if ($file['FaviconIcon']['name'] == "") {
            $FaviconIcon = $data['oldFaviconIcon'];
        } else {
            if ($data['oldFaviconIcon'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/iPortfolio-project/" . $data['oldFaviconIcon']);
            }
            $files = $file['FaviconIcon'];
            $fileName = new uploads();
            $fileName->startupload($files);
            $fileName->uploadfile();
            $FaviconIcon  =  $fileName->dbupload;
        }



        $Payload = array(
            'siteTitle' => $data['siteTitle'],
            'factsAbout' => $data['factsAbout'],
            'skillsTitle' => $data['skillsTitle'],
            'skillAbout' => $data['skillAbout'],
            'resumeTitle' => $data['resumeTitle'],
            'resumeAbout' => $data['resumeAbout'],
            'portfolioTitle' => $data['portfolioTitle'],
            'portfolioAbout' => $data['portfolioAbout'],
            'ServicesTitle' => $data['ServicesTitle'],
            'ServicesAbout' => $data['ServicesAbout'],
            'TestimonialsTitle' => $data['TestimonialsTitle'],
            'TestimonialsAbout' => $data['TestimonialsAbout'],
            'ContactTitle' => $data['ContactTitle'],
            'ContactAbout' => $data['ContactAbout'],
            'Location' => $data['Location'],
            'Email' => $data['Email'],
            'Call' => $data['Call'],
            'FactsTitle' => $data['FactsTitle'],
            'FaviconIcon' => $FaviconIcon,
            'Ifream-2' => $data['Ifream-2']







        );
        $Response = $this->Model->settingsUpdate($Payload);

        if (!$Response = true) {
            $Response = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response  = 'Congress! you data Update successfully';
            header("location:settingEdit.php");
            return $Response;
        }
    }
}
