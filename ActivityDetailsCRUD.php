<?php

class Activity {
    public $Id;
    public $user_id;
    public $start_date;
    public $end_date;
    public $Activity_Name;
    public $attachment;
    public $Major;
}

class Feedback {
    public $Id;
    public $FullName;
    public $email;
    public $Instructor_id;
    public $Message;
}

class ActivityDetailsCRUD {
    private $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "agileproject";

        $this->conn = new mysqli($servername, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function createActivityObject($row) {
        $activity = new Activity();
        $activity->Id = $row['Id'];
        $activity->user_id = $row['user_id'];
        $activity->start_date = $row['start_date'];
        $activity->end_date = $row['end_date'];
        $activity->Activity_Name = $row['Activity_Name'];
        $activity->attachment = $row['attachment'];
        $activity->Major = $row['Major'];
      
        return $activity;
    }

    public function createFeedbackObject($row) {
        $feedback = new Feedback();
        $feedback->Id = $row['Id'];
        $feedback->FullName = $row['FullName'];
        $feedback->email = $row['email'];
        $feedback->Instructor_id = $row['Instructor_id'];
        $feedback->Message = $row['Message'];

        return $feedback;
    }
    public function create(Activity $activity) {
        $sql = "INSERT INTO activity_details (Id, user_id, start_date, end_date, Activity_Name, attachment, Major)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iisssss", $activity->Id, $activity->user_id, $activity->start_date, $activity->end_date, $activity->Activity_Name, $activity->attachment, $activity->Major);
    
        if ($stmt->execute()) {
            return "New record created successfully";
        } else {
            return "Error creating record: " . $stmt->error;
        }
    }
    
    
    public function feedback(Feedback $feedback) {
        $sql = "INSERT INTO feedback (Id, FullName, email, Instructor_id, Message)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issis", $feedback->Id, $feedback->FullName, $feedback->email, $feedback->Instructor_id, $feedback->Message);
    
        if ($stmt->execute()) {
            return "New Feedback is saved";
        } else {
            return "Error saving feedback: " . $stmt->error;
        }
    }
    
    public function update(Activity $activity) {
        $sql = "UPDATE activity_details SET user_id=?, start_date=?, end_date=?, Activity_Name=?, attachment=?, Major=? WHERE Id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isssssi", $activity->user_id, $activity->start_date, $activity->end_date, $activity->Activity_Name, $activity->attachment, $activity->Major, $activity->Id);
    
        if ($stmt->execute()) {
            return "Record updated successfully";
        } else {
            return "Error updating record: " . $stmt->error;
        }
    }
    
    

    public function readAllActivities() {
        $sql = "SELECT * FROM activity_details";
        $result = $this->conn->query($sql);
        $activities = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $activity = $this->createActivityObject($row);
                $activities[] = $activity;
            }
        }

        return $activities;
    }

    public function delete($Id) {
        $stmt = $this->conn->prepare("DELETE FROM activity_details WHERE Id=?");
        $stmt->bind_param("i", $Id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                return "Record with ID $Id deleted successfully";
            } else {
                return "No record found with ID $Id";
            }
        } else {
            return "Error deleting record: " . $stmt->error;
        }
    }

    

    public function __destruct() {
        $this->conn->close();
    }
}
