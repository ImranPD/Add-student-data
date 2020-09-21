<?php require_once "asset/app/autoload.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
	<link rel="stylesheet" href="asset/css/responsive.css">
</head>
<body>
		<?php 
				/**
				 * value isseting
				 */
			if(isset($_POST['submit'])){

				$name=$_POST['name'];
				$email=$_POST['email'];
				$cell=$_POST['cell'];
				$uname=$_POST['uname'];
				$age=$_POST['age'];
					 if(isset($_POST['gender'])){
					 	$gender=$_POST['gender'];
					 }
				$shift=$_POST['shift'];
				$location=$_POST['location'];

				$files_name=$_FILES['photo']['name'];
				$tmp_files_name=$_FILES['photo']['tmp_name'];
				$files_size=$_FILES['photo']['size'];

				$unique_file_name=md5(time() . rand()) .$files_name;

					/**
					 * empty value set
					 */
				if(empty($name) || empty($email) || empty($cell) || empty($uname) || empty($age) || empty($gender) || empty($shift) || empty($location)){

						$msg=headMsg('** All fields are require **');

				}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

						$msg=headMsg('** Invalid Email **');

				}elseif( $age <=15 || $age>=30){

						$msg=headMsg('** Invalid Age **');
				}else{

						$msg=headMsg('** Data stable **','success');

						move_uploaded_file($tmp_files_name, 'photo/student/' . $unique_file_name);

						$sql="INSERT INTO students(name,email,cell,uname,age,gender,shift,location,photo)values('$name','$email','$cell','$uname','$age','$gender','$shift','$location','$unique_file_name')";
						$connection->query($sql);
				}
			}



		 ?>

		<section id="design">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="card shadow-lg w-50 mx-auto my-5">
							<div class="card-body">
								<h2 class="text-center">Add student data</h2>
								<?php 

									if(isset($msg)){
										echo $msg;
									}

								 ?>
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label for="">Name</label>
										<input name="name" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label for="">Email</label>
										<input name="email" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label for="">Cell</label>
										<input name="cell" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label for="">Username</label>
										<input name="uname" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label for="">Age</label>
										<input name="age" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label for="">Gender</label>
										<br>
										<input name="gender" type="radio" value="male" id="gender"><label class="align-middle ml-1" for="male">Male</label>
										<input name="gender" type="radio" value="female" id="gender"><label class="align-middle ml-1" for="female">Female</label>
									</div>
									<div class="form-group">
										<label for="">Shift</label>
										<select class="form-control" name="shift" id="">
											<option value="">-- select --</option>
											<option value="Day">Day</option>
											<option value="Evening">Evening</option>
										</select>
									</div>
									<div class="form-group">
										<label for="">location</label>
										<select class="form-control" name="location" id="">
											<option value="">-- City --</option>
											<option value="Dhaka">Dhaka</option>
											<option value="Gazipur">Gazipur</option>
											<option value="Mymenshing">Mymenshing</option>
											<option value="Rangpur">Rangpur</option>
											<option value="Cumilla">Cumilla</option>
											<option value="Chitagong">Chitagong</option>
											<option value="Sylhet">Sylhet</option>
											<option value="Khulna">Khulna</option>
											<option value="Rajshahi">Rajshahi</option>
											<option value="Barishal">Barishal</option>
										</select>
									</div>
									<div class="form-group">
										<label for="">Photo</label>
										<input name="photo" class="form-control p-1" type="file">
									</div>
									<div class="form-group">
										<input name="submit" class="btn btn-outline-primary btn-lg" type="submit" value="Send">
										<a class="btn btn-outline-primary btn-lg" href="student.php" target="_blank"> View student Data</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<script src="asset/js/jquery-3.5.1.min.js"></script>
	<script src="asset/js/popper.min.js"></script>
	<script src="asset/js/bootstrap.min.js"></script>
</body>
</html>