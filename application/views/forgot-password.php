        <div class="container-inner">
			<div class="section-container">
				<div class="register-form-container">
					<div class="form-head">
						Forgot your password?
					</div>
					<div class="form-report"></div>
					<div class="form-link">
						Login? <a href="<?php echo base_url('forgot-password'); ?>">Click here</a>
					</div>
					<div class="form-separator"></div>
                    <form id="forgotPasswordForm" method="POST">
                        <div class="form-unit">
                            <label for="username">Email address</label>
                            <input type="text" name="email" class="text-f" id="email" autocomplete="no" />
                        </div>
                        
                        <div class="form-unit">
                            <input type="submit" class="signup-btn" value="Submit" />
                        </div>
                        
                    </form>
					
				</div>
			</div>
            <script src="<?php echo base_url(); ?>assets/js/login.js"></script>