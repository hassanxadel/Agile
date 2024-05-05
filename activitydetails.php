<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Details CRUD</title>
</head>
<body>
    <h2>Activity Details CRUD</h2>

    <h3>Create Activity</h3>
    <form action="ActivityDetailsController.php" method="post">
        Activity ID: <input type="text" name="activity_id"><br>
        Activity Name: <input type="text" name="Activity_Name"><br>
        Instructor ID: <input type="text" name="user_id"><br>
        Attachment: <input type="text" name="attachment"><br>
        Start Date: <input type="date" name="start_date"><br>
        End Date: <input type="date" name="end_date"><br>
        Activity Field: <input type="text" name="activity_field"><br>
        <input type="submit" value="Create">
    </form>

<table>
  <tr>
    <th>ID</th>
    <th>Instructor Name</th>
    <th>Teaching Field</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Dr. Mahmoud Samir</td>
    <td>Data Analysis</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Dr. Tamer Salama</td>
    <td>Mobile Programming</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Dr. Ahmed Khaled</td>
    <td>Web Development</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Dr. Mohamed Hassan</td>
    <td>Digital Marketing</td>
  </tr>
</table>
<table>
  <tr>
    <th>ID</th>
    <th>Activity Fileds</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Data Analysis</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Mobile Programming</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Web Development</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Digital Marketing</td>
  </tr>
</table>


    <h3>Read All Activity Details</h3>

    <?php
    require_once 'ActivityDetailsCRUD.php';

    $activityDetailsCRUD = new ActivityDetailsCRUD();

    $activityDetails = $activityDetailsCRUD->readAll();
    if (!empty($activityDetails)) {
        echo "<ul>";
        foreach ($activityDetails as $detail) {
            echo "<li> ". ", Activity ID: " . $detail['activity_id'] ."<br>". ", Instructor ID: " . $detail['user_id']."<br>" . ", Start Date: " . $detail['start_date']."<br>" . ", End Date: " . $detail['end_date'] ."<br>". ", Activity Name: " . $detail['Activity_Name'] ."<br>". ", Attachment: " . $detail['attachment']."<br>".",Activity Field:" . $detail['activity_field'] ."</li>";
        }
        echo "</ul>";
    } else {
        echo "No activity details found";
    }
    ?>

    <h3>Update Activity Detail</h3>
    <form action="ActivityDetailsController.php" method="post">
        Activity ID: <input type="text" name="activity_id"><br>
        Activity Name: <input type="text" name="Activity_Name"><br>
        Instructor ID: <input type="text" name="user_id"><br>
        Attachment: <input type="text" name="attachment"><br>
        Start Date: <input type="date" name="start_date"><br>
        End Date: <input type="date" name="end_date"><br>
        Activity Field: <input type="text" name="activity_field"><br>
        <input type="submit" value="Update">
    </form>

    <h3>Delete Activity Detail</h3>
    <form action="ActivityDetailsController.php" method="post">
        ID: <input type="text" name="id"><br>
        <input type="submit" value="Delete">
    </form>
</body>
</html>
