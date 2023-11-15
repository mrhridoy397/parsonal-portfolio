<?php
require_once(__dir__ . '/Db.php');
class portfoliodetailsModels extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexportfoliodetails()
    {
        $this->query("SELECT * FROM `portfoliodetails`");
        $this->execute();

        $portfolio = $this->fetchAll();
        if (!empty($portfolio)) {
            $Response = array(
               $portfolio
            );
            return $Response;
        }
        return array(
          
        );
    }

    // portFolio
    public function portfolio()
    {
        $this->query("SELECT * FROM `portfolio` ");
        $this->execute();
        $portfolio = $this->fetchAll();
        if (!empty($portfolio)) {
            return $portfolio;
        }
        return array();
    }
    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function portfoliodetailsCreate(array $data)
    {
        $this->query("INSERT INTO `portfoliodetails`(`categorisId`, `title`, `shortTitle`, `Category`, `Client`, `Projectdate`, `ProjectURL`, `description`, `image`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $this->bind(1, $data['categorisId']);
        $this->bind(2, $data['title']);
        $this->bind(3, $data['shortTitle']);
        $this->bind(4, $data['Category']);
        $this->bind(5, $data['Client']);
        $this->bind(6, $data['Projectdate']);
        $this->bind(7, $data['ProjectURL']);
        $this->bind(8, $data['description']);
        $this->bind(9, $data['image']);
        $this->bind(10, $data['status']);
        

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
    public function editportfoliodetails($id)
    {
        $this->query("SELECT * FROM `portfoliodetails` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $portfolio = $this->fetch();
        if (!empty($portfolio)) {
              return  $portfolio; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Updateportfoliodetails(array $data): array
    {
        $this->query("UPDATE `portfoliodetails` SET `categorisId`=?,`title`=?,`shortTitle`=?,`Category`=?,`Client`=?,`Projectdate`=?,`ProjectURL`=?,`description`=?,`image`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['categorisId']);
        $this->bind(2, $data['title']);
        $this->bind(3, $data['shortTitle']);
        $this->bind(4, $data['Category']);
        $this->bind(5, $data['Client']);
        $this->bind(6, $data['Projectdate']);
        $this->bind(7, $data['ProjectURL']);
        $this->bind(8, $data['description']);
        $this->bind(9, $data['image']);
        $this->bind(10, $data['status']);
        $this->bind(11, $data['id']);

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
        $this->query("SELECT `image`FROM `portfoliodetails` WHERE `id` = :id");
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
    public function deleteportfoliodetails($id): array
    {
        $this->query("DELETE FROM `portfoliodetails` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'portfoliodetails Delete successfully'
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
