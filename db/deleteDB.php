<?php

if(isset($_POST['delete-btn'])) {
	// get data sent from html page in browser
    $fishName = $_POST['deleteFishName']; // quoted parts are ids in html 

    // some basic validation
    if (empty($fishName)) {
        $errors['deleteFishName'] = "Fish name required";
    }
	
	//only process if there are not errors
	if( count($errors) === 0 ) {

		// create SQL insert string
		$sql = "DELETE FROM fish WHERE fishName = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('s', $fishName);
		
		// run the SQL and if successful 
		if($stmt->execute()) {
			$successes['alert-class'] = "DELETE successful: " . $stmt->affected_rows . " records removed.";
		} else {
			// add error message to errors array
            if(mysqli_connect_errno()) {
                $errors['db_connection'] = "Failed to connect to MySQL: " . $conn->connect_error;
            }
            $errors['db_error'] = "Database error: failed to DELETE lure.  " . $conn->error;
        }
        $stmt->close();
    }
}