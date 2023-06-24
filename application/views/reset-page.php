        <div class="container-inner">
			<div class="section-container">
				<div class="register-form-container">
					<div class="form-head">
						Reset password
					</div>
					<div class="form-report"></div>
					<div class="form-separator"></div>
                    <form id="resetPwdForm" method="POST">
                        <div class="form-unit">
                            <label for="password">New password</label>
                            <input type="password" name="password" class="text-f" id="password" autocomplete="no" />
                        </div>
                        <div class="form-unit">
                            <label for="password-confirm">Confirm new password</label>
                            <input type="password" name="password-confirm" class="text-f" id="password-confirm" autocomplete="no" />
                        </div>
                        
                        <div class="form-unit">
                            <input type="submit" class="signup-btn" value="Reset Password" />
                        </div>
                        
                    </form>
					
				</div>
			</div>
            <script src="<?php echo base_url(); ?>assets/js/login.js"></script>