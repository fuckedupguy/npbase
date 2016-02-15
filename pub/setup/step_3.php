<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 margin-top-30px margin-bottom-30px">
			<img src="../static/img/logo.jpg" class="img-responsive img-rounded center-block" alt="Logo">
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="well">
				<form class="form-horizontal">
					<div class="form-group">
						<label for="db_name" class="col-sm-2 control-label">Database Name:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="db_name" placeholder="Database Name" value="sys">
						</div>
						<div class="col-sm-6">
							<p>The name of the database you want to run this system in.</p>
						</div>
					</div>

					<div class="form-group">
						<label for="user_name" class="col-sm-2 control-label">User Name:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="user_name" placeholder="User Name" value="username">
						</div>
						<div class="col-sm-6">
							<p>Your MySQL username.</p>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="password" placeholder="Password" value="password">
						</div>
						<div class="col-sm-6">
							<p>Your MySQL password.</p>
						</div>
					</div>

					<div class="form-group">
						<label for="db_host" class="col-sm-2 control-label">Database Host:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="db_host" placeholder="Database Host" value="localhost">
						</div>
						<div class="col-sm-6">
							<p>You should be able to get this info from your web host, if <code>localhost</code> doesn’t work.</p>
						</div>
					</div>

					<div class="form-group">
						<label for="table_prefix" class="col-sm-2 control-label">Table Prefix:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="table_prefix" placeholder="Table Prefix" value="np_">
						</div>
						<div class="col-sm-6">
							<p>If you want to run multiple installations of this system in a single database, change this.</p>
						</div>
					</div>

					<a href="./setup.php?step=3" class="btn btn-default">Back</a>
					<input class="btn btn-primary" type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>