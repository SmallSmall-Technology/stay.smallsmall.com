//Javascript File
var baseUrl = 'https://dev-stay.smallsmall.com/';

$('.check-in').click(function(){
    
    $('body').addClass('no-scroll');
    
    $('.checkin-overlay').css('display', 'flex');
    
});
$('.close-button').click(function(){
    
    $('body').removeClass('no-scroll');
    
    $('.checkin-overlay').css('display', 'none');
    
});

$('#checkinForm').submit(function(e){
    
    e.preventDefault();
    
    $('#checkin-btn').html('Working...');
    
    var booking_id = $('.booking-id').val();
    
    var checkin_time = $('.checkin-time').val();
    
    if(booking_id === ''){
        
        $('.booking-id').css('border-bottom', '1px solid #FF5252');
        
        $('.conf-report').html('Fill in your booking ID');
            
        $('.conf-report').addClass('error');
        
        $('.conf-report').show(500);
        
        $('#checkin-btn').html('Check In');
        
        setTimeout(function(){
            $('.conf-report').removeClass('success');
            $('.conf-report').hide(300);
        }, 3000);
        
        return false;
        
    }else if(checkin_time === ''){
        
        $('.select').css('border-bottom', '1px solid #FF5252');
        
        $('.conf-report').html('Select your preferred check in time');
            
        $('.conf-report').addClass('error');
        
        $('.conf-report').show(500);
        
        $('#checkin-btn').html('Check In');
        
        setTimeout(function(){
            $('.conf-report').removeClass('success');
            $('.conf-report').hide(300);
        }, 3000);
        
        return false;
        
    }
    
    var data = {"bookingID" : booking_id, "checkin_time" : checkin_time};
    
    $.ajaxSetup ({ cache: false });

    $.ajax({

        url: baseUrl+"stayone/checkin/",

        type: "POST",
        
        data : data,

        success: function(data) {

			if(data == 1){

				$('.conf-report').html('Sucessfully checked in. One of our representatives will contact you shortly.');
            
                $('.conf-report').addClass('success');
                
                $('.conf-report').show(500);
                
                $('#checkin-btn').html('Check In');
                
                setTimeout(function(){
                    $('.conf-report').removeClass('success');
                    $('.conf-report').hide(300);
                }, 8000);
                
			}else{

				//alert("Booking Unsuccessful! : "+data);	

            	$('.conf-report').html(data);
            
                $('.conf-report').addClass('error');
                
                $('.conf-report').show(500);
                
                $('#checkin-btn').html('Check In');
                
                setTimeout(function(){
                    $('.conf-report').removeClass('success');
                    $('.conf-report').hide(300);
                }, 8000);

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

            $('.conf-report').html(msg);
            
            $('.conf-report').addClass('error');
            
            $('.conf-report').show(500);
            
            $('#checkin-btn').html('Check In');
            
            setTimeout(function(){
                $('.conf-report').removeClass('success');
                $('.conf-report').hide(300);
            }, 3000);
            
            return false;

        }

    });
    
    /*$('#checkin-btn').html('Working...');
    
    $('.conf-report').addClass('success');
    $('.conf-report').show(500);
    
    setTimeout(function(){
        $('.conf-report').removeClass('success');
        $('.conf-report').hide(300);
        $('#checkin-btn').html('Check In');
    }, 5000);*/
    
});