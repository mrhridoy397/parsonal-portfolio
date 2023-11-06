<?php
require_once(__dir__ . '/controller.php');
require_once('./model/TestimoninalModel.php');
require_once('./controller/UploadFile.php');
class Testimoninals extends Controller
{

    public $active = 'Testimoninals'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new TestimoninalModel();
    }
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function Testimoninalindex(): array
    {
        return $this->Model->index();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createTestimoninal($data, $file)
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
            'name' =>  $data['name'],
            'subject' =>  $data['subject'],
            'description' =>  $data['description'],
            'image' =>  $image,
            'status' =>  $data['status'],

        );
        $Response = $this->Model->create($Payload);

        if (!$Response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data added successfully';
            header("location:TestimoninalIndex.php");
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

    public function UpdateTestimoninal(array $data, $file)
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
            'name' =>  $data['name'],
            'subject' =>  $data['subject'],
            'description' =>  $data['description'],
            'image' =>  $image,
            'status' =>  $data['status'],

        );
        $Response = $this->Model->Update($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:TestimoninalIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function deleteTestimoninal($id)
    {
        $image = $this->Model->deleteImage($id);
        if ($image['image'] != false) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/iportfolio/" . $image['image']);
        }

        $response = $this->Model->delete($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:TestimoninalIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:TestimoninalIndex.php");
            return $Response;
        }
    }
}
