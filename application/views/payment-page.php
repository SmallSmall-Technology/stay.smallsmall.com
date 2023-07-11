        <div class="container-inner">			
			<div class="prop-section-container">
				<div class="payment-confirm-block">
				    <table class="payment-table">
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Booking ID</td>
				            <td valign="top" class="payment-td"><b style="color:#BE1E2D">#<?php echo $details['bookingID']; ?></b></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Apartment Details</td>
				            <td valign="top" class="payment-td"><?php echo $details['apartmentName']; ?><span style="display:block;width:100%;font-size:12px;color:#3E3E3E"><?php echo $details['address']; ?></span></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Guest name</td>
				            <td valign="top" class="payment-td"><?php echo $details['firstname'].' '.$details['lastname']; ?></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Guest Email</td>
				            <td valign="top" class="payment-td"><?php echo $details['email']; ?></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Guest Phone</td>
				            <td valign="top" class="payment-td"><?php echo $details['phone']; ?></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Guest Address</td>
				            <td valign="top" class="payment-td"><?php echo $details['stayer_address']; ?></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Numbers of Guests</td>
				            <td valign="top" class="payment-td"><?php echo $details['guest_num']; ?> Guests</td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Checkin Date</td>
				            <td valign="top" class="payment-td"><?php echo $details['checkin']; ?></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Checkout Date</td>
				            <td valign="top" class="payment-td"><?php echo $details['checkout']; ?></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Numbers of Night</td>
				            <td valign="top" class="payment-td"><?php echo $details['no_of_nights']; ?> Night(s)</td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Cost</td>
				            <td valign="top" class="payment-td"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($details['cost']); ?></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Pickup Location</td>
				            <td valign="top" class="payment-td"><?php echo $details['pickup_location']; ?></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Pickup Cost</td>
				            <td valign="top" class="payment-td"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($details['pickup_cost']); ?></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Payment Option</td>
				            <td valign="top" class="payment-td"><?php echo $details['payment_option']; ?></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Payment Status</td>
				            <td valign="top" class="payment-td"><?php echo $details['payment_status']; ?></td>
				        </tr>
				        <tr class="payment-tr">
				            <td valign="top" class="payment-td">Total Cost</td>
				            <td valign="top" class="payment-td"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($details['amount']); ?></td>
				        </tr>
				        <!---<tr class="payment-tr">
				            <td class="payment-td">Guest Name</td>
				            <td class="payment-td"></td>
				        </tr>
				        <tr class="payment-tr">
				            <td class="payment-td">Guest Name</td>
				            <td class="payment-td"></td>
				        </tr>
				        <tr class="payment-tr">
				            <td class="payment-td">Guest Name</td>
				            <td class="payment-td"></td>
				        </tr>
				        <tr class="payment-tr">
				            <td class="payment-td">Guest Name</td>
				            <td class="payment-td"></td>
				        </tr>
				        <tr class="payment-tr">
				            <td class="payment-td">Guest Name</td>
				            <td class="payment-td"></td>
				        </tr>
				        <tr class="payment-tr">
				            <td class="payment-td">Guest Name</td>
				            <td class="payment-td"></td>
				        </tr>
				        <tr class="payment-tr">
				            <td class="payment-td">Guest Name</td>
				            <td class="payment-td"></td>
				        </tr>--->
				    </table>
				    <?php if($details['payment_option'] == 'Paystack'){ ?>
        			<form id="paymentForm">
        				<input type="hidden" class="email" id="email" value="<?php echo $details['email']; ?>" required />			  
        
        				<input type="hidden" class="amount" id="amount" value="<?php echo $details['amount']; ?>" required />
        
        				<input class="fname" type="hidden" id="fname" value="<?php echo $details['firstname']; ?>" />
        
        				<input class="lname" type="hidden" id="lname" value="<?php echo $details['lastname']; ?>" />
        				
        				<input type="hidden" class="booking_id" id="booking_id" value="<?php echo $details['bookingID']; ?>" required />
        
        				<button type="submit" class="payment-btn paystack-but" onclick="payWithPaystack()"> Pay Now</button>
        
        			</form>
    			<?php }else if($details['payment_option'] == 'Flutterwave'){ ?>
        			<form action='<?php echo base_url("flutterwave/create_transaction"); ?>' method='post'>
        
        				<input type='hidden' name='customer_email' value="<?php echo $details['email']; ?>" required/>
        				
        				<!---<label>Amount <span class='text-danger'>*</span></label>--->
        				<input type='hidden' name='cost_amount' class='form-control' value="<?php echo $details['amount']; ?>" required/>
        				
        				<!---<label>Currency <span class='text-danger'>*</span></label>--->
        				<input type='hidden' name='currency' value='NGN' readonly class='form-control'/>
        				
        				<!---<label>Currency <span class='text-danger'>*</span></label>--->
        				<input type='hidden' name='payment_for' value='property' readonly class='form-control'/>
        				
        				<input type="hidden" name="propertyID" value="<?php echo $details['apartmentID']; ?>" required />
        				
        				<input type="hidden" name="bookingID" value="<?php echo $details['bookingID']; ?>" required />
        				
        				<input type='submit' class='payment-btn' value='Pay Now'/>
        				
        			</form>
    			<?php } else { ?>
    			    <div class="transfer-but"><a href="<?php echo base_url()."transfer"; ?>">Proceed</a></div>
    			<?php } ?>
				</div>
			</div>
            <script>
            	const paymentForm = document.getElementById('paymentForm');
            
            	paymentForm.addEventListener("submit", payWithPaystack, false);
            
            	function payWithPaystack(e) {
            
            	  e.preventDefault();
            
            	  let handler = PaystackPop.setup({
            
            		key: 'pk_live_7741a8fec5bee8102523ef51f19ebb467893d9d2', // Replace with your public key
            
            		email: document.getElementById("email").value,
            
            		amount: document.getElementById("amount").value * 100,
            
            		//ref: document.getElementById("refID").value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            
            		// label: "Optional string that replaces customer email"
            
            		onClose: function(){
            
            		},
            
                callback: function(response){
            
                  let message = 'Payment complete! Reference: ' + response.reference;
                  
                  updateTransaction();
            
                }
            
              });
            
              handler.openIframe();
            
            }
            
            function updateTransaction(){
                var baseURL = "https://stay.smallsmall.com/";
                
                var bookingID = document.getElementById('booking_id').value;
                
                var amount = document.getElementById('amount').value;
                
                var data = {"bookingID" : bookingID, "amount" : amount};
                
                $.ajaxSetup ({ cache: false });
        
        		$.ajax({
        
        			url : baseURL+'stayone/updatePayment/',
        
        			type: "POST",
        
        			async: true,
        
        			data: data,
        
        			success	: function (data){
        				if(data == 1){
        
        					alert("Payment update Successful!");
        
        					window.location.href = baseURL+"payment-result/"+bookingID;
        
        				}else{
        
        					alert("Error updating payment.");
        
        				}				
        
        			}
        
        		});
            }
            </script>
            <script src="https://js.paystack.co/v1/inline.js"></script> 