        <div class="container-inner">
			<!--- Slider starts here --->
			<div class="slider">
				<div class="slider-form-container">
					<div class="hero-big">Experience modern living- the small small way.</div>
					<div class="hero-small">Looking for a bespoke accommodation with a real taste of luxury or a minimalist space at a pocket friendly rate? We have something for you.</div>
					<div class="section-container">
        				<div class="title">
        				    <p>Book your stay</p>
        				</div>
        			</div>
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
				    <div class="slider-overlay">
				        
				    </div>	
				</div>
			</div>
			<!--- Slider ends here--->
			
			<!--<div class="section-divider"></div>-->
			<!---Apartment categories starts here --->
			<div class="option-main-container">
			    <!--<div class="container-header-title">Experience modern living- the small small way</div>-->
			    <!--<div class="container-header-subtitle">Looking for a bespoke accommodation with a real taste of luxury or a minimalist space at a pocket friendly rate? We have something for you.</div>-->
			    <div class="option-container">
    			    <div class="option-items">
    			        <div class="option-img">
    			            <img src="<?php echo base_url(); ?>assets/images/cotelroom.png" alt="" />
    			        </div>
    			        <div class="item-title">Cotel</div>
                        <div class="item-smaller-title">Affordable nightly stay</div>
                        <div class="item-note">Providing access to convenience at a pocket friendly rate. Find a room or bed space to lay your head on for a few nights and connect with likeminds</div>
                        <a href="https://dev-stay.smallsmall.com/about-us#whycotel">
                        <div class="item-link">
                            Discover Cotel <span><img src="<?php //echo base_url(); ?>assets/images/discover-arrow.svg" alt="" /></span>
                        </div>
                        </a>
    			    </div>
    			    <div class="option-items">
    			        <div class="option-img">
    			            <img src="<?php echo base_url(); ?>assets/images/stayoneroom.png" alt="" />
    			        </div>
    			        <div class="item-title">StayOne</div>
                        <div class="item-smaller-title">Enjoy premium living</div>
                        <div class="item-note">We’ve anticipated your need for a complete luxury experience and we are poised to meet them when you stay at any of our uniquely curated homes</div>
                        <a href="https://dev-stay.smallsmall.com/about-us#whystayone">
                        <div class="item-link">
                            Discover StayOne <span><img src="<?php //echo base_url(); ?>assets/images/discover-arrow.svg" alt="" /></span>
                        </div>
                        </a>
    			    </div>
    			</div>
			</div>
			
			<div class="section-container">
				<div class="title black-txt">A planet of choice </div>
				<div class="section-subtitle">Choose from our wide array of premium spaces made with exquisite craftsmanship and materials and get started on a wholesome living experience.</div>
				<div class="cotel-tab">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab">Cotel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">StayOne</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <ul class="apt-cat-container">
                            <li class="apt-cat-item">
                                <a href="<?php echo base_url(); ?>stay-type/1/12">
                                    <div class="img-container one-person-room">
                                    </div>
                                    <div class="title-cont">1 person room</div>
                                    <div class="sub-title-cont"><?php echo $this->stayone_model->get_apt_count(1, 12); ?> Rooms | <span>From <span style="font-weight:normal;font-family:calibri;">&#x20A6;</span><?php $res = $this->stayone_model->get_min_amount(1, 12); echo number_format(@$res['price']); ?> / night</span></div>
                                </a>
                            </li>
                            <li class="apt-cat-item">
                                <a href="<?php echo base_url(); ?>stay-type/1/13">
                                    <div class="img-container two-person-room">
                                    </div>
                                    <div class="title-cont">2 person room</div>
                                    <div class="sub-title-cont"><?php echo $this->stayone_model->get_apt_count(1, 13); ?> Rooms | <span>From <span style="font-weight:normal;font-family:calibri;">&#x20A6;</span><?php $res = $this->stayone_model->get_min_amount(1, 13); echo number_format(@$res['price']); ?> / night</span></div>
                                </a>
                            </li>
                            <li class="apt-cat-item">
                                <a href="<?php echo base_url(); ?>stay-type/1/14">
                                    <div class="img-container three-person-room">
                                    </div>
                                    <div class="title-cont">3 person room</div>
                                    <div class="sub-title-cont"><?php echo $this->stayone_model->get_apt_count(1, 14); ?> Rooms | <span>From <span style="font-weight:normal;font-family:calibri;">&#x20A6;</span><?php $res = $this->stayone_model->get_min_amount(1, 14); echo number_format(@$res['price']); ?> / night</span></div>
                                </a>
                            </li>
                            <li class="apt-cat-item">
                                <a href="<?php echo base_url(); ?>stay-type/1/15">
                                    <div class="img-container four-person-room">
                                    </div>
                                    <div class="title-cont">4 person room</div>
                                    <div class="sub-title-cont"><?php echo $this->stayone_model->get_apt_count(1, 15); ?> Rooms | <span>From <span style="font-weight:normal;font-family:calibri;">&#x20A6;</span><?php $res = $this->stayone_model->get_min_amount(1, 15); echo number_format(@$res['price']); ?> / night</span></div>
                                </a>
                            </li>
                            <li class="apt-cat-item">
                                <a href="<?php echo base_url(); ?>stay-type/1/16">
                                    <div class="img-container five-person-room">
                                    </div>
                                    <div class="title-cont">5 person room</div>
                                    <div class="sub-title-cont"><?php echo $this->stayone_model->get_apt_count(1, 16); ?> Rooms | <span>From <span style="font-weight:normal;font-family:calibri;">&#x20A6;</span><?php $res = $this->stayone_model->get_min_amount(1, 16); echo number_format(@$res['price']); ?> / night</span></div>
                                </a>
                            </li>
                            <li class="apt-cat-item">
                                <a href="">
                                    <div class="img-container cotel-mansionette">
                                    </div>
                                    <div class="title-cont">Mansionette</div>
                                    <div class="sub-title-cont">0 mansionettes</div>
                                </a>
                            </li>
				        </ul>
                        <span class="controls left-control left-but"><span class="fa fa-angle-left"></span></span>
                        <span class="controls right-control right-but"><i class="fa fa-angle-right"></i></span>

                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <ul class="apt-cat-container">
                                <li class="apt-cat-item">
                                    <a href="<?php echo base_url(); ?>stay-type/2/1">
                                        <div class="img-container stayone-studio">
                                            
                                        </div>
                                        <div class="title-cont">Studio</div>
                                        <div class="sub-title-cont"><?php echo $this->stayone_model->get_apt_count(2, 1); ?> rooms | <span>From <span style="font-weight:normal;font-family:calibri;">&#x20A6;</span><?php $res = $this->stayone_model->get_min_amount(2, 1); echo number_format(@$res['price']); ?> / night</span></div>
                                    </a>
                                </li>
                                <li class="apt-cat-item">
                                    <a href="<?php echo base_url(); ?>stay-type/2/6">
                                        <div class="img-container stayone-one-bed">
                                        </div>
                                        <div class="title-cont">1 Bed</div>
                                        <div class="sub-title-cont"><?php echo $this->stayone_model->get_apt_count(2, 6); ?> rooms | <span>From <span style="font-weight:normal;font-family:calibri;">&#x20A6;</span><?php $res = $this->stayone_model->get_min_amount(2, 6); echo number_format(@$res['price']); ?> / night</span></div>
                                    </a>
                                </li>
                                <li class="apt-cat-item">
                                    <a href="<?php echo base_url(); ?>stay-type/2/4">
                                        <div class="img-container stayone-two-bed">
                                        </div>
                                        <div class="title-cont">2 Beds</div>
                                        <div class="sub-title-cont"><?php echo $this->stayone_model->get_apt_count(2, 4); ?> rooms | <span>From <span style="font-weight:normal;font-family:calibri;">&#x20A6;</span><?php $res = $this->stayone_model->get_min_amount(2, 4); echo number_format(@$res['price']); ?> / night</span></div>
                                    </a>
                                </li>
                                <li class="apt-cat-item">
                                    <a href="<?php echo base_url(); ?>stay-type/2/5">
                                        <div class="img-container stayone-three-bed">
                                        </div>
                                        <div class="title-cont">3 Beds</div>
                                        <div class="sub-title-cont"><?php echo $this->stayone_model->get_apt_count(2, 5); ?> rooms | <span>From <span style="font-weight:normal;font-family:calibri;">&#x20A6;</span><?php $res = $this->stayone_model->get_min_amount(2, 5); echo number_format(@$res['price']); ?> / night</span></div>
                                    </a>
                                </li>
                                
                            </ul>
                            <span class="controls left-control left-but"><span class="fa fa-angle-left"></span></span>
				            <span class="controls right-control right-but"><i class="fa fa-angle-right"></i></span>
                        </div>
                    </div>
                </div>
                
			</div>
			<!---Apartment categories end here --->
			<!--<div class="section-divider"></div>-->
			<!---Apartment locations starts here --->
			<!---<div class="section-container">
				<div class="title black-txt">Top locations in Lagos</div>
				<div class="section-subtitle">We bring you the best of hotel features without hotel formalities.</div>
				<div class="cotel-tab">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Cotel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Stayone</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
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
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
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
                    </div>
                </div>
			</div>--->
			<!---Apartment locations end here --->
			<!--<div class="section-divider"></div>-->
			
			<!---<div class="section-container">
				<div class="title black-txt">Explore spaces by trip type</div>
				<div class="section-subtitle">We bring you the best of hotel features without hotel formalities.</div>
				<div class="cotel-tab">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Cotel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Stayone</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
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
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
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
                    </div>
                </div>
			</div>---->
			<!---Apartment prop ad starts here --->
			<div class="section-container">
				<div class="prop-ad">
					<div class="big-txt">
						We are curating the finest and best stays for our guests.
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