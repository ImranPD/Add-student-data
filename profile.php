<?php require_once "asset/app/autoload.php"; ?>
<?php 
	if(isset($_GET['student_id'])){
		$student_id=$_GET['student_id'];
		$sql="SELECT * FROM students WHERE id='$student_id'";
		$data=$connection->query($sql);
		$single_student=$data->fetch_assoc();
	}




 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
	<link rel="stylesheet" href="asset/css/responsive.css">

	<style>
		.pro{
			font-family: ubuntu-condensed;
			width: 500px;
			margin: 50px auto 0px;
		}
		.profile img{
			margin: auto;
			display: block;
			width: 200px;
			height: 200px;
			border-radius: 50%;
			border:10px solid #fff;
		}
		.profile h3{
			font-family: ubuntu-condensed;
			text-align: center;
		}
		.profile h5{
			font-family: ubuntu-condensed;
			text-align: center;
		}
	</style>
</head>
<body>
		<div class="pro">
			<a class="btn btn-primary" href="student.php">Back</a>
			<div class="card">
				<div class="card-body profile">
				    <img class="shadow" src="photo/student/<?php echo $single_student['photo'];?>" alt="">
				     <h3><?php echo $single_student['name'];?></h3>
				     <h5><?php echo $single_student['uname'];?></h5>
				   <table class="table table-striped">
					<tr>
						<td>Name</td>
						<td><?php echo $single_student['name'];?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $single_student['email'];?></td>
					</tr>
					<tr>
						<td>Cell</td>
						<td><?php echo $single_student['cell'];?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><?php echo $single_student['uname'];?></td>
					</tr>
					<tr>
						<td>Age</td>
						<td><?php echo $single_student['age'];?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo $single_student['gender'];?></td>
					</tr>
					<tr>
						<td>Shift</td>
						<td><?php echo $single_student['shift'];?></td>
					</tr>
					<tr>
						<td>Location</td>
						<td><?php echo $single_student['location'];?></td>
					</tr>
				</table>
				</div>
			</div>
		</div>

		</section>
	<script src="asset/js/jquery-3.5.1.min.js"></script>
	<script src="asset/js/popper.min.js"></script>
	<script src="asset/js/bootstrap.min.js"></script>
</body>
</html>