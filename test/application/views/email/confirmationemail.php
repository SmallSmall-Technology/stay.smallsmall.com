        <table width="100%" style="box-sizing:border-box;margin-top:30px">
			<tr>
				<td width="100%">
					<div class="message-container" style="box-sizing:border-box;width:100%;border-radius:10px;text-align:center;background:#F2FCFB;padding:40px;">
						<div style="box-sizing:border-box;width:100%;	min-height:10px;overflow:auto;text-align:center;font-family:calibri;font-size:30px;margin-bottom:20px;" class="name">Hello <?php echo @$name; ?>,</div>
						<div style="box-sizing:border-box;width:100%;min-height:10px;overflow:auto;text-align:center;font-family:calibri;font-size:20px;margin-bottom:20px;" class="intro">Welcome to Stayone</div>
						<div style="box-sizing:border-box;width:100%;min-height:30px;	overflow:auto;text-align:center;font-family:calibri;font-size:16px;margin-bottom:20px;" class="email-body">Thank you for registering, to complete email verification we need you to click on the   <b>Verify</b> link below.</div>
						<div style="box-sizing:border-box;width:100%;	min-height:10px;overflow:auto;text-align:center;font-family:calibri;font-size:16px;margin-bottom:20px;" class="small-big">Verify your email address</div>
						<div style="box-sizing:border-box;width:100%;min-height:10px;overflow:auto;text-align:center;font-family:calibri;font-size:14px;
			margin-bottom:15px;" class="email"><?php echo @$email; ?></div>
						<div style="box-sizing:border-box;width:100px;line-height:30px;border-radius:4px;text-align:center;margin:auto;border-radius:4px;" class="verify-but"><a style="box-sizing:border-box;text-decoration:none;display:inline-block;width:100%;height:100%;background:#00CDA6;color:#000;font-family:avenir-demi;border-radius:4px;font-size:14px;font-family:calibri;" href="<?php echo @$confirmationLink; ?>">Verify</a></div>
					</div>
				</td>
			</tr>
		</table> 