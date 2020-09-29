<?php require_once "asset/app/autoload.php"; ?>
<?php 
				/**
				 * value isseting
				 */
			if(isset($_POST['submit'])){
				
				$edit_id=$_GET['edit_id'];

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

						

						$photo_name='';

						if(empty($_FILES['new_photo']['name'])){

							$photo_name=$_POST['old_photo'];

						}else{

							$files_name=$_FILES['new_photo']['name'];
			             	$tmp_files_name=$_FILES['new_photo']['tmp_name'];
							$files_size=$_FILES['new_photo']['size'];

							$photo_name=md5(time() . rand()) .$files_name;
							move_uploaded_file($tmp_files_name, 'photo/student/' . $photo_name);

						}

						

						$sql="UPDATE students SET name='$name',email='$email',cell='$cell',uname='$uname',age='$age',gender='$gender',shift='$shift',location='$location',photo='$photo_name' WHERE id='$edit_id'";

						$connection->query($sql);

						$msg=headMsg('** Data Updated **','success');
				
				}
			}



		 ?>

<?php 
	
	if(isset($_GET['edit_id'])){

		$edit_id=$_GET['edit_id'];

		$sql="SELECT * FROM students WHERE id='$edit_id'";

		$data=$connection->query($sql);

		$edit_data=$data->fetch_assoc();


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
</head>
<body>

		<section id="design">
			<a style="margin-left: 400px;" class="btn btn-outline-primary btn-lg" href="student.php">Back</a>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="card shadow-lg w-50 mx-auto">
							<div class="card-body">
								<h2 class="text-center">Update Now</h2>
								<?php 

									if(isset($msg)){
										echo $msg;
									}

								 ?>
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label for="">Name</label>
										<input name="name" class="form-control" value="<?php echo $edit_data['name'];?>" type="text">
									</div>
									<div class="form-group">
										<label for="">Email</label>
										<input value="<?php echo $edit_data['email'];?>" name="email" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label for="">Cell</label>
										<input value="<?php echo $edit_data['cell'];?>" name="cell" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label for="">Username</label>
										<input value="<?php echo $edit_data['uname'];?>" name="uname" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label for="">Age</label>
										<input value="<?php echo $edit_data['age'];?>" name="age" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label for="">Gender</label>
										<br>
										<input <?php if($edit_data['gender']=='male'){echo "checked";} ?> name="gender" type="radio" value="male" id="male"><label class="align-middle ml-1" for="male">Male</label>
										<input <?php if($edit_data['gender']=='female'){echo "checked";} ?> name="gender" type="radio" value="female" id="female"><label class="align-middle ml-1" for="female">Female</label>
									</div>
									<div class="form-group">
										<label for="">Shift</label>
										<select class="form-control" name="shift" id="">
											<option value="">-- select --</option>
											<option <?php if($edit_data['shift']=='Day'){echo "selected";} ?> value="Day">Day</option>
											<option <?php if($edit_data['shift']=='Evening'){echo "selected";} ?> value="Evening">Evening</option>
										</select>
									</div>
									<div class="form-group">
										<label for="">location</label>
										<select class="form-control" name="location" id="">
											<option value="">-- City --</option>
											<option <?php if($edit_data['location']=='Dhaka'){echo "selected";} ?> value="Dhaka">Dhaka</option>
											<option <?php if($edit_data['location']=='Gazipur'){echo "selected";} ?> value="Gazipur">Gazipur</option>
											<option <?php if($edit_data['location']=='Mymenshing'){echo "selected";} ?> value="Mymenshing">Mymenshing</option>
											<option <?php if($edit_data['location']=='Rangpur'){echo "selected";} ?> value="Rangpur">Rangpur</option>
											<option <?php if($edit_data['location']=='Cumilla'){echo "selected";} ?> value="Cumilla">Cumilla</option>
											<option <?php if($edit_data['location']=='Chitagong'){echo "selected";} ?> value="Chitagong">Chitagong</option>
											<option <?php if($edit_data['location']=='Sylhet'){echo "selected";} ?> value="Sylhet">Sylhet</option>
											<option <?php if($edit_data['location']=='Khulna'){echo "selected";} ?> value="Khulna">Khulna</option>
											<option <?php if($edit_data['location']=='Rajshahi'){echo "selected";} ?> value="Rajshahi">Rajshahi</option>
											<option <?php if($edit_data['location']=='Barishal'){echo "selected";} ?> value="Barishal">Barishal</option>
										</select>
									</div>
									<div class="form-group">
										<input name="old_photo" value="<?php echo $edit_data['photo']; ?>" type="hidden">
										<img style="width:200px;" src="photo/student/<?php echo $edit_data['photo'];?>" alt="">
									</div>
									<div class="form-group">
										<label for="">Photo</label>
										<input name="new_photo" class="form-control p-1" type="file">
									</div>
									<div class="form-group">
										<input name="submit" class="btn btn-outline-primary btn-lg" type="submit" value="Update">
										
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