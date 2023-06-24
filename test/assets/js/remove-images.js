var baseUrl = "https://www.tamara-court.com/";
$(document). on('click', '.remove-img', function(){
	"use strict";
	var remove_img_name = $(this).attr("id").replace(/img-/, "");
	
	var the_values = remove_img_name.split('-');
	
	//folder            //image
	//the_values[0]+' - '+the_values[1];
	
	var folder = $('#foldername').val();
	
	$(this).html('removing...');
	
	var id = the_values[2];
					
	//$(this).parent().remove();
	
	if(confirm("Are you sure you want to DELETE image?")){
		
		var data = {
			
			"imgName" : the_values[1],
			
			"folder"  : the_values[0]+'/'+folder
		};
		
		$.ajaxSetup ({ cache: false });
		$.ajax({

			url : baseUrl+'admin/removeImg/',

			type: "POST",

			async: true,

			data: data,

			success	: function (data){

				if(data == 1){
										
					alert("Image successfully deleted!" );
					
					$('.removal-id-'+id).remove();
							
				}else{

					alert('Could not delete image');
					$(this).html('remove <i class"fa fa-trash"></i>');

				}				

			}  

		});
	}else{
		$(this).html('remove <i class"fa fa-trash"></i>');
	}
	
}); 