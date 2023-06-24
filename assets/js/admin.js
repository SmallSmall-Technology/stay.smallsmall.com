//Javascript Document
var baseUrl = "https://stay.smallsmall.com/";

$('#adminLoginForm').submit(function(e){

	e.preventDefault();

	$('#login-but').html('Wait...');

	$('.error-msg').slideUp(500);

	var username = $('.adminUsername').val();

	var password = $('.adminPassword').val();

	//var url = $('.url').val();
	//var emptyValues = [];

	var filteredList = $('.login-txt-f').filter(function(){

		return $(this).val() == "";

	});

	if(filteredList.length > 0){

		$('.error-msg').slideDown(500);

		filteredList.css("border","2px solid rgba(251,1,1,0.5)");

		$('#login-but').html('Login');
		
		return false;

	}

	

	 var data = {

        'username' : username,

        'password' : password

    };

	

    $.ajaxSetup ({ cache: false });

    $.ajax({

        url: baseUrl+"admin/login_admin/",

        type: "POST",

        async: true,

        data: data,

        beforeSend: function() {

			

        },

        success: function(data) {

			if(data == 0){

				$('.msg-fb').html("User does not exist.");

            	$('.error-msg').slideDown(500);
				
				$('#login-but').html('Login');

				return false;

			}else{

				data = $.trim(data);

				window.location.href = baseUrl+""+data;	

			}

        },

        error: function() {

            //modalAjaxError('openLogIn');

			$('.msg-fb').html("Error!!!");
			
			$('#login-but').html('Login');

            $('.error-msg').slideDown(500);

        }

    });



});



$('#adminSignupForm').submit(function(e){
    e.preventDefault();

	$("#add-admin-but").html("Sending...");

    var fname = $('#fname').val();

    var lname = $('#lname').val();

    var email = $('#email').val();

    var access = $('#userAccess').val();

    var filteredList = $('.verify-txt').filter(function(){

		return $(this).val() == "";

	});

	if(filteredList.length > 0){

		$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

		filteredList.css("border","2px solid rgba(251,1,1,0.5)");
		
		$("#add-admin-but").html("Submit");

		return false;

	}

	

	var data = {

		'fname' : fname,

		'lname' : lname,

		'email' : email,

		'userAccess' : access

	};

	

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"admin/addAdmin/",

		type: "POST",

		async: true,

		data: data,

		dataType : 'json', 

		success	: function (data){			

			if(data.status == 'error'){					

				alert("Upload error: "+data.msg);
				
				$("#add-admin-but").html("Submit");

				return false;					

			}else if(data.status == 'success'){				    

			    alert("Admin Successfully Added!");
			    
			    $("#add-admin-but").html("Submit");

			    $(".verify-txt").val("");			    

			}			

		}

	});

});	

