    		<!----Body of email is in here ---->
		<div style="width:90%;font-family:calibri;padding:20px 0;margin:auto;">
    		<table width="100%">
    			<tr>
    				<td width="100%">
    					<div class="">
    						<div style="width:100%;	min-height:10px;overflow:auto;text-align:center;font-family:calibri;font-size:16px;margin-bottom:20px;" class="name">Hi Customer Rep,</div>
    						<div style="width:100%;min-height:30px;	overflow:auto;text-align:center;font-family:calibri;font-size:14px;margin-bottom:20px;" class="email-body">
    							<p>A guest just checked in virtually, details below</p>
    							<table width="100%">
    							    <tr style="background:#f2f2f2">
    									<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#be1e2f">Guest Name :</b></td>
    									<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $guestName; ?></td>
    								</tr>
    								<tr style="background:#f2f2f2">
    									<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#be1e2f">Email Address :</b></td>
    									<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $email; ?></td>
    								</tr>
    								<tr style="background:#f2f2f2">
    									<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#be1e2f">Phone Number :</b></td>
    									<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $phone; ?></td>
    								</tr>
    								<tr style="background:#f2f2f2">
    									<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#be1e2f">Apartment Name :</b></td>
    									<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $aptName; ?></td>
    								</tr>
    								<tr>
    									<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#be1e2f">Property Address :</b></td>
    									<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $aptAddress; ?></td>
    								</tr>
    								<tr style="background:#f2f2f2">
    									<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#be1e2f">Checkin Time:</b></td>
    									<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $checkin_time; ?> </td>
    								</tr>
    								
    							</table>
    							<p style="font-weight:bold">Please reach out to the guest ASAP.</p>
    						</div>
    						
    					</div>
    				</td>
    			</tr>
    		</table> 
        </div>