<?php $this->load->view('header'); ?>
	<div class="panel panel-default" style="width:400px;margin:auto">
		<div class="panel-heading"><h4>Welcome <?=$username;?></h4></div>
		<div class="panel-body">
			<div id="container">
				<div class="body">
					<div>
						<label>Fiest name</label>
						<span><?=$firstname;?></span>
					</div>
					<div>
						<label>Last name</label>
						<span><?=$lastname;?></span>
					</div>
					<div>
						<label>Email</label>
						<span><?=$email;?></span>
					</div>
					<br />
				</div>
			</div>
		</div>
		<div class="panel-footer" style="text-align:right">
			<a class="btn btn-danger" href="home/logout">Logout</a>
			<a class="btn btn-default" href="register">add new user</a>
		</div>
	</div>
		
<?php $this->load->view('fotter'); ?>