$('#newPropForm').submit(function(e){
    
    e.preventDefault();
    
    $("#newPropBut").html("Uploading ...");

	var propName = $('#aptTitle').val();

	var propType = $('#propType').val();

	var propAddress = $('#propAddress').val();

	var state = $('#states').val();

	var city = $('#city').val();

	var country = $('#country').val();

	var propDesc = $('.aptDesc').val();		

	var cost = $('#cost').val();			

	var security_deposit = $('#security-deposit').val();

	var imageFolder = $('#foldername').val();

	var featuredPic = $('#featuredPic').val();

	var amenities = [];		
	
	var guest = $('#guest-number').val();	
	
	var bed = $('#bed-number').val();

	var bath = $('#bath-number').val();

	var toilet = $('#toilet-number').val();
	
	
	$('.amenities:checked').each(function(i){
        amenities.push($(this).val());
    });
	
	
	var data = {"propTitle" : propName, "propType" : propType, "propAddress" : propAddress, "country" : country, "state" : state, "city" : city, "propDesc" : propDesc, "cost" : cost, "security-deposit" : security_deposit, "foldername" : imageFolder, "featuredPic" : featuredPic, "amenities" : amenities, "bed-number" : bed, "bath-number" : bath, "toilet-number" : toilet, "guest-number" : guest};

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url : baseUrl+'admin/uploadApt/',

		type: "POST",

		data: data,

		success	: function (data){

			if(data == 1){

				alert("Upload successful!");

				location.reload();

			}else{

				$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');

				$("#newPropBut").html("Upload Property");

				document.body.scrollTop = 0; // For Safari

				document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

				return false;

			}				

		},

		error: function(){

			$("#newPropBut").html("Upload Property");

			return false;

		}

	});
	//validate text fields		

});
$('#editPropForm').submit(function(e){
    
    e.preventDefault();
    
    $("#newPropBut").html("Saving ...");

	var aptID = $('#aptID').val();

	var propName = $('#aptTitle').val();

	var propType = $('#propType').val();

	var propAddress = $('#propAddress').val();

	var propDesc = $('.aptDesc').val();		

	var cost = $('#cost').val();			

	var security_deposit = $('#security-deposit').val();

	var imageFolder = $('#foldername').val();

	var featuredPic = $('#featuredPic').val();

	var amenities = [];		
	
	var guest = $('#guest-number').val();	
	
	var bed = $('#bed-number').val();

	var bath = $('#bath-number').val();

	var toilet = $('#toilet-number').val();
	
	
	$('.amenities:checked').each(function(i){
        amenities.push($(this).val());
    });
	
	
	var data = {"aptID" : aptID, "propTitle" : propName, "propType" : propType, "propAddress" : propAddress, "propDesc" : propDesc, "cost" : cost, "security-deposit" : security_deposit, "foldername" : imageFolder, "featuredPic" : featuredPic, "amenities" : amenities, "bed-number" : bed, "bath-number" : bath, "toilet-number" : toilet, "guest-number" : guest};

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url : baseUrl+'admin/editApt/',

		type: "POST",

		data: data,

		success	: function (data){

			if(data == 1){

				alert("Upload successful!");

				location.reload();

			}else{

				$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');

				$("#newPropBut").html("Save Changes");

				document.body.scrollTop = 0; // For Safari

				document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

				return false;

			}				

		},

		error: function(){

			$("#newPropBut").html("Save Changes");

			return false;

		}

	});
	//validate text fields		

});
$('.change-status').click(function(){
	    
    var actions = $(this).attr('id').split('-');
    
    var bookingID = actions[0];
    var action = actions[1];
    
    var data = {"bookingID" : bookingID, "action" : action};
    
    if(confirm("Are you sure you want to proceed?")){
    
        $.ajaxSetup ({ cache: false });
    
    	$.ajax({
    
    		url : baseUrl+'admin/changeBookingStatus/',
    
    		type: "POST",
    
    		data: data,
    
    		success	: function (data){
    
    			if(data == 1){
    
    				alert("Successful!");
    
    				location.reload();
    
    			}else{
    
    				alert("Unsuccessful!");
    				
    				return false;
    
    			}				
    
    		},
    
    		error: function(){
    
    			alert("Error!");
    
    			return false;
    
    		}
    	});
    }else{
        
        return false;
        
    }
    
});

$('.delete-booking').click(function(){
	    
    var bookingID = $(this).attr('id').replace(/book-/, '');
    
    $('#book-'+bookingID).html('Deleting...');
    
    var data = {"bookingID" : bookingID};
    
    if(confirm("Are you sure you want to delete booking?")){
    
        $.ajaxSetup ({ cache: false });
    
    	$.ajax({
    
    		url : baseUrl+'admin/deleteBooking/',
    
    		type: "POST",
    
    		data: data,
    
    		success	: function (data){
    
    			if(data == 1){
    
    				$('#booking-'+bookingID).remove();
    				
    				return false;
    
    			}else{
    
    				alert("Error Deleting");
    				
                    $('#book-'+bookingID).html('Delete');
                    
    				return false;
    
    			}				
    
    		},
    
    		error: function(){
    
    			alert("Error!");
    
    			return false;
    
    		}
    	});
    }else{
        
        $('#book-'+bookingID).html('Delete');
        return false;
        
    }
    
});