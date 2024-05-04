<?php
require_once 'ActivityDetailsCRUD.php';

class ActivityDetailsController {
    private $activityDetailsCRUD;

    public function __construct() {
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "agile";

        $this->activityDetailsCRUD = new ActivityDetailsCRUD($servername, $username, $password, $database);
    }

    public function handleRequest() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
         
            $activity_id = $_POST['activity_id'];
            $user_id = $_POST['user_id'];
            $Instructor = $_POST['inst_id'];
            $start_date = $_POST['Start_date'];
            $End_date = $_POST['End_date'];
            $Activity_Name = $_POST['name'];
            $attachment = $_POST['attachment'];

            
            $result = $this->activityDetailsCRUD->create($activity_id, $user_id, $Instructor, $start_date,$End_date, $Activity_Name ,$attachment );

            
            echo $result;
        }

      
        include 'activitydetails.html';
    }
}

$controller = new ActivityDetailsController();
$controller->handleRequest();
?>
