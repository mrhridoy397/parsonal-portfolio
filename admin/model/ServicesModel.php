<?php
require_once(__dir__ . '/Db.php');
class servicesModel extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexservices()
    {
        $this->query("SELECT * FROM `services`");
        $this->execute();

        $services = $this->fetchAll();
        if (!empty($services)) {
            $Response = array(
               $services
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
    public function servicesCreate(array $data)
    {
        $this->query("INSERT INTO `services`(`title`, `Description`,  `status`) VALUES (?,?,?)");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['Description']);
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
    public function editservices($id)
    {
        $this->query("SELECT * FROM `services` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $services = $this->fetch();
        if (!empty($services)) {
              return  $services; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Updateservices(array $data): array
    {
        $this->query("UPDATE `services` SET `title`=?,`Description`=?,`status`=? WHERE `id` =?");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['Description']);
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
    public function deleteservices($id): array
    {
        $this->query("DELETE FROM `services` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'services Delete successfully'
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
