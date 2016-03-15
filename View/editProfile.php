<?php
if(isset($_SESSION['userid'])) {
    ?>
<form id="updateForm" class="form-horizontal" action="/user/doUpdate" method="post" enctype="multipart/form-data">
    <div class="component" data-html="true">
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
            <label class="col-md-2 control-label" for="firstNameRegis">First name</label>
            <div class="col-md-4">
                <input id="firstNameRegis" name="surname" type="text" placeholder="First name" class="form-control input-md" value="<?= $surname ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="lastNameRegis">Last name</label>
            <div class="col-md-4">
                <input id="lastNameRegis" name="name" type="text" placeholder="Last name" class="form-control input-md" value="<?= $name ?>">
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
            <label class="col-md-2 control-label" for="send">&nbsp;</label>
            <div class="col-md-4">
                <input id="submitUpdate" name="send" type="submit" value="Submit" class="btn btn-warning">
            </div>
        </div>
    </div>
</form>
<?php
}else{
    header('Location: /');
}


?>