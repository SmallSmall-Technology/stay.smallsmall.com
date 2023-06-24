        <div class="container-inner">
			<div class="image-slider-container">
				<!---- Slider content starts here--->
                <div class="slider web-disp">
                    <div class="slide_viewer">
                        <div class="slide_group">
                        <?php 
 
                            $dir = './uploads/apartments/'.$apartment['folder'].'/';

                            if (file_exists($dir) == false) {

                                echo 'Directory \'', $dir, '\' not found!'; 

                            } else {

                                $dir_contents = scandir($dir); 

                                $count = 0;
                                                                        
                                $content_size = count($dir_contents);

                                foreach ($dir_contents as $file) {

                                    //$file_type = strtolower(end(explode('.', $file)));

                                    if ( $file !== '.' && $file !== '..'&& $count <= $content_size){ 

                            ?>

                                    <div class="slide">
                                        <img src="<?php echo base_url().''.$dir.''.$file; ?>" width="100%" />
                                    </div>
                            <?php		

                                    }  
                                    $count++;

                                }

                            }

                            ?>
                        
                        </div>
                    </div>
                    

                    <div class="slide_buttons">
                    </div>

                    <div class="directional_nav">
                    <div class="previous_btn" title="Previous">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
                        <g>
                            <g>
                            <path fill="#474544" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
                                c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z"/>
                            <path fill="#474544" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z"/>
                            </g>
                        </g>
                        </svg>
                    </div>
                    <div class="next_btn" title="Next">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
                        <g>
                            <g>
                            <path fill="#474544" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z"/>
                            <path fill="#474544" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z"/>
                            </g>
                        </g>
                        </svg>
                    </div>
                </div><!-- End // .directional_nav -->                    
                <!---- Slider content ends here ---->
            </div>
            <!----Mobile slider starts here ----->
            <div class="property-images-display-container">
                <?php 

                    $dir = './uploads/apartments/'.$apartment['folder'].'/';

                    if (file_exists($dir) == false) {

                        echo 'Directory \'', $dir, '\' not found!'; 

                    } else {

                        $dir_contents = scandir($dir); 

                        $count = 0;
                                                                
                        $content_size = count($dir_contents);

                        foreach ($dir_contents as $file) {

                            //$file_type = strtolower(end(explode('.', $file)));

                            if ( $file !== '.' && $file !== '..'&& $count <= $content_size){ 

                    ?>

                            <div class="image-display-item">
                                <img src="<?php echo base_url().''.$dir.''.$file; ?>" width="100%" />
                            </div>
                            <div class="image-display-item">
                                <img src="<?php echo base_url().''.$dir.''.$file; ?>" width="100%" />
                            </div>
                            <div class="image-display-item">
                                <img src="<?php echo base_url().''.$dir.''.$file; ?>" width="100%" />
                            </div>
                            <div class="image-display-item">
                                <img src="<?php echo base_url().''.$dir.''.$file; ?>" width="100%" />
                            </div>
                    <?php		

                            }  
                            $count++;

                        }

                    }

                    ?>
                
            </div>
            <!---- Mobile slider ends here ------>
			
			<div class="prop-section-container">
				<div class="prop-details-mainbar">
					<div class="single-prop-name">
                        <?php echo $apartment['apartmentName']; ?>
                        <div class="single-prop-address"> <?php echo $apartment['address'].', '.$apartment['city'].' '.$apartment['state_name']; ?></div>
                    </div>
                    <div class="amenities">
                        <div class="amenity-box">
                            <div class="amenity-icn bed"></div>
                            <div class="amenity-num"> <?php echo $apartment['bedroom']; ?></div>
                        </div>
                        <div class="amenity-box">
                            <div class="amenity-icn bath"></div>
                            <div class="amenity-num"> <?php echo $apartment['bathroom']; ?></div>
                        </div>
                    </div>
                    <div class="single-prop-price">
                        <div class="single-price"><span style="font-family:calibri;font-weight:bold">&#x20A6;</span> <?php echo number_format($apartment['price']); ?></div>
                        <div class="single-period">/ Night</div>
                    </div>
                    <div class="prop-details">
                        <div class="single-prop-head">About this rental</div>
                        <div class="single-prop-txt">
                            <?php echo $apartment['description']; ?>
                        </div>                        
                    </div>
                    <div class="prop-details">
                        <div class="single-prop-head">Amenities</div>
                        <div class="single-prop-txt">
                            <ul class="single-prop-amenities">
                                <?php 
                                    $amenities = unserialize($apartment['amenities']); 
                                    
                                ?>
                                <?php if(in_array("wifi", $amenities)){ ?>
                                    <li class="single-amenity-item"><div class="icon wifi-signal"></div><div class="txt">WIFI</div></li>
                                <?php } ?>
                                <?php if(in_array("television", $amenities)){ ?>
                                    <li class="single-amenity-item"><div class="icon television"></div><div class="txt">TV</div></li>
                                <?php } ?>
                                <?php if(in_array("parking", $amenities)){ ?>
                                    <li class="single-amenity-item"><div class="icon car"></div><div class="txt">Parking</div></li>
                                <?php } ?>
                                <?php if(in_array("no-smoking", $amenities)){ ?>
                                    <li class="single-amenity-item"><div class="icon no-smoking"></div><div class="txt">No Smoking</div></li>
                                <?php } ?>
                                <?php if(in_array("furnishing", $amenities)){ ?>
                                    <li class="single-amenity-item"><div class="icon furnishing"></div><div class="txt">Furnished</div></li>
                                <?php } ?>
                                <?php if(in_array("kitchen", $amenities)){ ?>
                                    <li class="single-amenity-item"><div class="icon kitchen"></div><div class="txt">Kitchen</div></li>
                                <?php } ?>
                                <?php if(in_array("fridge", $amenities)){ ?>
                                    <li class="single-amenity-item"><div class="icon fridge"></div><div class="txt">Fridge</div></li>
                                <?php } ?>
                                <?php if(in_array("air-condition", $amenities)){ ?>
                                    <li class="single-amenity-item"><div class="icon air-condition"></div><div class="txt">Air conditioning</div></li>
                                <?php } ?>
                                <?php if(in_array("laundry", $amenities)){ ?>
                                    <li class="single-amenity-item"><div class="icon laundry"></div><div class="txt">Laundry unit</div></li>
                                <?php } ?>
                                <?php if(in_array("security", $amenities)){ ?>
                                    <li class="single-amenity-item"><div class="icon security"></div><div class="txt">Security</div></li>
                                <?php } ?>
                                <?php if(in_array("balcony", $amenities)){ ?>
                                    <li class="single-amenity-item"><div class="icon balcony"></div><div class="txt">Balcony</div></li>
                                <?php } ?>
                            </ul>
                        </div>                        
                    </div>
                    <div class="prop-details">
                        <div class="single-prop-head">Policies</div>
                        <div class="single-prop-txt">
                            <?php echo $apartment['policies']; ?>
                        </div>                        
                    </div>
                    <div class="prop-details">
                        <div class="single-prop-head">House rules</div>
                        <div class="single-prop-txt">
                            <?php echo $apartment['house_rules']; ?>
                        </div>                        
                    </div>
				</div>
				<div class="prop-details-sidebar">
                    <div class="side-prop-price">
                        <div class="side-price"><span style="font-family:calibri;font-weight:bold">&#x20A6;</span><?php echo number_format($apartment['price']); ?></div>
                        <div class="side-period">/ Night</div>
                    </div>
                    <div class="dateContainer">
                        <input id="startDate" class="b-date" width="276" placeholder="Check in" />
                        <input id="endDate" class="b-date" width="276" placeholder="Check Out" />
                    </div>
                    <label class="page-labels">Numbers of guests</label>
                    <div class="quantityContainer">
                        <input class="guests" disabled type="number" min="1" max="<?php echo $apartment['guests']; ?>" step="1" value="1">
                    </div>
                    <input type="hidden" class="price" value="<?php echo @$apartment['price']; ?>" />
                    <input type="hidden" class="aptID" value="<?php echo @$apartment['apartmentID']; ?>" />
                    <!---<input type="hidden" class="securityDeposit" value="<?php //echo @$apartment['securityDeposit']; ?>" />--->
                    <input type="hidden" class="loggedIn" value="<?php echo @$loggedIn; ?>" />
                    <div class="reserve-button">Book now</div>
				</div>
			</div>
			<script>
    
    
    /*if( /Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
     alert("mobile");
    }*/
    
    rangeSlider.addEventListener("input", showSliderValue, true);
    
    function showSliderValue() {
        
        var sum = 0;
        var actual_add = 0;
        
        if(rangeSlider.value == 1){
            aa_dp.innerHTML = asset_appr_1.value+"%";
            
            actual_add = (parseInt(asset_appr_1.value) / 100) * prop_price;
            asset_appr_val.innerHTML = numberWithCommas((parseInt(prop_price) + parseInt(actual_add)) * unit_amount.value);
            
            //update the current asset appreciation percentage value
            asset_appr_value.value = sum * unit_amount;
        }
        
        if(rangeSlider.value > 1 && rangeSlider.value <= 5){
            if(rangeSlider.value == 5){
                sum = 70;
            }else{
                sum = asset_appr_1.value * rangeSlider.value;
            }
            aa_dp.innerHTML = sum+"%";
            actual_add = (parseInt(sum) / 100) * prop_price;
            asset_appr_val.innerHTML = numberWithCommas((parseInt(prop_price) + parseInt(actual_add)) * unit_amount.value);
            
            //update the current asset appreciation percentage value
            asset_appr_value.value = sum;
            
        }else if(rangeSlider.value >= 6 && rangeSlider.value <= 9){
            
            sum = asset_appr_2.value * rangeSlider.value;
            aa_dp.innerHTML = sum+"%";
            actual_add = (parseInt(sum) / 100) * prop_price;
            asset_appr_val.innerHTML = numberWithCommas((parseInt(prop_price) + parseInt(actual_add)) * unit_amount.value);
            
            //update the current asset appreciation percentage value
            asset_appr_value.value = sum;
            
        }else if(rangeSlider.value >= 10 && rangeSlider.value <= 14){
            if(rangeSlider.value == 160){
                sum = 70;
            }else{
                sum = asset_appr_3.value * rangeSlider.value;
            }
            aa_dp.innerHTML = sum+"%";
            actual_add = (parseInt(sum) / 100) * prop_price;
            asset_appr_val.innerHTML = numberWithCommas((parseInt(prop_price) + parseInt(actual_add)) * unit_amount.value);
            
            //update the current asset appreciation percentage value
            asset_appr_value.value = sum;
            
        }else if(rangeSlider.value >= 15 && rangeSlider.value <= 19){
            if(rangeSlider.value == 5){
                sum = 270;
            }else{
                sum = asset_appr_4.value * rangeSlider.value;
            }
            aa_dp.innerHTML = sum+"%";
            actual_add = (parseInt(sum) / 100) * prop_price;
            asset_appr_val.innerHTML = numberWithCommas((parseInt(prop_price) + parseInt(actual_add)) * unit_amount.value);
            
            //update the current asset appreciation percentage value
            asset_appr_value.value = sum;
            
        }else if(rangeSlider.value >= 20){
            
            sum = 400;
            aa_dp.innerHTML = sum+"%";
            actual_add = (parseInt(sum) / 100) * prop_price;
            asset_appr_val.innerHTML = numberWithCommas((parseInt(prop_price) + parseInt(actual_add)) * unit_amount.value);
            
            //update the current asset appreciation percentage value
            asset_appr_value.value = sum;
            
        }
        
        var pluralize = "";
        
        if(rangeSlider.value > 1){
            pluralize = "s";
        }
        
        yr_dp.innerHTML = rangeSlider.value+" Year"+pluralize;
        
        asset_appr_yr.innerHTML = rangeSlider.value+" Year"+pluralize;
        
        exp_rent_yr.innerHTML = rangeSlider.value+" Year"+pluralize;
        
        if(rangeSlider.value >= 2){
            var val = (5 * rangeSlider.value) - 5;
            
            var per = (val / 100) * exp_rent;
            
            val = parseInt(exp_rent) + parseInt(per);
            
            //alert(unit_amount);
            
            exp_rent_val.innerHTML = numberWithCommas(val);
            
        }else{
            exp_rent_val.innerHTML = numberWithCommas(exp_rent);
        }
        
        var bulletPosition = (rangeSlider.value /rangeSlider.max);
        
        if( /Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            rangeBullet.style.left = (bulletPosition * 248) + "px";
        }else{
            rangeBullet.style.left = (bulletPosition * 348) + "px"; 
        }
        
        function numberWithCommas(x) {

    		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    
    	}
    }
