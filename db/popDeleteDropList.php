<?php
	//Populate old fish name list
	
	$sql = "SELECT fishId, fishName FROM fish ORDER BY fishName";
	$stmt = $conn->prepare($sql);
	$deleteName = $conn->query($sql);

?>