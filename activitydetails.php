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
        Activity ID: <input type="text" name="Id"><br>
        Activity Name: <input type="text" name="Activity_Name"><br>
        Instructor ID: <input type="text" name="user_id"><br>
        Attachment: <input type="text" name="attachment"><br>
        Start Date: <input type="date" name="start_date"><br>
        End Date: <input type="date" name="end_date"><br>
        Activity Major: <input type="text" name="Major"><br>
        <input type="submit" name="create" value="Create">
    </form>




    <h3>Read All Activity Details</h3>
    <table>
  <tr>
    <th>ID</th>
    <th>Instructor Name</th>
    <th>Teaching Field</th>
    <th>Email</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Dr. Mahmoud Samir</td>
    <td>Data Analysis</td>
    <td>Mahmoud Samir@gmail.com</td>
    

  </tr>
  <tr>
    <td>2</td>
    <td>Dr. Tamer Salama</td>
    <td>Mobile Programming</td>
    <td>Tamer Salama@gmail.com</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Dr. Ahmed Khaled</td>
    <td>Web Development</td>
    <td>Ahmed Khaled@gmail.com</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Dr. Mohamed Hassan</td>
    <td>Digital Marketing</td>
    <td>MohamedHassan@gmail.com</td>
  </tr>
</table>

    <?php
   
   require_once 'ActivityDetailsCRUD.php';

   $activityDetailsCRUD = new ActivityDetailsCRUD();

   $activities = $activityDetailsCRUD->readAllActivities();
   if (!empty($activities)) {
       echo "<ol>";
       foreach ($activities as $activity) {
           echo "<li> ". "1.Instructor ID: " . $activity->user_id ."<br>" . "2.Start Date: " . $activity->start_date ."<br>" . "3.End Date: " . $activity->end_date ."<br>". "4.Activity Name: " . $activity->Activity_Name ."<br>". "5.Attachment: " . $activity->attachment ."<br>"."6.Activity Major:" . $activity->Major ."</li>";
       }
       echo "</ol>";
   } else {
       echo "No activity details found";
   }
    ?>

    <h3>Update Activity Detail</h3>
    <form action="ActivityDetailsController.php" method="post">
        Activity ID: <input type="text" name="Id"><br>
        Activity Name: <input type="text" name="Activity_Name"><br>
        Instructor ID: <input type="text" name="user_id"><br>
        Attachment: <input type="text" name="attachment"><br>
        Start Date: <input type="date" name="start_date"><br>
        End Date: <input type="date" name="end_date"><br>
        Activity Major: <input type="text" name="Major"><br>
        <input type="submit" name="update" value="Update">
    </form>

    <h3>Delete Activity Detail</h3>
    <form action="ActivityDetailsController.php" method="post">
    ID: <input type="text" name="id"><br>
    <input type="submit" name="delete" value="Delete">
</form>
<h2>Feedback Form</h2>
    <form action="ActivityDetailsController.php" method="post">

        <label for="name">Name:</label><br>
        <input type="text" id="FullName" name="FullName"><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="Instructor_id">Instructor Id:</label><br>
        <input type="text" id="Instructor_id" name="Instructor_id"><br><br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
