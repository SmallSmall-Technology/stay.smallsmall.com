// JavaScript Document
var baseUrl = "https://dev-stay.smallsmall.com/";

$('.reserve-button').click(function(){
    
	"use strict";
	
	var date1 = parseDate($('#startDate').val().split("/").reverse().join("/"));
	
	var date2 = parseDate($('#endDate').val().split("/").reverse().join("/"));
	
	var guests = $('.guests').val();
	
	var aptID = $('.aptID').val();
	
	var price = $('.price').val();
	
	var pickup_option = 'no';
	
	var discounted_price = 0;
	
	var actual_price = 0;
	
	var vat = 0;
	
	var securityDeposit = 0;
	
	var pickup_location = '';
	
	var total_cost = 0;
	
	var loggedIn = $('.loggedIn').val();
	
	if(isNaN(date1) || isNaN(date2)){
	    
		alert("Wrong date format");
		
		return false;
		
	}
	
	var numOfDays = datediff(date1, date2);
	
	total_cost = parseInt(guests) * (parseInt(numOfDays) * parseInt(price));
	
	actual_price = total_cost;
	
	//Discount price if booking days are between 5 to 15 or 15 to 30 days
	if(numOfDays >= 5 && numOfDays <= 15){
	    
	    discounted_price = total_cost * 0.2;
	    
	    total_cost = total_cost - discounted_price;
	    
	}else if(numOfDays >= 15 && numOfDays <= 30){
	    
	    discounted_price = total_cost * 0.25;
	    
	    total_cost = total_cost - discounted_price;
	    
	}
	
	if(numOfDays >= 1 && numOfDays <= 15){
	    
	    securityDeposit = 7500;
	    
	}else if(numOfDays >= 15){
	    
	    securityDeposit = 15000;
	    
	}
	
	
	//Add security deposit to discounted price
	total_cost = parseInt(total_cost) + parseInt(securityDeposit);
	
	//alert(numOfDays+' - '+$('#startDate').val()+' - '+$('#endDate').val());
	
	//Store data in localstorage
	
	if(localStorage.getItem('reservation') === null){
        
		//Create a unique localstorage ID for reservation
		var newProfile = {

			"startDate": $('#startDate').val().split('/').reverse().join('-'),

			"endDate": $('#endDate').val().split('/').reverse().join('-'),

			"no_of_days" : numOfDays,

			"guests" : guests,
			
			"pickup_option" : pickup_option,
			
			"pickup_location" : pickup_location,
			
			"actual_cost" : actual_price,
			
			"cost" : total_cost,
			
			"discounted_price" : discounted_price,
			
			"security_deposit" : securityDeposit

		};

		window.localStorage.setItem('reservation', JSON.stringify(newProfile));
        

	}else{

		//Get all cart products
		var reserve = JSON.parse(localStorage.getItem('reservation'));


		reserve.startDate = $('#startDate').val().split('/').reverse().join('-');

		reserve.endDate = $('#endDate').val().split('/').reverse().join('-');

		reserve.no_of_days = numOfDays;

		reserve.guests = guests;
		
		reserve.cost = total_cost;
		
		reserve.actual_cost = actual_price;
		
		reserve.discounted_price = discounted_price;
		
		reserve.security_deposit = securityDeposit;
		
		window.localStorage.setItem('reservation', JSON.stringify(reserve));

	}
	
	
	if(loggedIn){
	    
	    window.location.href = baseUrl+"booking-confirmation/"+aptID;
	    
	}else{
	    
	    alert('You need to be logged in to proceed!');
	    
	    window.location.replace(baseUrl+'login');
	    
	}
	
});

function parseDate(str) {
	"use strict";
    //var mdy = str.split('/');
    return new Date(str);
}

function datediff(first, second) {
	"use strict";
    // Take the difference between the dates and divide by milliseconds per day.
    // Round to nearest whole number to deal with DST.
    return Math.round((second - first)/(1000*60*60*24));
}
