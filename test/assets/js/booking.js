// JavaScript Document
var baseUrl = "https://stayone.rentsmallsmall.com/";

$('.reserve-button').click(function(){
    
	"use strict";
	
	var date1 = parseDate($('#startDate').val().split("/").reverse().join("/"));
	
	var date2 = parseDate($('#endDate').val().split("/").reverse().join("/"));
	
	var guests = $('.guests').val();
	
	var aptID = $('.aptID').val();
	
	var price = $('.price').val();
	
	var pickup_option = 'no';
	
	var pickup_location = '';
	
	var loggedIn = $('.loggedIn').val();
	
	if(isNaN(date1) || isNaN(date2)){
	    
		alert("Wrong date format");
		
		return false;
		
	}
	
	var numOfDays = datediff(date1, date2);
	
	var total_cost = parseInt(numOfDays) * parseInt(price);
	
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
			
			"cost" : total_cost

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
