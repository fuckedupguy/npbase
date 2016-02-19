<?php

$db_name = 'sys';
$user_name = 'username';
$password = 'password';
$db_host = 'localhost';
$table_prefix = 'np_';
$error_msg = '';

if (isset($_POST['submit'])) {
	
	$db_name = $_POST['db_name'];
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$db_host = $_POST['db_host'];
	$table_prefix = $_POST['table_prefix'];

	if (empty($db_host) || empty($user_name) || empty($password) || empty($db_name) || empty($table_prefix)) {

		$error_msg = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
						</button>
						All fields are required.
					  </div>';

	} else {

		$db_connection = @new mysqli($db_host, $user_name, $password, $db_name);

		if ($db_connection->connect_errno) {

			$error_msg = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  								<span aria-hidden="true">&times;</span>
							</button>
							<h2 class="text-danger margin-top-0">Error establishing a database connection</h2>
							<p>This either means that the username and password information in your <code>config.php</code> file is incorrect or we can’t contact the database server at <code>'.$db_host.'</code>. This could mean your host’s database server is down.</p>
							<ul>
								<li>Are you sure you have the correct username and password?</li>
								<li>Are you sure that you have typed the correct hostname?</li>
								<li>Are you sure that the database server is running?</li>
							</ul>
					  	  </div>';

		}

	}	

}

?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 margin-top-30px margin-bottom-30px">
			<img src="../assets/img/logo.jpg" class="img-responsive img-rounded center-block" alt="Logo">
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="well">
			<p>Below you should enter your database connection details. If you’re not sure about these, contact your host.</p>
			<hr>
			<?php echo $error_msg ?>
				<form class="form-horizontal" method="post">
					<div class="form-group<?php echo empty($db_name) ? ' has-error' : '' ?>">
						<label for="db_name" class="col-sm-2 control-label">Database Name:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="db_name" placeholder="Database Name" name="db_name" value="<?php echo $db_name ?>">
						</div>
						<div class="col-sm-6">
							<p>The name of the database you want to run this system in.</p>
						</div>
					</div>

					<div class="form-group<?php echo empty($user_name) ? ' has-error' : '' ?>">
						<label for="user_name" class="col-sm-2 control-label">User Name:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="user_name" placeholder="User Name" name="user_name" value="<?php echo $user_name ?>">
						</div>
						<div class="col-sm-6">
							<p>Your MySQL username.</p>
						</div>
					</div>

					<div class="form-group<?php echo empty($password) ? ' has-error' : '' ?>">
						<label for="password" class="col-sm-2 control-label">Password:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $password ?>">
						</div>
						<div class="col-sm-6">
							<p>Your MySQL password.</p>
						</div>
					</div>

					<div class="form-group<?php echo empty($db_host) ? ' has-error' : '' ?>">
						<label for="db_host" class="col-sm-2 control-label">Database Host:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="db_host" placeholder="Database Host" name="db_host" value="<?php echo $db_host ?>">
						</div>
						<div class="col-sm-6">
							<p>You should be able to get this info from your web host, if <code>localhost</code> doesn’t work.</p>
						</div>
					</div>

					<div class="form-group<?php echo empty($table_prefix) ? ' has-error' : '' ?>">
						<label for="table_prefix" class="col-sm-2 control-label">Table Prefix:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="table_prefix" placeholder="Table Prefix" name="table_prefix" value="<?php echo $table_prefix ?>">
						</div>
						<div class="col-sm-6">
							<p>If you want to run multiple installations of this system in a single database, change this.</p>
						</div>
					</div>

					<a href="setup.php?step=2" class="btn btn-default">Back</a>
					<input class="btn btn-primary" type="submit" name="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>