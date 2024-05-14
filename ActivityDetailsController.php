<?php

require_once 'ActivityDetailsCRUD.php';

class ActivityDetailsController {
    private $activityDetailsCRUD;

    public function __construct() {
        $this->activityDetailsCRUD = new ActivityDetailsCRUD();
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['Id'])) {
                if(isset($_POST['create'])) {
                
                    $activity = new Activity();
                    $activity->Id = $_POST['Id'];
                    $activity->user_id = $_POST['user_id'];
                    $activity->start_date = $_POST['start_date'];
                    $activity->end_date = $_POST['end_date'];
                    $activity->Activity_Name = $_POST['Activity_Name'];
                    $activity->attachment = $_POST['attachment'];
                    $activity->Major = $_POST['Major'];
                
                    $result = $this->activityDetailsCRUD->create($activity);
                }
                elseif(isset($_POST['feedback'])) {
                
                    $feedback = new Feedback();
                    $feedback->Id = $_POST['Id'];
                    $feedback->FullName = $_POST['FullName'];
                    $feedback->email = $_POST['email'];
                    $feedback->Instructor_id = $_POST['Instructor_id'];
                    $feedback->Message = $_POST['message'];
                
                    $result = $this->activityDetailsCRUD->feedback($feedback);
                }
                elseif(isset($_POST['update'])) {
                  
                    $activity = new Activity();
                    $activity->Id = $_POST['Id'];
                    $activity->user_id = $_POST['user_id'];
                    $activity->start_date = $_POST['start_date'];
                    $activity->end_date = $_POST['end_date'];
                    $activity->Activity_Name = $_POST['Activity_Name'];
                    $activity->attachment = $_POST['attachment'];
                    $activity->Major = $_POST['Major'];
                
                    $result = $this->activityDetailsCRUD->update($activity);
                } elseif(isset($_POST['delete'])) {
                    $result = $this->activityDetailsCRUD->delete($_POST['Id']);
                }
            } 
            $result = isset($result) ? $result : "";
            echo $result;
        }
    }
}

$controller = new ActivityDetailsController();
$controller->handleRequest();
