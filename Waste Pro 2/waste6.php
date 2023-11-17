<!DOCTYPE html>

<html>

  <head>

    <title>Waste Management System - Report Confirmation</title>

    <!-- Link to your CSS file -->

    <link rel="stylesheet" type="text/css" href="waste.css">

  </head>

  <body>

    <!-- Navigation menu -->

    

    <!-- Main content of the page -->

    <main>

      <h1>Welcome User</h1>

      <p>Below are the  reports  of poor waste management issues submitted via the system.</p>

      <br>

               <table id="printTable">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Location</th>
  <th style="text-align: left;
  padding: 8px;">Description</th>
  <th style="text-align: left;
  padding: 8px;">Image</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "waste_management");
$sql = "SELECT * FROM `report`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["location"]); ?></td>
<td><?php echo($row["description"]); ?></td>
<td><img src="images/<?php echo($row["image"]); ?>" style="width: 200px;"></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>

    </main>
      </main>
    <div class="form">
             <p><a href="logout.php">Logout</a></p>
    </div>

    

    <!-- Footer section -->

    <footer>

      <p>&copy; 2023 Waste Management System. All rights reserved.</p>

    </footer>

  </body>

</html>

