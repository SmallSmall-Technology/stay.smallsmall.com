//Javascript File
var baseUrl = "https://dev-stay.smallsmall.com/";

$('#loginForm').submit(function(e){

    e.preventDefault();

    $('.signup-btn').val('Wait...');

    var username = $.trim($('#username').val());

    var password = $('#password').val();
    
    var curr_page = $('#current-page').val();

    if(!username){

        alert("Empty username field");

        $('#username').css('border', '1px solid #F00');

        $('.signup-btn').val('Sign in');

        return false;

    }

    if(!isEmail(username)){

        alert("Wrong email format!");

        $('#username').css('border', '1px solid #F00');

        $('.signup-btn').val('Sign in');

        return false;

    }

    if(!password){

        alert("Empty password field");

        $('#username').css('border', '1px solid #0A0808');

        $('#password').css('border', '1px solid #F00');

        $('.signup-btn').val('Sign in');

        return false;

    }

    var data = {"username" : username, "password" : password};

    $.ajaxSetup ({ cache: false });

    $.ajax({

        url: baseUrl+"stayone/login_user/",

        type: "POST",

        async: true,

        data: data,

        success: function(data) {

			if(data == 1){
                //$('.signup-btn').val('Wait...');
                if(curr_page){
                    
                    window.location.replace(curr_page);
                    
                }else{
                    
                    location.reload(true);
                    
                }

			}else{

                alert("Username/Password incorrect");

				$('.signup-btn').val('Sign in');
                
                return false;

			}

        },
        error: function() {

            alert("Error: Contact admin");

            $('.signup-btn').val('Sign in');

            return false;

        }

    });

});

function isEmail(email) {

	"use strict";

   var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

   return regex.test(email);

}