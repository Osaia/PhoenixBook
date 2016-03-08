<form class="form-horizontal" action="/user/doCreate" method="post">
	<div class="component" data-html="true">
        <div class="form-group">
		  <label class="col-md-2 control-label" for="firstName">First name</label>
		  <div class="col-md-4">
		  	<input id="firstName" name="firstName" type="text" placeholder="First name" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="lastName">Last name</label>
		  <div class="col-md-4">
		  	<input id="lastName" name="lastName" type="text" placeholder="Last name" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="email">Mail</label>
		  <div class="col-md-4">
		  	<input id="email" name="email" type="text" placeholder="Email" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="password">Password</label>
		  <div class="col-md-4">
		  	<input id="password" name="password" type="password" placeholder="Password" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="password2">Repeat Password</label>
			<div class="col-md-4">
				<input id="password2" name="password2" type="password" placeholder="Repeat Password" class="form-control input-md">
			</div>
		</div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="firstName">Select image to upload:</label>
            <div class="picture-preview">
                <!-- Picture preview -->
            </div>
            <div class="col-md-4">
                <input type="file" name="fileToUpload" id="fileToUpload" class="">
            </div>
        </div>
		<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="send" name="send" type="submit" value="Submit" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>
