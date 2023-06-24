//Javascript 
var baseUrl = "https://stay.smallsmall.com/";
$("#contact-form").submit(function(e){
    e.preventDefault();
    
    $('.form-submit').val("Sending...");
    
    var firstname = $('#fname').val();
    
    var lastname = $('#lname').val();
    
    var email = $('#email').val();
    
    var guests = $('#guest-no').val();
    
    var comment = $('#comment').val();
    
    var filteredList = $('.verify-txt').filter(function(){

		return $(this).val() == "";

	});

	if(filteredList.length > 0){

		$('.form-result').html('<div class="error-msg reports"><span>Fill empty fields</span></div>');

		filteredList.css("border","2px solid rgba(251,1,1,0.5)");
		
		$('.form-submit').val("Send");

		return false;

	}
	
	var data = {"firstname" : firstname, "lastname" : lastname, "email" : email, "guests" : guests, "comment" : comment};
	
	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"stayone/logContact/",

		type: "POST",

        async: true,

        data: data,

		success	: function (data){			

			if(data == 1){					

				$('.form-result').html('<div class="success-msg reports"><span>Message successfully sent!</span></div>');
				
				$('.verify-txt').val("");
				
				$('.form-submit').val("Send");

				return false;					

			}else{				    

			    $('.form-result').html('<div class="error-msg reports"><span>Error sending message!</span></div>');
				
				$('.form-submit').val("Send");
				
				return false;

			}			

		}

	});
});