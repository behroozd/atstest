<?php $this->load->view('header'); ?>
<?=form_open('verify');?>
	<div class="panel panel-primary" style="width:400px;margin:auto">
		<div class="panel-heading"><h4>Login</h4></div>
		<div class="panel-body">
			<div class="body">
				<div>
					<label for="username">Username</label>:&nbsp;
					<input type="text" maxlength="20" id="username" name="username" value="" class="form-control" required/>
				</div>
				<div>
					<label for="password">Password</label>:&nbsp;
					<input type="password" maxlength="20" id="password" name="password" value="" class="form-control" required/>
				</div>
				<br />
			</div>
			<div class="validationErrors">
				<?=validation_errors();?>
			</div>
		</div>
		<div class="panel-footer" style="text-align:right">
			<button type="button" class="btn btn-primary" onclick="callLogin()">login</button>
			<a class="btn btn-default" href="register">register</a>
		</div>
	</div>
</form>
<script type="text/javascript">
function callLogin(){
	var username = $("#username").val().trim();
	var password = $("#password").val().trim();
	$.ajax({
		type     : 'POST',
		dataType : 'json',
		url      : '<?=base_url("Verify/login");?>',
		data:{ username: username, password: password },
		success:function( retVal ){
			if( retVal.result==1 ){
				window.location='<?=base_url("home");?>';
			}else{
				bootbox.alert( retVal.msg );
			}
		}
	});
}
</script>
<?php $this->load->view('fotter'); ?>
