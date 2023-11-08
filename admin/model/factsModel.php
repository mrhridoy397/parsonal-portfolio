<?php
require_once(__dir__ . '/Db.php');
class factsModel extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexfacts()
    {
        $this->query("SELECT * FROM `facts`");
        $this->execute();

        $facts = $this->fetchAll();
        if (!empty($facts)) {
            $Response = array(
               $facts
            );
            return $Response;
        }
        return array(
          
        );
    }

    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function factsCreate(array $data)
    {
        $this->query("INSERT INTO `facts`(`title`, `success`,  `status`) VALUES (?,?,?)");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['success']);
        $this->bind(3, $data['status']);
        

        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }

 


      /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function editfacts($id)
    {
        $this->query("SELECT * FROM `facts` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $facts = $this->fetch();
        if (!empty($facts)) {
              return  $facts; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Updatefacts(array $data): array
    {
        $this->query("UPDATE `facts` SET `title`=?,`success`=?,`status`=? WHERE `id` =?");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['success']);
        $this->bind(3, $data['status']);
        $this->bind(4, $data['id']);

        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }



        /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function deletefacts($id): array
    {
        $this->query("DELETE FROM `facts` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'facts Delete successfully'
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }
}
