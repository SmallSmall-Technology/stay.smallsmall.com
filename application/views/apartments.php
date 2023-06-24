        <div class="container-inner">
			<div class="search-bar">
                <div class="hero-form">
                    <form action="<?php echo base_url('stayone/apartments'); ?>" method="POST" id="hero-search-form">
                        <div class="hero-form-boxes">
                            <div class="visual-val location-handler">									
                                <div class="search-box-icon location-icn"></div>
                                <span class="home-form-label location-label">Location</span>
                                <div class="form-disp" id="location-display"></div>	
                            </div>
                            <span class="the-locations overlay-holders">
                                <ul class="location-list-opt">
                                    <?php if(isset($cities) && !empty($cities)){ ?>
								        <?php foreach($cities as $city => $each_city){ ?>
										<li id="<?php echo $each_city['city']; ?>" class="location-item location-item-opt"><span class="location-icn-opt"></span> <span class="location-txt"><?php echo $each_city['city']; ?></span></li>
										
									    <?php } ?>
									<?php } ?>
                                </ul>
                            </span>
                            <input type="hidden" name="location" class="location-val" value="any" />
                        </div>
                        <div class="hero-form-boxes">
                            <div class="visual-val date-handler">		
                                <div class="search-box-icon check-in-icn"></div>	
                                <span class="home-form-label checkin-label">Check in/ Check out</span>
                                <input name="dates" type="text" class="checkindate" />
                            </div>
                            <!--<input type="hidden" name="" class="checkin-val" />--->
                        </div>
                        <div class="hero-form-boxes">
                            <div class="visual-val guest-handler">		
                                <div class="search-box-icon user-icn"></div>
                                <span class="home-form-label guest-label">No of Guest</span><div class="form-disp" id="guest-display"></div>		
                            </div>																
                            <span class="the-guests overlay-holders">
                            <div class="share-quantity">
                                <input id="unit-amount" class="unit-amount" min="1" max="10" value="1" type="number">
                            </div>
                            </span>
                            <input type="hidden" name="guests" class="guest-val" />
                        </div>
                        <div class="hero-form-boxes">
                            <input type="submit" value="search" class="hero-search-button" />
                        </div>
                    </form>
                </div>
			</div>
			<div class="section-container">
				<div class="prop-mainbar">
					<ul class="prop-container"><?php //echo $total_count; ?>
                    <?php if(isset($apartments) && !empty($apartments)){ ?>
                        <?php foreach($apartments as $apartment => $value){  ?>
                            <li class="prop-item">
                                <div class="prop-item-container">
                                    <a style="text-decoration:none;color:#333" href="<?php echo base_url()."apartment/".$value['apartmentID']; ?>">
                                        <div class="prop-img">
                                            <img src="<?php echo base_url(); ?>uploads/apartments/<?php echo $value['folder']."/".$value['featuredImg']; ?>" alt="apartment" />
                                        </div>	
                                        <div class="prop-mini-container">
                                            <div class="prop-title-details">
                                                <div class="prop-title-add">
                                                    <div class="prop-title"><?php echo $value['type']; ?></div>
                                                    <div class="prop-addy"><?php echo $value['the_location'].', '.$value['city']; ?>.</div>
                                                </div>
                                                <div class="prop-rating"> <img src="<?php echo base_url('assets/img/star.png'); ?>" alt="star" /> 5.0 (70)</div>
                                            </div>
                                            <div class="amenities">
                                                <div class="amenity-box">
                                                    <div class="amenity-icn bed"></div>
                                                    <div class="amenity-num"><?php echo $value['bedroom']; ?></div>
                                                </div>
                                                <div class="amenity-box">
                                                    <div class="amenity-icn bath"></div>
                                                    <div class="amenity-num"><?php echo $value['bathroom']; ?></div>
                                                </div>
                                            </div>
                                            <div class="price-schedule">
                                                <div class="price-min">
                                                    <span style="font-weight:normal;font-family:calibri;">&#x20A6;</span><?php echo number_format($value['price']); ?>
                                                    <div class="price-desc">per night</div>
                                            </div>
                                        </div>
                                        
                                    </a>
                                    
                                </div>
                                <div class="mobile-book-button"><a href="<?php echo base_url()."apartment/".$value['apartmentID']; ?>">Book now</a></div>
                            </li>
					    <?php } ?>
                    <?php }else{ ?>
                            <li class="no-prop-item">
                                <div class="no-result">
                                    Sadly, we do not have apartments matching this criteria. <a href="<?php echo base_url(); ?>">Back to Home</a>
                                </div>    
                            </li>
                    <?php } ?>
					</ul>
					<div class="pagination">
                        <?php echo $this->pagination->create_links(); ?>						
					</div>
				</div>
				<div class="prop-sidebar">
				 <img width="100%" height="auto" src="<?php echo base_url(); ?>assets/video/stayss-animation.gif" />
				</div>
			</div>
            <!---Apartment prop ad starts here --->
			<script src="<?php echo base_url('assets/js/homepage-form.js'); ?>"></script>
			<!---Number element controller ---->
			<script>
				$(function(){
					$('input[name="dates"]').daterangepicker();
					$('input[name="dates"]').val('');
				});
	
				jQuery('<div class="quantity-nav-home"><div class="quantity-button-home upp">+</div><div class="quantity-button-home ddown">-</div></div>').insertAfter('.share-quantity input');
				jQuery('.share-quantity').each(function() {
				var spinner = jQuery(this),
					input = spinner.find('input[type="number"]'),
					btnUp = spinner.find('.upp'),
					btnDown = spinner.find('.ddown'),
					min = input.attr('min'),
					max = input.attr('max');
					var pluralize = "";

				btnUp.click(function() {

					var oldValue = parseFloat(input.val());

					if (oldValue >= max) {
					var newVal = oldValue;
					} else {
					var newVal = oldValue + 1;
					}

					if(newVal > 1){
						pluralize = "Guests";
					}else{
						pluralize = "Guest";
					}
					$('.guest-val').val(newVal);

					$('.guest-label').addClass('filled');

					$('#guest-display').html(newVal+" "+pluralize);

					//$('#add-guests').html(newVal);
					spinner.find("input").val(newVal);
					spinner.find("input").trigger("change");
				});

				btnDown.click(function() {
					
					var oldValue = parseFloat(input.val());
					if (oldValue <= min) {
					var newVal = oldValue;
					} else {
					var newVal = oldValue - 1;
					}
					if(newVal > 1){
						pluralize = "Guests";
					}else{
						pluralize = "Guest";
					}
					$('.guest-val').val(newVal);

					$('.guest-label').addClass('filled');

					$('#guest-display').html(newVal+" "+pluralize);

					//$('.the-locations').hide();
					//$('#add-guests').html(newVal);
					spinner.find("input").val(newVal);
					spinner.find("input").trigger("change");
				});

				});
			</script>