<?php
require_once(__dir__ . '/controller.php');
require_once('./model/contactModel.php');
class contactModels extends Controller
{

    public $active = 'Massage '; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new contactModel();
    }
    // public function StudentBatch(){
    //     return $this->Model->getBatch();
    // }
   
    
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function get(): array
    {
        return $this->Model->index();
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

    public function Update(array $data)
    {
       

        $Payload = array(
                'id'  => $data['id'],
              'name'=>$data['name'],
               'email'=>$data['email'],
                'subject'=>$data['subject'],
                'message'=>$data['message'],
                'status'=> $data['status'],
                
        );
        $Response = $this->Model->Update($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:contactIndex.php");
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
       
        $response = $this->Model->delete($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:contactIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:contactIndex.php");
            return $Response;
        }
    }

    public function statuschange($data){
        $this->Model->StatusChange($data);
        header("location:contactIndex.php");
    }
}
