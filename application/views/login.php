        <div class="container-inner">
			<div class="section-container">
				<div class="register-form-container">
					<div class="form-head">
						Login and enjoy our nightly stays
					</div>
					<div class="form-link">
						No account? <a href="<?php echo base_url('signup'); ?>">Register</a>
					</div>
					<div class="form-separator"></div>
                    <form id="loginForm" method="POST">
                        <div class="form-unit">
                            <label for="username">Email address</label>
                            <input type="text" name="username" class="text-f" id="username" autocomplete="no" />
                        </div>
                        <div class="form-unit">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="text-f" id="password" autocomplete="no" />
                        </div>
                        
                        <div class="form-unit">
                            <input type="submit" class="signup-btn" value="Sign in" />
                        </div>
                        <input type="hidden" class="current-page" id="current-page" value="<?php echo @$_SERVER['HTTP_REFERER']; ?>" />

                    </form>
					
				</div>
			</div>
            <script src="<?php echo base_url(); ?>assets/js/login.js"></script>