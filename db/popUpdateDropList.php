<?php
//Retrieve data for dropdowns for updating fish
	//Populate habitat list

	$sql = "SELECT habitatId, habitatName FROM habitat";
	$stmt = $conn->prepare($sql);
	$results = $conn->query($sql);

?>

<?php
	//Populate old fish name list
	
	$sql = "SELECT fishId, fishName FROM fish ORDER BY fishName";
	$stmt = $conn->prepare($sql);
	$oldName = $conn->query($sql);

?>