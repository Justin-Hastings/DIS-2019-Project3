<?php

// if sign-up button pressed add record to user table
if(isset($_POST['insert-btn'])) {
	// get data sent from html page in browser
    $fishName = $_POST['fishName']; // quoted parts are ids in html 
    $fishHabitat = $_POST['insertHabitat'];

    // some basic validation
    if (empty($fishName)) {
        $errors['fishName'] = "Fish name required";
    }
    if (empty($fishHabitat)) {
        $errors['fishHabitat'] = "Habitat required";
    }
	
	//only process if there are not errors
	if( count($errors) === 0 ) {

		// create SQL insert string
		$sql = "INSERT INTO fish (fishName, Habitat) VALUES (?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('ss', 
			$fishName, $fishHabitat);
		// ssiss because it is string, string, integer, string, string
		
		// run the SQL and if successful 
		if( $stmt->execute()) {
			$successes['alert-class'] = "INSERT successful: " . $stmt->affected_rows . " rows added";
		} else {
			// add error message to errors array
            if(mysqli_connect_errno()) {
                $errors['db_connection'] = "Failed to connect to MySQL: " . $conn->connect_error;
            }
            $errors['db_error'] = "Database error: failed to insert lure.  " . $conn->error;
        }
		
        $stmt->close();
    }
}