</script>
<!---<script>
	    
		    
    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    

    $('#startDate').datetimepicker({
        format: 'DD/MM/YYYY',
        minDate: today
    });
    $('#endDate').datetimepicker({
        format: 'DD/MM/YYYY',
        useCurrent: false //Important! See issue #1075
        
    });
    $("#startDate").on("dp.change", function (e) {
        $('#endDate').data("DateTimePicker").minDate(e.date);
    });
    $("#endDate").on("dp.change", function (e) {
        $('#startDate').data("DateTimePicker").maxDate(e.date);
    });
		   
    </script>--->
    <script>
	    
	    var apartmentID = <?php echo @$apartment['apartmentID'] ?>;
	    
	    if(apartmentID){ 
	    
    	    var the_dates = [];
    	    
    	    var data = { "aptID" : apartmentID };
    	    
    	    $.ajaxSetup ({ cache: false });
        	$.ajax({
        
        		url : '<?php echo base_url(); ?>stayone/get_dates/',
        
        		type: "POST",
        		
        		data: data,
    
    			dataType : 'json',
        
        		success	: function (data){
        
        			the_dates = data[0];
        			
                    dtp_func(the_dates);
                    
        		},
        	});
    		
	    }
            
		function dtp_func(all_dates) {
		    
		    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
		    
		    var disableDates = all_dates;
		    //var disableDates = ["04/11/2021", "04/12/2021"];
		    //console.log(disableDates);
		
		   $('#startDate').datetimepicker({
			    format: 'DD/MM/YYYY',
			    minDate: today,
			    disabledDates: disableDates
		   });
		   $('#endDate').datetimepicker({
			    format: 'DD/MM/YYYY',
			    useCurrent: false, //Important! See issue #1075
			    disabledDates: disableDates
			   
	       });
		   $("#startDate").on("dp.change", function (e) {
			    $('#endDate').data("DateTimePicker").minDate(e.date);
		   });
		   $("#endDate").on("dp.change", function (e) {
			    $('#startDate').data("DateTimePicker").maxDate(e.date);
		   });
		   
		   
	    }
    </script>
<script src="<?php echo base_url(); ?>assets/js/increment-field.js"></script>
<script src="<?php echo base_url(); ?>assets/js/slider.js"></script>
<script src="<?php echo base_url(); ?>assets/js/booking.js?version=<?php echo rand(99, 99999999) ?>"></script>