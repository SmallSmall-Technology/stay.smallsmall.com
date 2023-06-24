        <div class="container-inner">
			<!--- Slider starts here --->
			<div class="slider">
				<div class="slider-form-container">
					<div class="hero-big">Enjoy a complete living experience.</div>
					<div class="hero-small">Experience modern living- the small small way
Looking for a bespoke accommodation with a real taste of luxury or a minimalist space at a pocket friendly rate? We have something for you.</div>
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
									    <li id="any" class="location-item location-item-opt"><span class="location-icn-opt"></span> <span class="location-txt">Any</span></li>
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
									<span class="home-form-label guest-label">Guests</span>
									<div class="form-disp" id="guest-display"></div>		
								</div>																
								<span class="the-guests overlay-holders">
								<div class="share-quantity">
									<input id="unit-amount" class="unit-amount" min="1" max="10" value="1" type="number">
								</div>
								</span>
								<!--<input type="hidden" name="guests" class="guest-val" />--->
							</div>
							<div class="hero-form-boxes">
								<input type="submit" value="search" class="hero-search-button" />
							</div>
						</form>
					</div>
				</div>
				<div class="slider-image">
					
				</div>
			</div>
			<!--- Slider ends here--->
			
			<div class="section-divider"></div>
			<!---Apartment categories starts here --->
            <div class="container firstline">
                <div class="row h1">Premium or nightly stay, your choice.</div>
                <div class="row segment">
                    <!-- <div class="col-md-2"></div> -->
                    <div class="col-md-6">
                        <img src="<?php echo base_url(); ?>assets/images/stayoneroom.png" alt="" width="520">
                        <div class="segment-h2">Stayone</div>
                        <div class="segment-h3">Enjoy premium living</div>
                        <a href="#"><div class="segment-p">Discover Stayone <span><img src="<?php echo base_url(); ?>assets/images/discover-arrow.svg" alt=""></span></div></a>
                    </div>
                    <div class="col-md-6">
                        <img src="<?php echo base_url(); ?>assets/images/cotelroom.png" alt="" width="520">
                        <div class="segment-h2">Cotel</div>
                        <div class="segment-h3">Get access to a bedspace</div>
                        <a href="#"><div class="segment-p">Discover Cotel <span><img src="<?php echo base_url(); ?>assets/images/discover-arrow.svg" alt=""></span></div></a>
                    </div>
                    <!-- <div class="col-md-2"></div> -->
                </div>
            </div>
            
			<!---Features of apartments starts here --->
			<div class="features-container">
				<div class="features-item">
					<div class="feature-item-container">
						<div class="feature-icn luxury"></div>						
						<div class="feature-title">Luxury spaces</div>
						<div class="feature-note">
                        Our tastefully furnished spaces are nothing like the usual.
						</div>
					</div>
				</div>
				<div class="features-item">
					<div class="feature-item-container">
						<div class="feature-icn long-stay"></div>						
						<div class="feature-title">Stay longer</div>
						<div class="feature-note">
                        Choose from a room for a few nights to a maisonette for as long as you need. 
						</div>
					</div>
				</div>
				<div class="features-item">
					<div class="feature-item-container">
						<div class="feature-icn comfort"></div>						
						<div class="feature-title">More comfort less stress</div>
						<div class="feature-note">
                        We prioritize you – your comfort, your peace of mind, your satisfaction.
						</div>
					</div>
				</div>
				<div class="features-item">
					<div class="feature-item-container">
						<div class="feature-icn customer-service"></div>						
						<div class="feature-title">Customer support</div>
						<div class="feature-note">
                        We anticipate your needs and ensure that we are poised to meet them, anytime, any day. 
						</div>
					</div>
				</div>
			</div>
			<!---Features of apartments end here --->
			<div class="section-divider"></div>
			<!---Apartment categories starts here --->
			<div class="section-container">
				<div class="title">Your space, your choice. </div>
				<div class="section-subtitle">Choose from our wide array of premium spaces made with exquisite craftsmanship and materials and get started on a wholesome living experience.</div>
				<ul class="apt-cat-container">
					<li class="apt-cat-item">
						<a href="">
							<div class="img-container">
							</div>
							<div class="title-cont">House</div>
							<div class="sub-title-cont">200 houses</div>
						</a>
					</li>
					<li class="apt-cat-item">
						<a href="">
							<div class="img-container">
							</div>
							<div class="title-cont">Apartment</div>
							<div class="sub-title-cont">2000 apartments</div>
						</a>
					</li>
					<li class="apt-cat-item">
						<a href="">
							<div class="img-container">
							</div>
							<div class="title-cont">Studio</div>
							<div class="sub-title-cont">200 studios</div>
						</a>
					</li>
					<li class="apt-cat-item">
						<a href="">
							<div class="img-container">
							</div>
							<div class="title-cont">Villa</div>
							<div class="sub-title-cont">10 villas</div>
						</a>
					</li>
					<li class="apt-cat-item">
						<a href="">
							<div class="img-container">
							</div>
							<div class="title-cont">Mansion</div>
							<div class="sub-title-cont">5 mansions</div>
						</a>
					</li>
					<li class="apt-cat-item">
						<a href="">
							<div class="img-container">
							</div>
							<div class="title-cont">Mansionette</div>
							<div class="sub-title-cont">10 mansionettes</div>
						</a>
					</li>
				</ul>
				<span class="controls left-control"><span class="fa fa-angle-left"></span></span>
				<span class="controls right-control"><i class="fa fa-angle-right"></i></span>
			</div>
			<!---Apartment categories end here --->
			<div class="section-divider"></div>
			<!---Apartment locations starts here --->
			<div class="section-container">
				<div class="title">Your Stay, your need.</div>
				<div class="section-subtitle">We bring you the best of hotel features without hotel formalities.</div>
				<ul class="apt-loc-container">
					<li class="apt-loc-item">
						<a href="">
							<div class="img-container">
							</div>
							<div class="title-cont">Lagos</div>
							<div class="sub-title-cont">1200 properties</div>
						</a>
					</li>
					<li class="apt-loc-item">
						<a href="">
							<div class="img-container">
							</div>
							<div class="title-cont">Abuja</div>
							<div class="sub-title-cont">100 properties</div>
						</a>
					</li>
					<li class="apt-loc-item">
						<a href="">
							<div class="img-container">
							</div>
							<div class="title-cont">Oyo</div>
							<div class="sub-title-cont">50 properties</div>
						</a>
					</li>
					<li class="apt-loc-item">
						<a href="">
							<div class="img-container">
							</div>
							<div class="title-cont">Rivers</div>
							<div class="sub-title-cont">200 properties</div>
						</a>
					</li>
				</ul>
			</div>
			<!---Apartment locations end here --->
			<div class="section-divider"></div>
			<!---Apartment prop ad starts here --->
			<div class="section-container">
				<div class="prop-ad">
					<div class="big-txt">
						We are curating the finest and best stays for our Stayers.
					</div>
					<div class="small-txt">
						Our standard – undiluted quality and luxury homes topped with exceptional services for a wholesome experience. Passionate about this as much as we are?
					</div>
					<div class="prop-ad-btn"><a href="">Partner with us</a></div>
				</div>
			</div>
			<!---Apartment prop ad starts here --->
			<script src="<?php echo base_url('assets/js/homepage-form.js'); ?>"></script>
			<!---Number element controller ---->
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
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
						pluralize = "Stayers";
					}else{
						pluralize = "Stayer";
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
						pluralize = "Stayers";
					}else{
						pluralize = "Stayer";
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
			