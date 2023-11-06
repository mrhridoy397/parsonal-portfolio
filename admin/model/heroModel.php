<?php
require_once(__dir__ . '/Db.php');
class HeroModel extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexHero()
    {
        $this->query("SELECT * FROM `hero`");
        $this->execute();

        $Hero = $this->fetchAll();
        if (!empty($Hero)) {
            $Response = array(
               $Hero
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
    public function HeroCreate(array $data)
    {
        $this->query("INSERT INTO `hero`(`Name`, `subject`, `title`, `status`) VALUES (?,?,?,?)");
        $this->bind(1, $data['Name']);
        $this->bind(2, $data['subject']);
        $this->bind(3, $data['title']);
        $this->bind(4, $data['status']);
        

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
    public function editHero($id)
    {
        $this->query("SELECT * FROM `hero` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $Hero = $this->fetch();
        if (!empty($Hero)) {
              return  $Hero; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function UpdateHero(array $data): array
    {
        $this->query("UPDATE `hero` SET `Name`=?,`subject`=?,`title`=?,`status`=? WHERE `id` =?");
        $this->bind(1, $data['Name']);
        $this->bind(2, $data['subject']);
        $this->bind(3, $data['title']);
        $this->bind(4, $data['status']);
        $this->bind(5, $data['id']);

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
    public function deleteHero($id): array
    {
        $this->query("DELETE FROM `hero` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'Slider Delete successfully'
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
