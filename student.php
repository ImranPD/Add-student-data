<?php require_once "asset/app/autoload.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Student data</title>
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
	<link rel="stylesheet" href="asset/css/responsive.css">
</head>
<body>
		<div class="box-table">
		<div class="card shadow-lg">
			<div class="card-body">
				<h2 class="text-center">Student data details :</h2>
				<table class="table table-striped table-hover text-center my-auto">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Username</th>
							<th>Age</th>
							<th>Gender</th>
							<th>Shift</th>
							<th>Location</th>
							<th>Photo</th>
							<th>Status</th>
							<th>Create at</th>
							<th>Update</th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$sql="SELECT * FROM students";
							$data=$connection->query($sql);

							while($all_data=$data->fetch_assoc()){

						 ?>
						<tr>
							<td><?php echo $all_data['id']; ?></td>
							<td><?php echo $all_data['name']; ?></td>
							<td><?php echo $all_data['email']; ?></td>
							<td><?php echo $all_data['cell']; ?></td>
							<td><?php echo $all_data['uname']; ?></td>
							<td><?php echo $all_data['age']; ?></td>
							<td><?php echo $all_data['gender']; ?></td>
							<td><?php echo $all_data['shift']; ?></td>
							<td><?php echo $all_data['location']; ?></td>
							<td><img class="img-fluid" width="100" height="100" src="photo/student/<?php echo $all_data['photo']; ?>" alt=""></td>
							<td><?php echo $all_data['status']; ?></td>
							<td><?php echo $all_data['create_at']; ?></td>
							<td><?php echo $all_data['update_at']; ?></td>
						</tr>
					  <?php } ?>
					</tbody>
				</table>
				<a class="btn btn-outline-primary btn-lg" href="index.php">Add Student</a>
			</div>
		</div>
	</div>
	<script src="asset/js/jquery-3.5.1.min.js"></script>
	<script src="asset/js/popper.min.js"></script>
	<script src="asset/js/bootstrap.min.js"></script>
</body>
</html>