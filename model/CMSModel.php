
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

    // skills index page
    public function skills()
    {
        $this->query("SELECT * FROM `skills` where `status` = 1");
        $this->execute();

        $skills = $this->fetchAll();
        if (!empty($skills)) {
            $Response = array(
                $skills
            );
            return $Response;
        }
        return array();
    }


    // Facts index page
    public function facts()
    {
        $this->query("SELECT * FROM `facts` where `status` = 1");
        $this->execute();

        $facts = $this->fetchAll();
        if (!empty($facts)) {
            $Response = array(
                $facts
            );
            return $Response;
        }
        return array();
    }

    // services index page
    public function services()
    {
        $this->query("SELECT * FROM `services` where `status` = 1");
        $this->execute();

        $services = $this->fetchAll();
        if (!empty($services)) {
            $Response = array(
                $services
            );
            return $Response;
        }
        return array();
    }


    // portfolio index page
    public function portfolio()
    {
        $this->query("SELECT * FROM `portfolio` where `status` = 1");
        $this->execute();

        $portfolio = $this->fetchAll();
        if (!empty($portfolio)) {
            $Response = array(
                $portfolio
            );
            return $Response;
        }
        return array();
    }


    // portfoliodetails portfolio-details page
    public function portfoliodetails($id)
    {
        $this->query("SELECT * FROM `portfoliodetails` WHERE `categorisId` = :id AND `status` = 1");
        $this->bind(':id', $id);
        $this->execute();

        $por = $this->fetchAll();
        if (!empty($por)) {
            return  $por;
        }
        return False;
    }
}
