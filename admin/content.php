<?php
	include 'include/conn.php';
	
	if($page =="addDonation") {
		?>
<div class="row">
	<div class="col-sm-12">
<?php
		extract($_POST);
		if(isset($submit)) {
			
			$title = filter_var($title, FILTER_SANITIZE_SPECIAL_CHARS);
			$amount = filter_var($amount, FILTER_SANITIZE_SPECIAL_CHARS);
			$deadline = filter_var($deadline, FILTER_SANITIZE_SPECIAL_CHARS);
			$description = filter_var($description, FILTER_SANITIZE_SPECIAL_CHARS);
			
			if($title !="" && $amount !="" && $deadline !="" && $description !="") {
				
				$query = "INSERT INTO `add_donation`(title, amount, deadline, remark, add_date) VALUES('$title','$amount','$deadline','$description', NOW())";
				
				if($result = mysqli_query($dbc, $query)) {
					
					echo '<p style="color:green">Donation Created successfully</p>';
				} else {
					
					echo 'Error: '.mysqli_error($dbc);
				} 
			} else {
				
				echo '<p style="color:brown;">All Fields Required</p>';
			}
		}
	?>
<form method="post">
	<h4 style="color:green;">DONATE NOW:</h4>
	
	<div class="form-group">
		<input type="text" name="title" placeholder="Title" class="form-control input-lg" />
	</div>
	<div class="form-group">
		<input type="number" name="amount" placeholder="Required Amount in Naira" class="form-control input-lg" />
	</div>
	<div class="col-sm-1">
		<h4 style="color:#fff;">Deadline:</h4>

	</div>
	<div class="col-sm-11">
		<div class="form-group">
		<input type="date" name="deadline" placeholder="Deadline" class="form-control input-lg" />
		</div>
	</div>
			<div class="form-group">
				<textarea name="description" class="form-control input-lg" cols="4" rows="5">Description</textarea>
	</div>
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-success btn-lg">CREATE DONATION</button>
	</div>
	
</form>
		</div>
</div>
<?php
	} else if($page =="manageDonation") {
		?>
<div class="panel panel-default">
	<div class="panel-heading">
		<a style="cursor:pointer;" onclick="location.href='?page=addDonation'">Add New Donation</a>
	</div>
	<div class="panel-body">
		<table class="table table-condensed table-responsive table-bordered table-striped">
            <thead>
				<tr>
				    <th>S/No</th>
				    <th>Title</th>
				    <th>Amount</th>
				    <th>Deadline</th>
				    <th>Description</th>
				    <th>Add Date</th>
				    <th>Delete</th>
				</tr>
            </thead>
            <tbody>
				  <?php
						
					if($result = mysqli_query($dbc, "SELECT * FROM `add_donation` ORDER BY add_date ASC")) {
                        
                        $i = 1;
		                  while($row = mysqli_fetch_array($result)) {
			     ?>
			         <tr>				
			     <?php
			         echo '<td>'.$i++.'</td>';
			         echo '<td>'.$row['title'].'</td>';
			         echo '<td>'.$row['amount'].'</td>';
			         echo '<td>'.$row['deadline'].'</td>';
			         echo '<td>'.$row['remark'].'</td>';
			         echo '<td>'.$row['add_date'].'</td>';
		          ?>
		 	<td><a href="javascript:DeleteNotice('<?php echo $row['id']; ?>')" style='color:red;text-align:center;'><span class='glyphicon glyphicon-trash'></span></a></td>
					</tr>
                <?php
                    }
                    }else {
                        
                        echo "<p style='color:red'>Error:</p> ".mysqli_error($dbc);
                    }
		?>
				</tbody>
			</table>
	</div>
</div>
		<?php
	} else if($page == "donate") {
		?>
<div class="row">
	<div class="col-sm-12">
<?php
		extract($_POST);
		if(isset($submit)) {
			
			$name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
			$matric = filter_var($matric, FILTER_SANITIZE_SPECIAL_CHARS);
			$dname = filter_var($dname, FILTER_SANITIZE_SPECIAL_CHARS);
			$amount = filter_var($amount, FILTER_SANITIZE_SPECIAL_CHARS);
			$card = filter_var($card, FILTER_SANITIZE_SPECIAL_CHARS);
			$number = filter_var($number, FILTER_SANITIZE_SPECIAL_CHARS);
			$cvv = filter_var($cvv, FILTER_SANITIZE_SPECIAL_CHARS);
			$pin = filter_var($pin, FILTER_SANITIZE_SPECIAL_CHARS);
			
			if($name !="" && $matric !="" && $dname !="" && $amount !="" && $card !="" && $number !="" && $cvv !="" && $pin !="") {
				
				$query = "INSERT INTO `login`(name, email, username, password, type) VALUES('$name','$email','$username','$password1','$type')";
				
				if($result = mysqli_query($dbc, $query)) {
					
					echo '<p style="color:green">Donation successful</p>';
				} else {
					
					echo 'Error: '.mysqli_error($dbc);
				} 
			} else {
				
				echo '<p style="color:brown;">All Fields Required</p>';
			}
		}
	?>
<form method="post">
	<h4 style="color:green;">DONATE NOW:</h4>
	<div class="col-sm-12">
	<div class="form-group">
		<input type="text" name="name" placeholder="Full Name" class="form-control input-lg" />
	</div>
	<div class="form-group">
		<input type="text" name="matric" placeholder="Matric. Number" class="form-control input-lg" />
	</div>
	<!--<div class="col-sm-6">
	<div class="form-group">
		<input type="text" name="faculty" placeholder="Faculty" class="form-control input-lg" />
	</div>
		</div>
		<div class="col-sm-6">
	<div class="form-group">
		<input type="text" name="dept" placeholder="Department" class="form-control input-lg" />
	</div>
		</div>-->
	<!--<div class="form-group">
		<select name="level" class="form-control input-lg">
			<option>-LEVEL-</option>
			<option>100</option>
			<option>200</option>
			<option>300</option>
			<option>400</option>
			<option>500</option>
		</select>
		</div>
	<div class="form-group">
		<input type="number" name="phone" placeholder="phone" class="form-control input-lg" />-->
	</div>
		<div class="col-sm-6">
	<div class="form-group">
		<select name="dname" class="form-control input-lg">
			<option>-select donation-</option>
		</select>
		</div>
		</div>
		<div class="col-sm-6">
		<div class="form-group">
		<input type="number" name="amount" placeholder="Amount" class="form-control input-lg" />
	</div>
		</div>
		<div class="form-group">
		<select name="card" class="form-control input-lg">
			<option>-Card Type-</option>
			<option>Master Card</option>
			<option>Visa</option>
			<option>Verve</option>
		</select>
		</div>
	<div class="form-group">
		<input type="number" name="number" placeholder="Card Number" class="form-control input-lg" />
	</div>
	<div class="col-sm-6">
	<div class="form-group">
		<input type="number" name="cvv" placeholder="Cvv" class="form-control input-lg" />
	</div>
	</div>
	<div class="col-sm-6">
	<div class="form-group">
		<input type="number" name="pin" placeholder="Pin" class="form-control input-lg" />
	</div>
	</div>
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-success btn-lg">Donate</button>
	</div>
	
</form>
		</div>
</div>
		<?php
	} else if($page == "members") {
		?>
<div class="panel panel-default">
	<div class="panel-heading">
		<a style="cursor:pointer;" onclick="location.href='?page=addAdmin'">REGISTERED MEMBERS</a>
	</div>
	<div class="panel-body">
		<table class="table table-condensed table-responsive table-bordered table-striped">
            <thead>
				<tr>
				    <th>S/No</th>
				    <th>Name</th>
				    <th>Matric no.</th>
				    <th>Faculty</th>
				    <th>Dept</th>
				    <th>Level</th>
				    <th>Phone</th>
				    <th>Email</th>
				    <th>Sex</th>
				    <th>Reg. Date</th>
				    <th>Delete</th>
				</tr>
            </thead>
            <tbody>
				  <?php
						
					if($result = mysqli_query($dbc, "SELECT * FROM `users` ORDER BY name ASC")) {
                        
                        $i = 1;
		                  while($row = mysqli_fetch_array($result)) {
			     ?>
			         <tr>				
			     <?php
			         echo '<td>'.$i++.'</td>';
			         echo '<td>'.$row['name'].'</td>';
			         echo '<td>'.$row['matric'].'</td>';
			         echo '<td>'.$row['Faculty'].'</td>';
			         echo '<td>'.$row['dept'].'</td>';
			         echo '<td>'.$row['level'].'</td>';
			         echo '<td>'.$row['phone'].'</td>';
			         echo '<td>'.$row['email'].'</td>';
			         echo '<td>'.$row['sex'].'</td>';
			         echo '<td>'.$row['reg_date'].'</td>';
		          ?>
		 	<td><a href="javascript:DeleteNotice('<?php echo $row['id2']; ?>')" style='color:red;text-align:center;'><span class='glyphicon glyphicon-trash'></span></a></td>
					</tr>
                <?php
                    }
                    }else {
                        
                        echo "<p style='color:red'>Error:</p> ".mysqli_error($dbc);
                    }
		?>
				</tbody>
			</table>
	</div>
</div>
				<?php
	} else if($page =="profile") {
		
		?>
<form method="post">
	<h3>Reset Password</h3>
	<hr style="border: 1px solid #000;" />
	<?php
		extract($_POST);
		if(isset($sbumit)) {
			
			if($oldpass !="" && $pass1 !="" && $pass2 !="") {
				if($pass1 == $pass2) {
					
					if($result = mysqli_query($dbc, "SELECT * FROM `login` WHERE password='$oldpass'")) {
						
						if($r = mysqli_query($dbc, "ALTER `login` SET password='$pass1'")) {
							
							echo "<p style='color:green'>New password set successful</p>";
						} else {
							
							echo "Error: ".mysqli_error($dbc);
						}
						
					} else {
						
						echo "<p style='color:brown'>Old password mismatch. enter correct password</p>";
					}
					
				} else {
					
					echo "<p style='color:brown'>password mismatch</p>";
				}
			} else {
				
				echo "<p style='color:brown'>All fields are required</p>";
			}
		}
		?>
	<div class="form-group">
		<label for="oldpass">OLD PASSWORD</label>
		<input type="password" name="oldpass" class="form-control input-lg" placeholder="old password" />
	</div>
	<div class="form-group">
		<label for="oldpass">NEW PASSWORD</label>
		<input type="password" name="pass1" class="form-control input-lg" placeholder="new password" />
	</div>
	<div class="form-group">
		<label for="oldpass">RETYPE NEW PASSWORD</label>
		<input type="password" name="pass2" class="form-control input-lg" placeholder="retype new password" />
	</div>
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
	</div>
</form>
<?php
	} else if($page == "report") {
		?>
<div class="panel-body">
	<h4 style="color:#fff;">Donation Progress</h4>
		<table class="table table-condensed table-responsive table-bordered table-striped">
            <thead>
				<tr>
				    <th style="color:#fff;">S/No</th>
				    <th style="color:#fff;">DONATION NAME</th>
				    <th style="color:#fff;">REQUIRED SUM (Naira)</th>
				    <th style="color:#fff;">TOTAL DONATED (Naira)</th>
			
				</tr>
            </thead>
            <tbody>
				  <?php
						
					if($result = mysqli_query($dbc, "SELECT * FROM `avail` ORDER BY dname ASC")) {
                        
                        $i = 1;
		                  while($row = mysqli_fetch_array($result)) {
			     ?>
			         <tr>				
			     <?php
			         echo '<td>'.$i++.'</td>';
			         echo '<td>'.$row['dname'].'</td>';
			         echo '<td>'.$row['required_sum'].'</td>';
			         echo '<td>'.$row['total_donated'].'</td>';
			     
		          ?>
		 	
					</tr>
                <?php
                    }
                    }else {
                        
                        echo "<p style='color:red'>Error:</p> ".mysqli_error($dbc);
                    }
		?>
				</tbody>
			</table>
	</div>
<?php
	} else {
		?>
<!--<div class="row">
<div class="col-sm-4">
	<button style="border-radius:50%;" type="button" class="btn btn-primary btn-lg"><br>REGISTERED USERS<br><hr style="border: 1px solid #fff;" />10</button>
</div>
<div class="col-sm-4">
	<button style="border-radius:50%;" type="button" class="btn  btn-success btn-lg"><br>ALL DONATION<br><hr style="border: 1px solid #fff;" />20</button>
</div>
<div class="col-sm-4">
	<button style="border-radius:50%;" type="button" class="btn btn-lg btn-info"><br>DONATION TYPE<br><hr style="border: 1px solid #fff;" />15</button>
</div>
</div>-->
		<?php
	}
?>