//Javascript Document

var baseUrl = "https://dev-stay.smallsmall.com/";

if(localStorage.getItem('reservation') === null){

	window.location.href = baseUrl;

}else{

	//Get all cart products
	
	var subtotal = 0;
	
	var reserve = JSON.parse(localStorage.getItem('reservation'));
	
	var vat = (reserve.cost * 0.075).toFixed(2);
	
	subtotal = (parseInt(reserve.actual_cost)).toFixed(2);
	
	reserve.actual_cost = (parseInt(reserve.actual_cost) + parseInt(vat)).toFixed(2);
	
	reserve.cost = (parseInt(reserve.cost) + parseInt(vat)).toFixed(2);
	
	$('#actual_cost').val(reserve.actual_cost);
	
	$('.subtotal').html('<span style="font-family:helvetica;">&#x20A6;</span>'+numberWithCommas(subtotal));
	
	$('.vat').html('<span style="font-family:helvetica;">&#x20A6;</span>'+numberWithCommas(vat));
	
	$('.secDep').html('<span style="font-family:helvetica;">&#x20A6;</span>'+numberWithCommas(reserve.security_deposit));
	
	$('.start_date').html(reserve.startDate);
	$('#startDate').val(reserve.startDate);

	$('.end_date').html(reserve.endDate);
	$('#endDate').val(reserve.endDate);

	$('.num_of_nights').html(reserve.no_of_days);
	$('#no_of_days').val(reserve.no_of_days);

	$('.guest_num').html(reserve.guests);
	$('#guests').val(reserve.guests);

	$('.pickup-option').html(reserve.pickup_option);
	$('#pickup_option').val(reserve.pickup_option);
	
	$('.pickup-loc').html(reserve.pickup_location);
	$('.pickup_location').val(reserve.pickup_location);

	$('.tot-costing').html('<span style="font-family:helvetica;">&#x20A6;</span>'+numberWithCommas(reserve.cost));
	$('.discounted-price').html('- <span style="font-family:helvetica;">&#x20A6;</span>'+numberWithCommas(reserve.discounted_price));
	
	$('#discount').val(reserve.discounted_price);
	
	$('#cost').val(reserve.cost);
	 
	window.localStorage.setItem('reservation', JSON.stringify(reserve));

}

$('input[type=radio][name=pickup_option]').change(function() {
    
    var pickup_option = $(this).val();
    
    var reserve = JSON.parse(localStorage.getItem('reservation'));
    
    if(pickup_option == 'yes'){
        
        $('.pickup-option').html(pickup_option);
        
        $('.pickup-loc').html('Mainland');
        
        $('.pickup-cost').html('1,500');
        
        $('#pickup-cost').val('1500');
        
        $('.pickup-location-spc').show();
        
        $('.tot-costing').html('<span style="font-family:helvetica;">&#x20A6;</span>'+numberWithCommas((parseInt(reserve.cost) + 1500).toFixed(2)));
        
        $('#pickup_cost').val(1500);
        
        $('#cost').val((parseInt(reserve.cost) + 1500).toFixed(2));
        
    }else{
        
        $('.pickup-option').html(pickup_option);
        
        $('.pickup-cost').html('0');
        
        $('#pickup-cost').val('0');
        
        $('.pickup-location-spc').hide();
        
        $('.tot-costing').html('<span style="font-family:helvetica;">&#x20A6;</span>'+numberWithCommas(reserve.cost));
        
        $('#pickup_cost').val(0);
        
        $('#cost').val(reserve.cost);
        
    }
});
$('input[type=radio][name=pickup_location]').change(function() {
    
    var pickup_location = $(this).val();
    
    $('.pickup-loc').html(pickup_location);
    
    var reserve = JSON.parse(localStorage.getItem('reservation'));
    
    if(pickup_location == 'Island'){
        
        $('.pickup-cost').html('3,000');
        
        $('#pickup-cost').val('3000');
        
        $('.tot-costing').html('<span style="font-family:helvetica;">&#x20A6;</span>'+numberWithCommas((parseInt(reserve.cost) + 3000).toFixed(2)));
        
        $('#cost').val(parseInt(reserve.cost) + 3000);
        
        $('#pickup_cost').val(3000);
        
    }else{
        
        $('.pickup-cost').html('1,500');
        
        $('#pickup-cost').val('1500');
        
        $('.tot-costing').html('<span style="font-family:helvetica;">&#x20A6;</span>'+numberWithCommas((parseInt(reserve.cost) + 1500).toFixed(2)));
        
        $('#cost').val(parseInt(reserve.cost) + 1500);
        
        $('#pickup_cost').val(1500);
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
    
    var nok_name = $('#nok-fullname').val();
    
    var nok_email = $('#nok-email').val();
    
    var nok_phone = $('#nok-phone').val();
    
    var nok_address = $('#nok-address').val();
    
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
	
	var file_data = $("#input-file").prop("files")[0]; // Getting the properties
	//file from file field
	
  	var form_data = new FormData(this); // Creating object of FormData class 
  	
  	form_data.append("file", file_data);
	
	//var filevalue = $("#file1").val();
	
	//var reserve = JSON.parse(localStorage.getItem('reservation'));
	
	//var data = { "firstname" : firstname, "lastname" : lastname, "email" : email, "phone" : phone, "address" : address, "comment" : comment, "reserve" : reserve, "aptID" : aptID, "pickup_option" : pickup_option, "pickup_location" : pickup_location, "pickup_cost" : pickup_cost, "payment_option" : payment_option, "nok_name" : nok_name, "nok_email" : nok_email, "nok_phone" : nok_phone, "nok_address" : nok_address };
	
	
	$.ajaxSetup ({ cache: false });

    $.ajax({

        url: baseUrl+"stayone/insert_booking/",

        type: "POST",
        
        data : form_data,
        
    	dataType: 'json',

	    secureuri : false,

		processData: false,

        contentType: false,

        success: function(data) {

			if(data.result == 'success'){

				alert("Booking Successful!");

            	//$('.guest-form-submit').val("Book Now");
            	
            	$('.verify-field').val('');
            	 
            	$('#comment').val('');
            	    
                //window.localStorage.removeItem('reservation');
                
                window.location.href = baseUrl+'payment-page/'+data.booking;
			}else{

				alert("Booking Unsuccessful! : "+data.details);	

            	$('.guest-form-submit').val("Book Now");

			}

        },

        error: function(jqXHR, exception) {

            //modalAjaxError('openLogIn');
            var msg = '';
            
            if (jqXHR.status === 0) {
                msg = 'Not connected.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }

			alert(msg);

            $('.guest-form-submit').val("Book Now");
            
            return false;

        }

    });
    
});
function numberWithCommas(x) {
	"use strict";
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

}
