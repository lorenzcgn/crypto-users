<?php

  require_once "db.php";


  if (isset($_POST['query'])) {
    
    $query = "SELECT * FROM purposes WHERE purpose LIKE '{$_POST['query']}%'
    OR description LIKE '{$_POST['query']}%'";
    $result = mysqli_query($connection, $query);
  if (mysqli_num_rows($result) > 0) {
        echo "<table border>";
			echo "<tr>";
			echo "<th> purpose</th>";
			echo "<th> purpose description</th>";
			echo "</tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>$row[purpose]</td>";
				echo "<td>$row[description]</td>";
				echo "</tr>";
			}
			echo "</table>";
  } else {
    echo "<p style='color:red'>Nothing found, try with different values!</p>";
  }

}
?>
