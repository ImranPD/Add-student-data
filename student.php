<?php require_once "asset/app/autoload.php"; ?>
<?php 
		
		if(isset($_GET['delete_id'])){
			$delete_id=$_GET['delete_id'];
			$photo_id=$_GET['photo'];
			$sql="DELETE FROM students WHERE id='$delete_id'";
			$connection->query($sql);

			unlink('photo/student/'. $photo_id);

			header("location:student.php");

		}






	if(isset($_GET['active_id'])){
			$active_id=$_GET['active_id'];
			$sql="UPDATE students SET status='active' WHERE id='$active_id'";
			$connection->query($sql);
		

			header("location:student.php");

	}
	if(isset($_GET['inactive_id'])){
			$inactive_id=$_GET['inactive_id'];
			$sql="UPDATE students SET status='inactive' WHERE id='$inactive_id'";
			$connection->query($sql);
		

			header("location:student.php");

	}




 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Student data</title>
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/fonts/font awesome/css/all.css">
	<link rel="stylesheet" href="asset/css/style.css">
	<link rel="stylesheet" href="asset/css/responsive.css">
	<style>
		.stu-table{
			width: 1000px;
			margin: 50px auto 0px;
		}
		.stu-table table tr td img{
			width: 50px;
			height: 50px;
			vertical-align: middle;
			border-radius: 50%;

		}
		.stu-table table tr td{
			vertical-align: middle;
			padding: 3px 5px;
		}
		.stu-table table tbody tr td:first-child{
			width: 30px;
		}
		.stu-table table tbody tr td:last-child{
			width: 160px;
			text-align: right;
		}

	</style>
</head>
<body>

	<div class="stu-table">
		<a class="btn btn-primary" href="index.php">Add Student</a>
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Student Information</h3>
				<table class="table table-striped text-center">
					<thead>
					   <tr>
					   	<th>Id</th>
					    <th>Name</th>
					    <th>Email</th>
					    <th>cell</th>
					    <th>Gender</th>
					    <th>Location</th>
					    <th>Photo</th>
					    <th>Action</th>
				      </tr>
				   </thead>
				   <tbody>
				   	<?php 

				   		$i=1;
				   		$sql="SELECT * FROM students";
				   		$data=$connection->query($sql);

				   		while($single_student=$data->fetch_assoc()):

				   	 ?>
					  <tr>
					  	<td><?php echo $i;$i++ ;?></td>
						<td><?php echo $single_student['name'];?></td>
						<td><?php echo $single_student['email'];?></td>
						<td><?php echo $single_student['cell'];?></td>
						<td><?php echo $single_student['gender'];?></td>
						<td><?php echo $single_student['location'];?></td>
						<td><img src="photo/student/<?php echo $single_student['photo'];?>" alt=""></td>
						<td>
							<?php if($single_student['status']=='inactive'): ?>
								<a class="btn btn-sm btn-success" href="?active_id=<?php echo $single_student['id'];?>"><i class="fas fa-thumbs-up"></i></a>
							<?php elseif($single_student['status']=='active'): ?>
								<a class="btn btn-sm btn-danger" href="?inactive_id=<?php echo $single_student['id'];?>"><i class="fas fa-thumbs-down"></i></a>
							<?php endif; ?>
							<a class="btn btn-sm btn-success" href="profile.php?student_id=<?php echo $single_student['id'];?>"><i class="fas fa-eye"></i></a>
							<a class="btn btn-sm btn-info" href="edit.php?edit_id=<?php echo $single_student['id'];?>"><i class="fas fa-edit"></i></a>
							<a id="delete" class="btn btn-sm btn-danger" href="?delete_id=<?php echo $single_student['id'];?>&photo_id=<?php echo $single_student['photo'];?>"><i class="fas fa-trash-alt"></i></a>
						</td>
					  </tr>
					<?php endwhile; ?>
				   </tbody>
				</table>
			</div>
		</div>
	</div>
		
	<script src="asset/js/jquery-3.5.1.min.js"></script>
	<script src="asset/js/popper.min.js"></script>
	<script src="asset/js/bootstrap.min.js"></script>
	<script>
		$('a#delete').click(function(){
			let conf=confirm('Are you sure');

			if(conf==true){
				return true;

			}else{
				return false;

			}

		});
	</script>
</body>
</html>