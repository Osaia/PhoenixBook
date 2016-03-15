/**
 * Klasse: Login
 */


var loginForm = {

    init: function(){

        $('#submitLogin').click(function(){

        });

        $("#passwordLogin").focus(function() {
            console.log('in');
        }).blur(function() {
            console.log('out');
        });
        $("#usernameLogin").focus(function() {
            console.log('in');
        }).blur(function() {
            console.log('out');
        });
    }

}


/**
 * Klasse: Registrierung
 */

var RegisForm = {
    //Properties OF: Register Form

    //Only emails allowed
    patEmail: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
    //A regexp for general username entry. Which doesn't allow special characters ' +
    //'other than underscore. ' +    'Username must be of length ranging(3-30). ' +
    //'starting letter should be a ' +
    //'number or a character.
    patUsername: /^[a-zA-Z0-9_äÄöÖüÜß][a-zA-Z0-9_]{3,29}$/,
    //Should be a Name with between 3 and 20 letters. Permited is the use of a-z lowercase and uppercase, as well as the following Chars for
    //german lenguage: Ä Ü Ö ß
    patName: /^[a-zA-Z0-9_äÄöÖüÜß]{3,20}$/,
    //Password expresion that requires one lower case letter,
    //one upper case letter, one digit, 6-13 length, and no spaces.
    patPwd: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/,


    //Init Function for this object. It initiates all needed Event listeners for the different part of the Form
    init: function(){
        $('#registerform').submit(function(event){
            //var form = $(this);
            if(RegisForm.finalValidation()){
                //event.preventDefault();
            }else{
                event.preventDefault();
            }
        });

        $('#firstNameRegis').focus(function(){

        }).blur(function(){
            if(RegisForm.patName.test(this.value) == true){
                this.className = 'form-control input-md';
                $(this).addClass('onSuccess');
            }else{
                this.className = 'form-control input-md';
                $(this).addClass('onError');
            }
        });

        $('#lastNameRegis').focus(function(){

        }).blur(function () {
            if(RegisForm.patName.test(this.value) == true){
                this.className = 'form-control input-md';
                $(this).addClass('onSuccess');
            }else{
                this.className = 'form-control input-md';
                $(this).addClass('onError');
            }
        });


        //When the field 'Username' is entered, and then left, an AJAX CALL makes shure that the selected username doesnt already exist in the database.
        //In case it exists, it will mark the field Red
        $('#usernameRegis').focus(function(){
            //alert('in');
        }).blur(function(){
            $.ajax({
                    method: 'POST',
                    data: {username: $('#usernameRegis').val(), type: "user"},
                    url: '/user/verify'
                })
                .done(function(worked){
                    console.log(worked);
                    if(RegisForm.patUsername.test(this.value) == true && worked == "notexists"){
                        //exist = false;
                        $('#usernameRegis')[0].className = 'form-control input-md';
                        $('#usernameRegis').addClass('onSuccess');
                        $('#unNotification').addClass('hidden');

                    }else{
                        //exist = true;
                        $('#usernameRegis')[0].className = 'form-control input-md';
                        $('#usernameRegis').addClass('onError');
                        $('#unNotification').removeClass('hidden');

                    }
                });

        });

        $('#emailRegis').focus(function () {

        }).blur(function(){
            $.ajax({
                    method: 'POST',
                    data: {email: $('#emailRegis').val(), type: "email"},
                    url: '/user/verify'
                })
                .done(function(worked){
                    console.log(worked);
                    if(RegisForm.patUsername.test(this.value) == true && worked == "notexists"){
                        //exist = false;
                        $('#emailRegis')[0].className = 'form-control input-md';
                        $('#emailRegis').addClass('onSuccess');
                        $('#emailNotification').addClass('hidden');
                    }else{
                        //exist = true;
                        $('#emailRegis')[0].className = 'form-control input-md';
                        $('#emailRegis').addClass('onError');
                        $('#emailNotification').removeClass('hidden');
                    }
                });
        });

        $('#passwordRegis').focus(function(){
            $('#password2Regis').val('');
            var t = 0;
        }).blur(function(){
            if(RegisForm.patPwd.test(this.value) == true){
                this.className = 'form-control input-md';
                $(this).addClass('onSuccess');
            }else{
                this.className = 'form-control input-md';
                $(this).addClass('onError');
            }
        });

        $('#password2Regis').focus(function () {

        }).blur(function(){
            var tm = 0;
            if($('#passwordRegis').val() == this.value){
                this.className = 'form-control input-md';
                $(this).addClass('onSuccess');
            }else{
                this.className = 'form-control input-md';
                $(this).addClass('onError');
            }
        });
        //FILE UPLOAD ??
    },

    finalValidation: function(){
        if(RegisForm.patUsername.test($('#usernameRegis').val())){
            if(RegisForm.patName.test($('#firstNameRegis').val())){
                if(RegisForm.patName.test($('#lastNameRegis').val())){
                    if(RegisForm.patEmail.test($('#emailRegis').val())){
                        if(RegisForm.patPwd.test($('#passwordRegis').val())){
                            if($('#passwordRegis').val() == $('#password2Regis').val()){
                                return true;
                            }else{
                                alert('Niggha.. Those passwords are not equal... CANT YOU SEE? ...Oh right.. You cant, my bad..*LMFAO* Try again...');
                                return false;
                            }
                        }else{
                            alert('No passwords like that admited... No way!');
                            return false;
                        }
                    }else{
                        alert('Oh hell no thats no mail adress D:');
                        return false;
                    }
                }else{
                    alert('That should be your last name?... Try again');
                    return false;
                }
            }else{
                alert('That should be your first name?... Try again');
                return false;
            }
        }else{
            alert('Not a valid Username');
            return false;
        }
    }
}

/* Klasse Entries
************************/

var Entries = {

    init: function () {
        this.entries();
        this.sidebar();
    },

    entries: function(){
        var minimized_elements = $('p.txt-hidden');

        minimized_elements.each(function(){
            var t = $(this).text();
            if(t.length < 300) return;

            $(this).html(
                t.slice(0,300)+'<span>... </span><a href="#" class="more"><span class="glyphicon glyphicon-menu-down"></span></a>'+
                '<span style="display:none;">'+ t.slice(300,t.length)+' <a href="#" class="less"><span class="glyphicon glyphicon-menu-up"></span></a></span>'
            );

        });

        $('a.more', minimized_elements).click(function(event){
            event.preventDefault();
            $(this).hide().prev().hide();
            $(this).next().show();
        });

        $('a.less', minimized_elements).click(function(event){
            event.preventDefault();
            $(this).parent().hide().prev().show().prev().show();
        });
    },


    sidebar: function(){
        $("#sidebar-big").hide();
        $("#sidebar-small").show();
        $("#open").click(function(){
            $("#sidebar-big").toggle(1000);
            $("#sidebar-small").toggle(1000);
        });
        $("#close").click(function(){
            $("#sidebar-big").toggle(1000);
            $("#sidebar-small").toggle(1000);
        });
    }
}


// Initiating the Script...
$(function (){
    if($('#submitLogin').length != 0) {
        loginForm.init();
    }

    if($('#submitRegis').length != 0){
        RegisForm.init()
    }

    if($('#sidebar-small').length != 0){
        Entries.init();
    }


});














