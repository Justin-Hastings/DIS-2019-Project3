<?php require_once 'config/db.php'; 
	require_once 'db/insertDB.php';
	require_once 'db/deleteDB.php';
	require_once 'db/selectDB.php';
	require_once 'db/updateDB.php';
	require_once 'db/viewDB.php';
	require_once 'db/popUpdateDropList.php';
	require_once 'db/popInsertDropList.php';
	require_once 'db/popDeleteDropList.php';


	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" 
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
		<link href="css/styles.css" rel="stylesheet" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="js/functions.js"></script>
		
		<title>Fish</title>
	</head>
	
	<body>
		<div class="container">
			
			<div class="row">
				<div class="col-md-12 col-xs-12 offset-me-4">
					<table>
						<tr>
							<th>Fish Name</th>
							<th>Habitat</th>
						</tr>
						<?php echo $dataRow;?>
					</table>				
				</div>
			</div>
			
			<div class="row">
				<div class="space1"></div>
			</div>
			
			<div class="row">
				<div class="col-md-4 col-xs-12 offset-me-4 form-div">
				
					<?php
					if(isset($errors)):
						if(count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error): ?>
								<li><?php echo $error; ?></li>
							<?php endforeach; ?>
						</div>
						<?php
						endif;
					endif; ?>
					
					<?php
					if(isset($successes)):
						if(count($successes) > 0): ?>
						<div class="alert alert-success">
							<?php foreach($successes as $success): ?>
								<li><?php echo $success; ?></li>
							<?php endforeach; ?>
						</div>
						<?php
						endif;
					endif; ?>
						
				
					<form action ="fishIndex.php" method="post">
					
						<h3 class="text-centre">Insert New Fish</h3>
						
						<div class="form-group">
							<label for="fishName">Name:</label>
							<input type="text" name="fishName" class="form-control 
							form-control-lg" />
						</div>
						
						<div class="form-group">
							<label for="fishHabitat">Habitat</label><br></br>
							<select name="insertHabitat">
								<?php while($row = mysqli_fetch_row($result)){ ?>
								<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
								<?php } ?>
							</select>
						</div>
						
						<div class="form-group">
							<button id="insertBtn" type="submit" name="insert-btn" class="btn
							btn-primary btn-block btn-lg">Insert Fish</button>
						</div>
					</form>
				</div>
				
				<div class="col-md-4 offset-me-4"></div>
				
				<div class="col-md-4 offset-me-4 form-div">
				<form action="fishIndex.php" method="post">

					<h3 class="text-centre">Update Fish</h3>
                    
					<div class="form-group">
						<label for="oldFishName" >Old Name</label><br></br>
						
						<select name="updateOldFishName">
								<?php while($row = mysqli_fetch_row($oldName)){ ?>
								<option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
								<?php } ?>
						</select>
						
					</div>
					
					<div class="form-group">
						<label for="newFishName" >New Name</label>
						<input type="text" name="newFishName" class="form-control form-control-lg">
					</div>

					<div class="form-group">
						<label for="fishHabitat" >Habitat</label><br></br>
						
						<select name="updateHabitat">
								<?php while($row = mysqli_fetch_row($results)){ ?>
								<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
								<?php } ?>
						</select>
					</div>
					
					<div class="form-group">
						<button type="submit" name="update-btn" class="btn btn-primary btn-block btn-lg">Update Fish</button>
					</div>
				</form>
				</div>
				
			</div>
		
			<div class="row">
				<div class="space1"></div>
			</div>
			
			<div class="row">
				<div class="col-md-4 offset-me-4 form-div">
				<form action="fishIndex.php" method="post">

					<h3 class="text-centre">Delete Fish</h3>

					<div class="form-group">
						<label for="fishName" >Fish Name</label>
						<select name="deleteFishName">
								<?php while($row = mysqli_fetch_row($deleteName)){ ?>
								<option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
								<?php } ?>
						</select>
						
					</div>

					<div class="form-group">
						<button type="submit" name="delete-btn" class="btn btn-primary btn-block btn-lg">Delete Fish</button>
					</div>
				</form>
				</div>
				
				<div class="col-md-4 offset-me-4"></div>
				
				<div class="col-md-4 offset-me-4 form-div">
				<form action="fishIndex.php" method="post">
					
					<h3 class="text-centre">Select Fish</h3>
					<div class="form-group">
						<button id="selctFish" type="submit" name="select-btn" class="btn
						btn-primary btn-block btn-lg">Select Fish</button>
					</div>
				</form>
				
				</div>
			</div>

			</div>
		</div>	
		
	</body>
</html>