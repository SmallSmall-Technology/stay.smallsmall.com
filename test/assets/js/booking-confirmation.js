//Javascript Document

var baseUrl = "https://stayone.rentsmallsmall.com/";

if(localStorage.getItem('reservation') === null){

	window.location.href = baseUrl;
		

}else{

	//Get all cart products

	var reserve = JSON.parse(localStorage.getItem('reservation'));
	
	$('.start_date').html(reserve.startDate);

	$('.end_date').html(reserve.endDate);

	$('.num_of_nights').html(reserve.no_of_days);

	$('.guest_num').html(reserve.guests);

	$('.pickup-option').html(reserve.pickup_option);
	
	$('.pickup-loc').html(reserve.pickup_location);

	$('.tot-costing').html('<span style="font-family:helvetica;">&#x20A6;</span>'+numberWithCommas(reserve.cost));
	
	//window.localStorage.setItem('reservation', JSON.stringify(reserve));

}

$('input[type=radio][name=pickup]').change(function() {
    
    var pickup_option = $(this).val();
    
    if(pickup_option == 'yes'){
        
        $('.pickup-option').html(pickup_option);
        
        $('.pickup-loc').html('Mainland');
        
        $('.pickup-cost').html('1,500');
        
        $('#pickup-cost').val('1500');
        
        $('.pickup-location-spc').show();
        
    }else{
        
        $('.pickup-option').html(pickup_option);
        
        $('.pickup-cost').html('0');
        
        $('#pickup-cost').val('0');
        
        $('.pickup-location-spc').hide();
        
    }
});
$('input[type=radio][name=pickup-location]').change(function() {
    
    var pickup_location = $(this).val();
    
    $('.pickup-loc').html(pickup_location);
    
    if(pickup_location == 'Island'){
        
        $('.pickup-cost').html('3,000');
        
        $('#pickup-cost').val('3000');
        
    }else{
        
        $('.pickup-cost').html('1,500');
        
        $('#pickup-cost').val('1500');
        
    }
    
    //alert(pickup_location);
    
    return false;
});

$('#bookingForm').submit(function(e){
    
    e.preventDefault();
    
    $('.guest-form-submit').val("Booking...");
    
    var aptID = $('#aptID').val();
    
    var firstname = $('#fname').val();
    
    var lastname = $('#lname').val();
    
    var email = $('#email').val();
    
    var phone = $('#phone').val();
    
    var address = $('#address').val();
    
    var comment = $('#comment').val();
    
    var pickup_cost = 0;
    
    var pickup_location = '';
    
    var pickup_option = $('input[type=radio][name=pickup]').val();
    
    var payment_option = $('input[type=radio][name=payment-method]').val();
    
    if(pickup_option == 'yes'){
        
        pickup_location = $('input[type=radio][name=pickup-location]').val();
        
        pickup_cost = $('#pickup-cost').val();
        
    }
    
    var filteredList = $('.verify-field').filter(function(){

		return $(this).val() == "";

	});

	if(filteredList.length > 0){

		filteredList.css("border","1px solid rgba(251,1,1,0.5)");

		document.body.scrollTop = 0; // For Safari

		document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		
		$('.guest-form-submit').val("Book Now");

		return false;

	}
	
	var reserve = JSON.parse(localStorage.getItem('reservation'));
	
	var data = { "firstname" : firstname, "lastname" : lastname, "email" : email, "phone" : phone, "address" : address, "comment" : comment, "reserve" : reserve, "aptID" : aptID, "pickup_option" : pickup_option, "pickup_location" : pickup_location, "pickup_cost" : pickup_cost, "payment_option" : payment_option };
	
	$.ajaxSetup ({ cache: false });

    $.ajax({

        url: baseUrl+"stayone/insert_booking/",

        type: "POST",
        
        dataType : 'json',

        data: data,

        success: function(data) {

			if(data.result == 'success'){

				alert("Booking Successful!");

            	//$('.guest-form-submit').val("Book Now");
            	
            	$('.verify-field').val('');
            	 
            	$('#comment').val('');
            	    
                //window.localStorage.removeItem('reservation');
                
                window.location.href = baseUrl+'payment-page/'+data.booking;
			}else{

				alert("Booking Unsuccessful!");	

            	$('.guest-form-submit').val("Book Now");

			}

        },

        error: function() {

            //modalAjaxError('openLogIn');

			alert("Error!!!");

            $('.guest-form-submit').val("Book Now");
            
            return false;

        }

    });
    
});
function numberWithCommas(x) {
	"use strict";
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

}
