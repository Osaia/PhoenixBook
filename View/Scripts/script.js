/**
 * Klasse: Login
 */


var loginForm = {

    init: function(){

        $('#submitLogin').click(function(){
            alert('hi');
        });

        $("#passwordLogin").focus(function() {
            console.log('in');
        }).blur(function() {
            console.log('out');
        });
        $("#usernameLogin").focus(function() {
            alert('in');
        }).blur(function() {
            alert('out');
        });
    }

}


/**
 * Klasse: Registrierung
 */

var RegisForm = {
    //Properties
    patEmail: '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;',

    init: function(){
        $('#submitRegis').click(function(){
            alert('Regis Submit');
        });

        $('#firstNameRegis').focus(function(){
            alert('in');
        }).blur(function(){
            alert('out');
        });

        $('#lastNameRegis').focus(function(){
            alert('in');
        }).blur(function () {
            alert('out');
        });

        $('#usernameLogin').focus(function(){
            alert('in');
        }).blur(function(){
            alert('out');
        });

        $('#emailRegis').focus(function () {
            alert('in');
        }).blur(function(){
            alert('out');
        });

        $('#passwordRegis').focus(function(){
            alert('in');
        }).blur(function(){
            alert('out');
        });

        $('#password2Regis').focus(function () {
            alert('in');
        }).blur(function(){
            alert('out');
        });

        //FILE UPLOAD ??
    }
}



$(function (){
    if($('#submitLogin').length != 0) {
        loginForm.init();
    }

    if($('#submitRegis').length != 0){
        RegisForm.init()
    }


});




















