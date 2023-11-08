<?php
require_once(__dir__ . '/Db.php');
class skillsModel extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexskills()
    {
        $this->query("SELECT * FROM `skills`");
        $this->execute();

        $skills = $this->fetchAll();
        if (!empty($skills)) {
            $Response = array(
               $skills
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
    public function skillsCreate(array $data)
    {
        $this->query("INSERT INTO `skills`(`name`, `skills`,  `status`) VALUES (?,?,?)");
        $this->bind(1, $data['name']);
        $this->bind(2, $data['skills']);
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
    public function editskills($id)
    {
        $this->query("SELECT * FROM `skills` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $skills = $this->fetch();
        if (!empty($skills)) {
              return  $skills; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Updateskills(array $data): array
    {
        $this->query("UPDATE `skills` SET `name`=?,`skills`=?,`status`=? WHERE `id` =?");
        $this->bind(1, $data['name']);
        $this->bind(2, $data['skills']);
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
    public function deleteskills($id): array
    {
        $this->query("DELETE FROM `skills` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'skills Delete successfully'
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
