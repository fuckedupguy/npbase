<?php

$db_name = 'sys';
$user_name = 'username';
$password = 'password';
$db_host = 'localhost';
$table_prefix = 'np_';
$error_msg = '';

if (isset($_POST['submit'])) {
	
	$db_name = trim($_POST['db_name']);
	$user_name = trim($_POST['user_name']);
	$password = trim($_POST['password']);
	$db_host = trim($_POST['db_host']);
	$table_prefix = trim($_POST['table_prefix']);

	if (empty($db_host) || empty($user_name) || empty($db_name) || empty($table_prefix)) {

		$error_msg = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
						</button>
						Please fill out all required fields.
					  </div>';

	} else {

		$db_connection = @new mysqli($db_host, $user_name, $password, $db_name);

		if ($db_connection->connect_errno) {

			$error_msg = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  							 <span aria-hidden="true">&times;</span>
							</button>
							 <h2 class="text-danger margin-top-0">Error establishing a database connection</h2>
							 This either means that the username and password information in your <code>config.php</code> file is incorrect or we can’t contact the database server at <code>'.$db_host.'</code>. This could mean your host’s database server is down.
							<ul>
							 <li>Are you sure you have the correct username and password?</li>
							 <li>Are you sure that you have typed the correct hostname?</li>
							 <li>Are you sure that the database server is running?</li>
							</ul>
					  	  </div>';

		} else {

			if (file_exists('../../sys/config.php')) {

				$error_msg = '<div class="alert alert-info alert-dismissible fade in" role="alert">
					  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  								 <span aria-hidden="true">&times;</span>
								</button>
								The file <code>config.php</code> already exists. If you need to reset any of the configuration items in this file, please delete it first.
					  		  </div>';

			} else {

				$config_data = array(
								 'db_name' => "/* The name of the database */\r\ndefine('DB_NAME', '".$db_name."');\r\n\r\n", 
								 'db_user' => "/* MySQL database username */\r\ndefine('DB_USER', '".$user_name."');\r\n\r\n", 
								 'db_password' => "/* MySQL database password */\r\ndefine('DB_PASSWORD', '".$password."');\r\n\r\n", 
								 'db_host' => "/* MySQL hostname */\r\ndefine('DB_HOST', '".$db_host."');\r\n\r\n", 
								 'db_table_prefix' => "/* Database table prefix */\r\ndefine('DB_TABLE_PREFIX', '".$table_prefix."');\r\n\r\n",
								 'db_charset' => "/* Database Charset to use in creating database tables. */\r\ndefine('DB_CHARSET', 'utf8mb4');"
								 );

				$config_file = @fopen('../../sys/config.php', 'w');

				if (!$config_file) {

					$error_msg = '<div class="alert alert-info alert-dismissible fade in" role="alert">
					  			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  									 <span aria-hidden="true">&times;</span>
								  	</button>
								  	 For some reason this automatic <code>config.php</code> file creation doesn\'t work, don\'t worry. 
								  	 All this does is fill in the database information to a configuration file. You may also simply...
								  	<ol>
								  	 <li>Open <code>config_dummy.php</code> file in <code>setup</code> directory using any text editor.</li>
								  	 <li>Fill in your database informations and save the <code>config_dummy.php</code> file.</li>
								  	 <li>Rename <code>config_dummy.php</code> into <code>config.php</code> file.</li>
								  	</ol>
					  		  	  </div>';

				} else {

					fwrite($config_file, "<?php\r\n\r\n/* Configuration file */\r\n\r\n");
					foreach ($config_data as $line) {

						fwrite($config_file, $line);

					}

					header('Location: setup.php?step=4');
					exit;

				}

			}
		
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

					<div class="form-group">
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

					<a href="setup.php?step=2" class="btn btn-default btn-right-margin">Back</a><input class="btn btn-primary" type="submit" name="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>