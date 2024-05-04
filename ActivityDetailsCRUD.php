<?php

class ActivityDetailsCRUD {
    private $conn;

    public function __construct() {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "agileproject";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Create
    public function create($activity_id, $user_id, $Instructor, $start_date, $End_date, $Activity_Name, $attachment) {
        $sql = "INSERT INTO activity_details (activity_id, user_id, Instructor, start_date, end_date, Activity_Name, attachment)
                VALUES ('$activity_id', '$user_id', '$Instructor', '$start_date', '$End_date', '$Activity_Name', '$attachment')";

        if ($this->conn->query($sql) === TRUE) {
            return "New record created successfully";
        } else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
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

    // Update
    public function update($id, $activity_id, $user_id, $Instructor, $start_date, $End_date, $Activity_Name, $attachment) {
        $sql = "UPDATE activity_details SET activity_id='$activity_id', user_id='$user_id', Instructor='$Instructor', start_date='$start_date', end_date='$End_date', Activity_Name='$Activity_Name', attachment='$attachment' WHERE id=$id";

        if ($this->conn->query($sql) === TRUE) {
            return "Record updated successfully";
        } else {
            return "Error updating record: " . $this->conn->error;
        }
    }

    // Delete
    public function delete($id) {
        $sql = "DELETE FROM activity_details WHERE id=$id";

        if ($this->conn->query($sql) === TRUE) {
            return "Record deleted successfully";
        } else {
            return "Error deleting record: " . $this->conn->error;
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}


