            <!---Footer starts here --->
			<div class="footer">
				<div class="footer-logo-container">
					<img src="<?php echo base_url(); ?>assets/img/footer-logo.png" alt="logo" />
				</div>
				<div class="footer-left">
					<div class="footer-pockets">
						<div class="pocket-head">Explore StayOne</div>
						<div class="pocket-links"><a href="<?php echo base_url('about-us'); ?>">About Us</a></div>
						<div class="pocket-links"><a href="">Trust & Safety</a></div>
						<div class="pocket-links"><a href="">List your property</a></div>
						<div class="pocket-links"><a href="">Lorem ipsum dolor sit amet</a></div>
					</div>
					<div class="footer-pockets">
						<div class="pocket-head">Company</div>
						<div class="pocket-links"><a href="">Trust & Safety</a></div>
						<div class="pocket-links"><a href="">List your property</a></div>
						<div class="pocket-links"><a href="">Lorem ipsum dolor sit amet</a></div>
					</div>
				</div>
				<div class="footer-right">
					<div class="footer-pockets">
						<div class="pocket-note">
							Stay up to date to get special offers and more from StayOne
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
	            <div class="text">Enter your booking confirmation code here:</div>
	        </div>
	        <div class="confirmation-form">
	            <div class="conf-entries">
	                <input type="text" class="conf-field" id="conf-field" placeholder="Booking confirmation code" />
	            </div>
	            <div class="checkin-note">
	                Booked through Stayone?

                    <a href="<?php echo base_url('login'); ?>">Login</a> and visit the "My Stays" page for your check-in details.
                    
                    <p>Not what you are looking for?</p>
                    <p><a href="<?php echo base_url('contact-us'); ?>">Feel free to contact us</a></p>
	            </div>
	            <div class="conf-entries">
	                <div class="checkin-btn" id="checkin-btn">Confirm booking</div>
	            </div>
	        </div>
	    </div>
	</div>
	<script src="<?php echo base_url('assets/js/check-in.js'); ?>"></script>
</body>

</html>
