        <div class="container-inner">
			<div class="section-container">
				<div class="register-form-container">
					<div class="form-head">
						Register and enjoy our nightly stays
					</div>
					<div class="form-link">
						Already registered? <a href="<?php echo base_url('login'); ?>">Sign in</a>
					</div>
					<div class="form-separator"></div>
                    <form id="registerForm" method="POST">
                        <div class="form-unit">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" class="text-f" id="fname" />
                        </div>
                        <div class="form-unit">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" class="text-f" id="lname" />
                        </div>
                        <div class="form-unit">
                            <label for="email">Email Address</label>
                            <input type="text" name="email" class="text-f" id="email" />
                        </div>
                        <div class="form-unit">
                            <label for="password">Create Password</label>
                            <input type="password" name="password" class="text-f" id="password" />
                        </div>
                        <div class="form-unit">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="text-f" id="phone" />
                        </div>
                        <div class="form-unit">
                            <input type="submit" class="signup-btn" value="Register" />
                        </div>
                    </form>
					<div class="form-disclaimer">
						By clicking register you accept our<br /><a href="">Terms of Use</a> and <a href="">Privacy Policy</a>
					</div>
				</div>
			</div>
			<script src="<?php echo base_url(); ?>assets/js/register.js?version=<?php echo rand(199, 99999999); ?>"></script>
			<!---Footer starts here --->