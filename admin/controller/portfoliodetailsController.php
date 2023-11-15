<?php
require_once(__dir__ . '/controller.php');
require_once('./model/portfoliodetailsModel.php');
require_once('./controller/UploadFile.php');
class portfoliodetailsController extends Controller
{

    public $active = 'portfoliodetails'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new portfoliodetailsModels();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function getindexportfoliodetails(): array
    {
        return $this->Model->indexportfoliodetails();
    }


    // portfolio
    public function getportfolio(){
        return $this->Model->portfolio();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createportfoliodetails($data, $file)
    {
       if($file['image'] != ""){
         $fileName = new uploads();
        $fileName->startupload($file);
        $fileName->uploadfile();
        $image  =  $fileName->dbupload;
       }
       else{
        $image = "";
       }

      
        $Payload = array(
            'categorisId' => $data['categorisId'],
            'title' => $data['title'],
            'shortTitle' => $data['shortTitle'],
            'Category' => $data['Category'],
            'Client' => $data['Client'],
            'Projectdate' => $data['Projectdate'],
            'ProjectURL' => $data['ProjectURL'],
            'description' => $data['description'],
            'image' => $image,
            'status' => $data['status'],

            
        );
        $Response = $this->Model->portfoliodetailsCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: portfoliodetailsIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function portfoliodetailsedit($id): array
    {
        return $this->Model->editportfoliodetails($id);
    }

    public function portfoliodetailsUpdate(array $data, $file)
    {
        if ($file['image']['name'] == "") {
            $image = $data['oldImage'];
        } 
        else {
            if ($data['oldImage'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/iPortfolio-project/" . $data['oldImage']);
            }
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        }

       
        $Payload = array(
            'id' => $data['id'],
            'categorisId' => $data['categorisId'],
            'title' => $data['title'],
            'shortTitle' => $data['shortTitle'],
            'Category' => $data['Category'],
            'Client' => $data['Client'],
            'Projectdate' => $data['Projectdate'],
            'ProjectURL' => $data['ProjectURL'],
            'description' => $data['description'],
            'image' => $image,
            'status' => $data['status'],
        );
        $Response = $this->Model->Updateportfoliodetails($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: portfoliodetailsIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function portfoliodetailsDelete($id)
    {
        $image = $this->Model->deleteImage($id);
        if($image['image'] != false){
            unlink($_SERVER['DOCUMENT_ROOT']."/iPortfolio-project/".$image['image']);
        }

        $response = $this->Model->deleteportfoliodetails($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: portfoliodetailsIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: portfoliodetailsIndex.php");
            return $Response;
        }
    }

}
