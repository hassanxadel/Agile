<?php
require_once 'ActivityDetailsCRUD.php';

class ActivityDetailsController {
    private $activityDetailsCRUD;

    public function __construct() {
        $this->activityDetailsCRUD = new ActivityDetailsCRUD();
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['id'])) {
                // Update or delete operation
                if (isset($_POST['update'])) {
                    $result = $this->activityDetailsCRUD->update(
                        $_POST['id'],
                        $_POST['activity_id'],
                        $_POST['user_id'],
                        $_POST['inst_id'],
                        $_POST['Start_date'],
                        $_POST['End_date'],
                        $_POST['Activity_Name'],
                        $_POST['attachment']
                    );
                } elseif (isset($_POST['delete'])) {
                    $result = $this->activityDetailsCRUD->delete($_POST['id']);
                }
            } else {
                // Create operation
                $result = $this->activityDetailsCRUD->create(
                    $_POST['activity_id'],
                    $_POST['user_id'],
                    $_POST['inst_id'],
                    $_POST['Start_date'],
                    $_POST['End_date'],
                    $_POST['Activity_Name'],
                    $_POST['attachment']
                );
            }
            echo $result;
        }
    }
}

$controller = new ActivityDetailsController();
$controller->handleRequest();

