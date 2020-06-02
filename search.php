<?php
  
  require_once "db.php";

  if (isset($_POST['query'])) {
    
    $query = "SELECT * FROM (walletts INNER JOIN purposes ON walletts.purpose =purposes.purpose) INNER JOIN users ON users.username=walletts.username WHERE purposes.purpose LIKE '{$_POST['query']}%'
    OR walletts.portfoliocode LIKE '{$_POST['query']}%' OR description LIKE '{$_POST['query']}%'
    OR descrizione LIKE '{$_POST['query']}%' OR btc LIKE '{$_POST['query']}%' OR euro
     LIKE '{$_POST['query']}%' OR ethereum LIKE '{$_POST['query']}%' OR bitcoincash LIKE '{$_POST['query']}%'
     OR xrp LIKE '{$_POST['query']}%' OR litecoin LIKE '{$_POST['query']}%' OR dash LIKE '{$_POST['query']}%' AND walletts.username = '$username'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
}

  if (mysqli_num_rows($result) != 0){
        echo "<table border>";
			echo "<tr>";
			echo "<th> purpose</th>";
			echo "<th> purpose description</th>";
			echo "<th> wallett code</th>";
			echo "<th> wallett description</th>";
			echo "<th> btc</th>";
			echo "<th> euro</th>";
			echo "<th> ethereum</th>";
			echo "<th> bitcoincash</th>";
			echo "<th> xrp</th>";
			echo "<th> litecoin</th>";
			echo "<th> dash</th>";
			echo "</tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>$row[purpose]</td>";
				echo "<td>$row[description]</td>";
				echo "<td>$row[portfoliocode]</td>";
				echo "<td>$row[descrizione]</td>";
				echo "<td>$row[btc]</td>";
				echo "<td>$row[euro]</td>";
				echo "<td>$row[ethereum]</td>";
				echo "<td>$row[bitcoincash]</td>";
				echo "<td>$row[xrp]</td>";
				echo "<td>$row[litecoin]</td>";
				echo "<td>$row[dash]</td>";
				echo "</tr>";
			}
			echo "</table>";
  } else {
    echo "<p style='color:red'>Nothing found, try with different values!</p>";
  }

}
?>
