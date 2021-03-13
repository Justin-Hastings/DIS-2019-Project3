<?php

if(isset($_POST['update-btn'])) {
	// get data sent from html page in browser
    $oldFishName = $_POST['updateOldFishName']; // quoted parts are ids in html 
    $newFishName = $_POST['newFishName'];
    $fishHabitat = $_POST['updateHabitat'];



    // some basic validation
    if (empty($oldFishName)) {
        $errors['oldFishName'] = "Old fish name required";
    }
    if (empty($newFishName)) {
        $errors['newFishName'] = "New fish name required";
    }
	    if (empty($fishHabitat)) {
        $errors['fishHabiat'] = "Fish habitat required";
    }
	
	//only process if there are not errors
	if( count($errors) === 0 ) {

		$sql ="UPDATE fish SET fishName='$newFishName', Habitat='$fishHabitat'
		WHERE fishName='$oldFishName'";
		$stmt = $conn->prepare($sql);
		// run the SQL and if successful 
		if($stmt->execute()) {
			$successes['alert-class'] = "UPDATE successful " . $stmt->affected_rows . " records updated.";
		} else {
			// add error message to errors array
            if(mysqli_connect_errno()) {
                $errors['db_connection'] = "Failed to connect to MySQL: " . $conn->connect_error;
            }
            $errors['db_error'] = "Database error: failed to UPDATE lure.  " . $conn->error;
        }
        $stmt->close();
    }
}