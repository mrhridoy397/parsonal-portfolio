
<?php
require_once(__dir__ . '/Db.php');
class CMSModel extends Db
{


    // Hero index page
    public function indexHero()
    {
        $this->query("SELECT * FROM `hero` where `status` = 1");
        $this->execute();

        $hero = $this->fetchAll();
        if (!empty($hero)) {
            $Response = array(
                $hero
            );
            return $Response;
        }
        return array();
    }

    // About index page
    public function About()
    {
        $this->query("SELECT * FROM `about` where `status` = 1");
        $this->execute();

        $hero = $this->fetchAll();
        if (!empty($hero)) {
            $Response = array(
                $hero
            );
            return $Response;
        }
        return array();
    }

    // testimonials index page
    public function testimonials()
    {
        $this->query("SELECT * FROM `testimonials` where `status` = 1");
        $this->execute();

        $hero = $this->fetchAll();
        if (!empty($hero)) {
            $Response = array(
                $hero
            );
            return $Response;
        }
        return array();
    }

    // Settings index page
    public function settings()
    {
        $this->query("SELECT * FROM `settings` ");
        $this->execute();
        $settings = $this->fetchAll();
        return $settings;
    }

        // CreateMassege Index page
        public function CreateMassege(array $data)
        {
    
            
            $this->query("INSERT INTO `massage`( `name`, `email`, `subject`, `message`, `status`) VALUES (?,?,?,?,?)");
            $this->bind(1, $data['name']);
            $this->bind(2, $data['email']);
            $this->bind(3, $data['subject']);
            $this->bind(4, $data['message']);
            $this->bind(5, $data['status']);
    
            if ($this->execute()) {
                $data = [
                    "statusCode" => 200,
                    "Msg" => "Your message has been sent. Thank you!"
                ];
                return json_encode($data);
            } else {
                $data = [
                    "statusCode" => 402,
                    "Msg" => "internal server error"
                ];
                return json_encode($data);
            }
        }
}
