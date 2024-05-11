<?php

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

    // Create
    public function create($Id, $user_id, $start_date, $end_date, $Activity_Name, $attachment,$activity_field) {
        $sql = "INSERT INTO activity_details (Id, user_id ,start_date, end_date, Activity_Name, attachment, activity_field)
                VALUES ('$Id', '$user_id', '$start_date', '$end_date', '$Activity_Name', '$attachment', '$activity_field')";

        if ($this->conn->query($sql) === TRUE) {
            return "New record created successfully";
        } else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

  // Update
public function update($Id, $user_id, $start_date, $end_date, $Activity_Name, $attachment, $activity_field) {
    $sql = "UPDATE activity_details SET user_id=?, start_date=?, end_date=?, Activity_Name=?, attachment=?, activity_field=? WHERE Id=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssssssi", $user_id, $start_date, $end_date, $Activity_Name, $attachment, $activity_field, $Id);
    if ($stmt->execute()) {
        return "Record updated successfully";
    } else {
        return "Error updating record: " . $stmt->error;
    }
}



    // Read
    public function readAll() {
        $sql = "SELECT * FROM activity_details";
        $result = $this->conn->query($sql);
        $activityDetails = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $activityDetails[] = $row;
            }
        }

        return $activityDetails;
    }

    // Delete
public function delete($id) {
    $sql = "DELETE FROM activity_details WHERE Id=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        return "Record with ID $id deleted successfully";
    } else {
        return "Error deleting record: " . $stmt->error;
    }
}


    public function __destruct() {
        $this->conn->close();
    }
}


