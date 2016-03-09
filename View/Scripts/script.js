/**
 * Klasse: Login
 */


var loginForm = {

    init: function(){

        $('#submitLogin').click(function(){
            alert('hi');
        });

        $("#passwordLogin").focus(function() {
            alert('in');
        }).blur(function() {
            alert('out');
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
    pattern: "hi",

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

        $('#').focus(function(){

        }).blur(function(){

        });
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




















