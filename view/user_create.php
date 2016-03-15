
<form id="registerform" class="form-horizontal" action="/user/doCreate" method="post" enctype="multipart/form-data">
	<h2>Register</h2>

	<div class="component" data-html="true">
		<div class="form-group">
			<label class="col-md-2 control-label" for="usernameRegis">Username</label>
			<div class="col-md-4">
				<input id="usernameRegis" name="username" type="text" placeholder="Username" class="form-control input-md">
			</div>
		</div>
        <div class="form-group">
		  <label class="col-md-2 control-label" for="firstNameRegis">First name</label>
		  <div class="col-md-4">
		  	<input id="firstNameRegis" name="surname" type="text" placeholder="First name" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="lastNameRegis">Last name</label>
		  <div class="col-md-4">
		  	<input id="lastNameRegis" name="name" type="text" placeholder="Last name" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="emailRegis">Mail</label>
		  <div class="col-md-4">
		  	<input id="emailRegis" name="email" type="text" placeholder="Email" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="passwordRegis">Password</label>
		  <div class="col-md-4">
		  	<input id="passwordRegis" name="password" type="password" placeholder="Password" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="password2Regis">Repeat Password</label>
			<div class="col-md-4">
				<input id="password2Regis" name="password2" type="password" placeholder="Repeat Password" class="form-control input-md">
			</div>
		</div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="fileToUploadRegis">Select image to upload:</label>
            <div class="picture-preview">
                <!-- Picture preview -->
            </div>
            <div class="col-md-4">
                <input type="file" name="fileToUpload" id="fileToUploadRegis" class="">
            </div>
        </div>
		<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="submitRegis" name="send" type="submit" value="Submit" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>
