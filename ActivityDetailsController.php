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
                // Update or delete operation
                if(isset($_POST['create'])){
                    $result = $this->activityDetailsCRUD->create(
                        $_POST['Id'],
                        $_POST['user_id'],
                        $_POST['start_date'],
                        $_POST['end_date'],
                        $_POST['Activity_Name'],
                        $_POST['attachment'],
                        $_POST['activity_field']
                    );

                } 
                elseif (isset($_POST['update'])) {
                    $result = $this->activityDetailsCRUD->update(
                        $_POST['Id'],
                        $_POST['user_id'],
                        $_POST['start_date'],
                        $_POST['end_date'],
                        $_POST['Activity_Name'],
                        $_POST['attachment'],
                        $_POST['activity_field']
                    );
                }
                elseif (isset($_POST['delete'])) {
                    $result = $this->activityDetailsCRUD->delete($_POST['id']);
                }
            } 
            $result = isset($result) ? $result : "";
            echo $result;
        }
    }
}

$controller = new ActivityDetailsController();
$controller->handleRequest();

