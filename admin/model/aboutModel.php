<?php
require_once(__dir__ . '/Db.php');

class aboutModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `about`");
        $this->execute();
        $about = $this->fetchAll();
        if (!empty($about)) {
        
            return $about;
        }
        return array(
            'data' => []
        );
    }


    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function create(array $data): array
    {

        $this->query("INSERT INTO `about`( `title`,`Name`, `about`, `description`, `subject`, `dob`, `age`, `website`, `degree`, `phone`, `email`, `city`, `freelance`, `image`, `link1`, `link2`, `link3`, `link4`, `link5`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['Name']);
        $this->bind(3, $data['about']);
        $this->bind(4, $data['description']);
        $this->bind(5, $data['subject']);
        $this->bind(6, $data['dob']);
        $this->bind(7, $data['age']);
        $this->bind(8, $data['website']);
        $this->bind(9, $data['degree']);
        $this->bind(10, $data['phone']);
        $this->bind(11, $data['email']);
        $this->bind(12, $data['city']);
        $this->bind(13, $data['freelance']);
        $this->bind(14, $data['image']);
        $this->bind(15, $data['link1']);
        $this->bind(16, $data['link2']);
        $this->bind(17, $data['link3']);
        $this->bind(18, $data['link4']);
        $this->bind(19, $data['link5']);
        $this->bind(20, $data['status']);

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
    public function edit($id): array
    {
        $this->query("SELECT * FROM `about` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $about = $this->fetch();
        if (!empty($about)) {

            return $about;
        }
        return array(
            'data' => []
        );
    }


    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Update(array $data): array
    {
       
        $this->query("UPDATE `about` SET `title`=?,`Name`=?,`about`=?,`description`=?,`subject`=?,`dob`=?,`age`=?,`website`=?,`degree`=?,`phone`=?,`email`=?,`city`=?,`freelance`=?,`image`=?,`link1`=?,`link2`=?,`link3`=?,`link4`=?,`link5`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['Name']);
        $this->bind(3, $data['about']);
        $this->bind(4, $data['description']);
        $this->bind(5, $data['subject']);
        $this->bind(6, $data['dob']);
        $this->bind(7, $data['age']);
        $this->bind(8, $data['website']);
        $this->bind(9, $data['degree']);
        $this->bind(10, $data['phone']);
        $this->bind(11, $data['email']);
        $this->bind(12, $data['city']);
        $this->bind(13, $data['freelance']);
        $this->bind(14, $data['image']);
        $this->bind(15, $data['link1']);
        $this->bind(16, $data['link2']);
        $this->bind(17, $data['link3']);
        $this->bind(18, $data['link4']);
        $this->bind(19, $data['link5']);
        $this->bind(20, $data['status']);
        $this->bind(21, $data['id']);
        
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
    public function deleteImage($id){
        $this->query("SELECT `image`FROM `about` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();
        $image = $this->fetch();
        if ($image) {
            return $image;
        } else {
            return false;
        }
    }
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function delete($id): array
    {
        
        $this->query("DELETE FROM `about` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'stuff Delete successfully'
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false,
                'msg' => 'Oops! somthing Wrong, Place try again'
            );
            return $Response;
        }
    }
}
