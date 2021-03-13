<?php
//Retrieve data for dropdowns for inserting fish
	$sql = "SELECT habitatId, habitatName FROM habitat";
	$stmt = $conn->prepare($sql);
	$result = $conn->query($sql);
