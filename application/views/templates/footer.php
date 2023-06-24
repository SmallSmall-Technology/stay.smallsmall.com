            <!---Footer starts here --->
			<div class="footer">
				<div class="footer-logo-container">
					<img src="<?php echo base_url(); ?>assets/img/footer-logo.png" alt="logo" />
				</div>
				<div class="footer-left">
					<div class="footer-pockets">
						<div class="pocket-head">Explore StaySmallsmall</div>
						<div class="pocket-links"><a href="<?php echo base_url(); ?>about-us#whystayone">What is StayOne?</a></div>
						<div class="pocket-links"><a href="<?php echo base_url(); ?>about-us#whycotel">What is Cotel?</a></div>
						<div class="pocket-links"><a href="#">Partner with us</a></div>
						
					</div>
					<div class="footer-pockets">
						<div class="pocket-head">Company</div>
						<div class="pocket-links"><a href="https://smallsmall.com/about">About Us</a></div>
						<div class="pocket-links"><a href="#">Contact Us</a></div>
					</div>
					<div class="social-media-icons">
                        <ul>
                            <li><a target="_blank" href="https://www.twitter.com/staysmallsmall" class="twitter"><img src="assets/img/twitter.svg" alt=""></a></li>
                            <li><a target="_blank" href="https://www.facebook.com/staysmallsmall" class="facebook"><img src="assets/img/facebook.svg" alt=""></a></li>
                            <li><a target="_blank" href="https://instagram.com/stay.smallsmall?igshid=YmMyMTA2M2Y=" class="instagram"><img src="assets/img/instagram.svg" alt=""></a></li>
                            <li><a target="_blank" href="https://www.linkedin.com" class="linkedin"><img src="assets/img/linkedin.svg" alt=""></a></li>
                        </ul>
                        
                    </div>
                    
                    
                    <div class="copy">2023 StaySmallsmall. All rights reserved</div>
                    <div class="privacy"><a href="<?php echo base_url('terms-and-conditions'); ?>">Privacy Policy | Terms & Conditions</a></div>
				</div>
				<div class="footer-right">
					<div class="footer-pockets">
						<div class="subscribe">Subscribe to our newsletter</div>
						<div class="pocket-note">
                        We’ll share new locations, incentives and best offers with you!
						</div>
						<table class="nl-table" width="100%">
							<tr>
								<td class="nl-td"><input type="text" class="newsletter-input" placeholder="Email Address" /></td>
								<td class="nl-td"><input type="button" class="newsletter-btn" value="Subscribe" /></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<!---Footer ends here --->
		</div>
	</div>
	<div class="checkin-overlay">
	    <div class="checkin-form">
	        <div class="close-button"><i class="fa fa-close"></i></div>
	        <div class="checkin-header">
	            <div class="text">Virtual Check In</div>
	        </div>
	        <div class="confirmation-form">
	            <div class="checkin-note">
	                Our check-in time is 12noon, if you can’t make it use our virtual check-in to gain access when you arrive.
	            </div>
	            <form id="checkinForm">
    	            <div class="conf-entries">
    	                <input type="text" name="booking-id" class="conf-field booking-id" id="conf-field" placeholder="Booking confirmation code" />
    	            </div>
    	            <div class="select">
    	                <select class="checkin-time" name="checkin-time">
    	                    <option value="1:00 AM">1:00 AM</option>
    	                    <option value="2:00 AM">2:00 AM</option>
    	                    <option value="3:00 AM">3:00 AM</option>
    	                    <option value="4:00 AM">4:00 AM</option>
    	                    <option value="5:00 AM">5:00 AM</option>
    	                    <option value="6:00 AM">6:00 AM</option>
    	                    <option value="7:00 AM">7:00 AM</option>
    	                    <option value="8:00 AM">8:00 AM</option>
    	                    <option value="9:00 AM">9:00 AM</option>
    	                    <option value="10:00 AM">10:00 AM</option>
    	                    <option value="12:00 AM">12:00 AM</option>
    	                    <option value="1:00 PM">1:00 PM</option>
    	                    <option value="2:00 PM">2:00 PM</option>
    	                    <option value="3:00 PM">3:00 PM</option>
    	                    <option value="4:00 PM">4:00 PM</option>
    	                    <option value="5:00 PM">5:00 PM</option>
    	                    <option value="6:00 PM">6:00 PM</option>
    	                    <option value="7:00 PM">7:00 PM</option>
    	                    <option value="8:00 PM">8:00 PM</option>
    	                    <option value="9:00 PM">9:00 PM</option>
    	                    <option value="10:00 PM">10:00 PM</option>
    	                    <option value="11:00 PM">11:00 PM</option>
    	                    <option value="12:00 PM">12:00 PM</option>
    	                </select>
    	                <i class="bx bx-alarm"></i>
    	            </div>
    	            <div class="conf-report success"></div>
    	            <div class="conf-entries">
    	                <button type="submit" class="checkin-btn" id="checkin-btn">Check in</button>
    	            </div>
	            </form>
	        </div>
	    </div>
	</div>
	
	<script src="<?php echo base_url('assets/js/side-nav.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/check-in.js'); ?>"></script>
</body>

</html>
