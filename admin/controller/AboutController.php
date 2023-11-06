<?php
require_once(__dir__ . '/controller.php');
require_once('./model/aboutModel.php');
require_once('./controller/UploadFile.php');
class About extends Controller
{

    public $active = 'About'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new aboutModel();
    }
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function getindex(): array
    {
        return $this->Model->index();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createAbout($data, $file)
    {
        if ($file['image'] != "") {
            $fileName = new uploads();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        } else {
            $image = "";
        }



        $Payload = array(
            'title' =>  $data['title'],
            'Name' =>  $data['Name'],
            'about' =>  $data['about'],
            'description' =>  $data['description'],
            'subject' =>  $data['subject'],
            'dob' =>  $data['dob'],
            'age' =>  $data['age'],
            'website' =>  $data['website'],
            'degree' =>  $data['degree'],
            'phone' =>  $data['phone'],
            'email' =>  $data['email'],
            'city' =>  $data['city'],
            'freelance' =>  $data['freelance'],
            'image' =>  $image,
            'link1' =>  $data['link1'],
            'link2' =>  $data['link2'],
            'link3' =>  $data['link3'],
            'link4' =>  $data['link4'],
            'link5' =>  $data['link5'],
            'status' =>  $data['status'],

        );
        $Response = $this->Model->create($Payload);

        if (!$Response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data added successfully';
            header("location:AboutIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function edit($id): array
    {
        return $this->Model->edit($id);
    }

    public function Update(array $data, $file)
    {
        if ($file['image']['name'] == "") {
            $image = $data['oldImage'];
        } else {
            if ($data['oldImage'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/iportfolio/" . $data['oldImage']);
            }
            $fileName = new uploads();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        }

        $Payload = array(
            'id'     => $data['id'],
            'title' =>  $data['title'],
            'Name' =>  $data['Name'],
            'about' =>  $data['about'],
            'description' =>  $data['description'],
            'subject' =>  $data['subject'],
            'dob' =>  $data['dob'],
            'age' =>  $data['age'],
            'website' =>  $data['website'],
            'degree' =>  $data['degree'],
            'phone' =>  $data['phone'],
            'email' =>  $data['email'],
            'city' =>  $data['city'],
            'freelance' =>  $data['freelance'],
            'image' =>  $image,
            'link1' =>  $data['link1'],
            'link2' =>  $data['link2'],
            'link3' =>  $data['link3'],
            'link4' =>  $data['link4'],
            'link5' =>  $data['link5'],
            'status' =>  $data['status'],
        );
        $Response = $this->Model->Update($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:AboutIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function delete($id)
    {
        $image = $this->Model->deleteImage($id);
        if ($image['image'] != false) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/iportfolio/" . $image['image']);
        }

        $response = $this->Model->delete($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:AboutIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:AboutIndex.php");
            return $Response;
        }
    }
}
