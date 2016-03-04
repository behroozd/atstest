<?php $this->load->view('header'); ?>

<?=form_open('verify');?>
	<div class="panel panel-success" style="width:500px;margin:auto">
		<div class="panel-heading"><h4>Register</h4></div>
		<div class="panel-body">
			<div class="body">
				<div>
					<label for="username">Username</label>:&nbsp;
					<input class="form-control" required type="text" maxlength="20" id="username" name="username" value="<?=$username;?>"  />
				</div>
				<div>
					<label for="firstname">Firstname</label>:&nbsp;
					<input class="form-control" required type="text" maxlength="40" id="firstname" name="firstname" value="<?=$firstname;?>"  />
				</div>
				<div>
					<label for="lastname">Lastname</label>:&nbsp;
					<input class="form-control" required type="text" maxlength="100" id="lastname" name="lastname" value="<?=$lastname;?>"  />
				</div>
				<div>
					<label for="email">Email</label>:&nbsp;
					<input class="form-control" required type="email" maxlength="100" id="email" name="email" value="<?=$email;?>"  />
				</div>
				<div>
					<label for="password">Password</label>:&nbsp;
					<input value="" class="form-control" required type="password" maxlength="20" id="password" name="password" />
				</div>
				<div>
					<label for="vpassword"><small>Verify password</small></label>:&nbsp;
					<input value="" class="form-control" required type="password" maxlength"20" id="vpassword" name="vpassword" />
				</div>
				<div class="validationErrors">
					<?=validation_errors();?>
				</div>
			</div>
		</div>
		<div class="panel-footer" align="right">
			<button type="button" class="btn btn-success" onclick="callRegister()">register</button>
			<a class="btn btn-default" href="home">Home</a>
		</div>
	</div>
</form>
<script type="text/javascript">
function callRegister(){
	var username  = $("#username" ).val().trim();
	var firstname = $("#firstname").val().trim();
	var lastname  = $("#lastname" ).val().trim();
	var email     = $("#email"    ).val().trim();
	var password  = $("#password" ).val().trim();
	var vpassword = $("#vpassword").val().trim();
console.log(password);
console.log(vpassword);
	$.ajax({
		type     : 'POST',
		dataType : 'json',
		url      : '<?=base_url("Verify/register");?>',
		data:{ username: username, firstname: firstname, lastname: lastname, email: email, password: password, vpassword: vpassword },
		success:function( retVal ){
			if( retVal.result==1 ){
				window.location='<?=base_url("login");?>';
			}else{
				bootbox.alert( retVal.msg );
			}
		}
	});
}
</script>
<?php $this->load->view('fotter'); ?>
