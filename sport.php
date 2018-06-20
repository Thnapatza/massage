<?php
		require_once('config/database.php');

		$sport = $_POST['sport'];


		$sql =  "INSERT INTO sport (sport) VALUES ('$sport');";

		mysqli_query($conn,$sql);
?>