<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Details CRUD</title>
</head>
<body>
    <h2>Activity Details CRUD</h2>

    <h3>Create Activity Detail</h3>
    <form action="ActivityDetailsController.php" method="post">
        Activity ID: <input type="text" name="activity_id"><br>
        Activity Name: <input type="text" name="Name"><br>
        Instructor: <input type="text" name="inst_id"><br>
        Attachment: <input type="text" name="attachment"><br>
        Start Date: <input type="date" name="Start_date"><br>
        End Date: <input type="date" name="End_date"><br>
        <input type="submit" value="Create">
    </form>

    <h3>Read All Activity Details</h3>
    <?php
    // Include ActivityDetailsCRUD.php
    require_once 'ActivityDetailsCRUD.php';

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "agile";

    // Create instance of ActivityDetailsCRUD class
    $activityDetailsCRUD = new ActivityDetailsCRUD($servername, $username, $password, $database);

    // Read all activity details
    $activityDetails = $activityDetailsCRUD->readAll();
    if (!empty($activityDetails)) {
        echo "<ul>";
        foreach ($activityDetails as $detail) {
            echo "<li>ID: " . $detail['id'] . ", Activity ID: " . $detail['activity_id'] . ", User ID: " . $detail['user_id'] . ", Activity Date: " . $detail['activity_date'] . ", Description: " . $detail['description'] . ", Attachment: " . $detail['attachment'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No activity details found";
    }
    ?>

    <h3>Update Activity Detail</h3>
    <form action="ActivityDetailsController.php" method="post">
        ID: <input type="text" name="id"><br>
        Activity ID: <input type="text" name="activity_id"><br>
        Activity Name: <input type="text" name="name"><br>
        Instructor: <input type="text" name="inst_id"><br>
        Attachment: <input type="text" name="attachment"><br>
        Start Date: <input type="date" name="Start_date"><br>
        End Date: <input type="date" name="End_date"><br>
        <input type="submit" value="Update">
    </form>

    <h3>Delete Activity Detail</h3>
    <form action="handle_delete.php" method="post">
        ID: <input type="text" name="id"><br>
        <input type="submit" value="Delete">
    </form>
</body>
</html>