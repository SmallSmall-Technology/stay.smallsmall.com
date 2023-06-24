        <div class="container-inner">			
			<div class="prop-section-container">
			    <div class="booking-sidebar">
                    <div class="sidebar-prop-image" style="background-image:url(<?php echo base_url()."uploads/apartments/".$apartment['folder']."/".$apartment['featuredImg']; ?>)">
                        <div class="overlay"></div>
                    </div>
                    <div class="sidebar-prop-title"><?php echo $apartment['apartmentName']; ?></div>
                    <div class="sidebar-prop-address"><?php echo $apartment['address']."."; ?></div>
                    <div class="sidebar-separator"></div>
                    <div class="sidebar-desc">Details</div>
                    <div class="sidebar-separator"></div>
                    <table width="100%" class="details-table">
                        <tr>
                            <td width="50%">Apartment Type</td>
                            <td class="align-right"><?php echo $apartment['type']; ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Date</td>
                            <td class="align-right"><span class="start_date"></span> - <span class="end_date"></span></td>
                        </tr>
                        <tr>
                            <td>No Of Nights</td>
                            <td class="align-right"><span class="num_of_nights"></span></td>
                        </tr>
                        <tr>
                            <td>No of Guests</td>
                            <td class="align-right"><span class="guest_num"></span></td>
                        </tr>
                        <tr class="pickup-spc">
                            <td>Pickup</td>
                            <td class="align-right"><span class="pickup-option"></span></td>
                        </tr>
                        <tr class="pickup-spc">
                            <td>Pickup Location</td>
                            <td class="align-right"><span class="pickup-loc"></span></td>
                        </tr>
                        <tr class="pickup-spc">
                            <td>Pickup Cost</td>
                            <td class="align-right"><span style="font-family:helvetica;">&#x20A6;</span><span class="pickup-cost">0</span></td>
                        </tr>
                        <tr>
                            <td>Cost per Night</td>
                            <td class="align-right"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($apartment['price']); ?></td>
                        </tr>
                        
                    </table>
                    
                    <div class="sidebar-separator"></div>
                    <table width="100%" class="details-table">
                        <tr>
                            <td width="50%"><span class="tot-txt">Subtotal</span></td>
                            <td class="align-right"><span class="tot-txt subtotal">-</span></td>
                        </tr>
                        <tr>
                            <td width="50%"><span class="tot-txt">VAT @ 7.5%</span></td>
                            <td class="align-right"><span class="tot-txt vat">-</span></td>
                        </tr>
                        <tr>
                            <td width="50%"><span class="tot-txt">Security Deposit</span></td>
                            <td class="align-right"><span class="tot-txt secDep">-</span></td>
                        </tr>
                        <tr>
                            <td width="50%"><span class="tot-txt">Discount</span></td>
                            <td class="align-right"><span class="tot-txt-discount discounted-price">-</span></td>
                        </tr>
                        <tr>
                            <td width="50%"><span class="tot-txt">Total Cost</span></td>
                            <td class="align-right"><span class="tot-txt total-cost tot-costing">-</span></td>
                        </tr>
                        
                    </table>
                    <div class="sidebar-separator"></div>
                    <div class="policy-title">Cancellation Policy</div>
                    <div class="policy-note">All paid prepayments are non-refundable.</div>
                    <div class="policy-title">Damage Protection Policy</div>
                    <div class="policy-note">A refundable damage deposit of <span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($apartment['securityDeposit']); ?>.00 is due.</div>
				</div>
			    
				<div class="booking-mainbar">
					<form id="bookingForm" class="booking-form" method="POST" enctype="multipart/form-data">
                        <div class="b-form-control col-2">                            
                            <div class="row-div">
                                <label>First Name</label>
                                <input type="text" class="form-fields" id="fname" name="firstname" value="<?php echo @$fname; ?>" />
                            </div>
                            <div class="row-div">
                                <label>Last Name</label>
                                <input type="text" class="form-fields" id="lname" name="lastname" value="<?php echo @$lname; ?>" />
                            </div>
                        </div>
                        <div class="b-form-control">
                            <label>Email</label>
                            <input type="text" class="form-fields" id="email" name="email" value="<?php echo @$email; ?>" />
                        </div>
                        <div class="b-form-control">
                            <label>Phone</label>
                            <input type="text" class="form-fields" name="phone" id="phone" />
                        </div>
                        <div class="b-form-control">
                            <label>Contact address</label>
                            <input type="text" class="form-fields" name="address" id="address" />
                        </div>
                        <div class="text-divider">Next of Kin</div>
                        <div class="b-form-control col-2">
                            <label>Full Name</label>
                            <input type="text" class="form-fields" id="nok-fullname" name="nok-fullname" value="" />
                        </div>
                        <div class="b-form-control col-2">
                            <div class="row-div">
                                <label>Email</label>
                                <input type="text" class="form-fields" name="nok-email" id="nok-email" />
                            </div>
                            <div class="row-div">
                                <label>Phone</label>
                                <input type="text" class="form-fields" name="nok-phone" id="nok-phone" />
                            </div>
                        </div>
                        <div class="b-form-control">
                            <label>Contact address</label>
                            <input type="text" class="form-fields" name="nok-address" id="nok-address" />
                        </div>
                        <div class="b-form-control">
                            <label>Extra Comments</label>
                            <textarea id="comment" class="txtarea-fields" name="comment" rows="5"></textarea>
                        </div>
                        <div class="b-form-control">
                            <label>Upload a valid ID</label>
                            <input type="file" id="input-file" name="input-file" />
                        </div>
                        <div class="b-form-control col-2">
                            <label>Do you need pickup?</label>
                            <div class="row-div">
                                <label class="container">Yes
        						  <input type="radio" name="pickup_option" value="yes">
        						  <span class="checkmark"></span>
        						</label>
                            </div>
                            <div class="row-div">
                                <label class="container">No
        						  <input type="radio" name="pickup_option" value="no" checked="checked">
        						  <span class="checkmark"></span>
        						</label>
                            </div>
                        </div>
                        <div class="b-form-control pickup-location-spc col-2">
                            <div class="pickup-notification">We charge a flat fee for pickup from the Island and the Mainland area of Lagos</div>
                            <label>Pickup location (Lagos Only)</label>
                            <div class="row-div">
                                <label class="container">Island
        						  <input type="radio" name="pickup_location" value="Island">
        						  <span class="checkmark"></span>
        						</label>
                            </div>
                            <div class="row-div">
                                <label class="container">Mainland
        						  <input type="radio" name="pickup_location" value="Mainland" checked="checked">
        						  <span class="checkmark"></span>
        						</label>
                            </div>
                        </div>
                        <div class="b-form-control col-3">
                            <label>Payment Method</label>
                            <div class="row-div">
                                <label class="container">Bank Transfer
        						  <input type="radio" name="payment-method" value="Transfer" checked="checked">
        						  <span class="checkmark"></span>
        						</label>
                            </div>
                            <div class="row-div">
                                <label class="container">Flutterwave
        						  <input type="radio" name="payment-method" value="Flutterwave">
        						  <span class="checkmark"></span>
        						</label>
                            </div>
                            <div class="row-div">
                                <label class="container">Paystack
        						  <input type="radio" name="payment-method" value="Paystack">
        						  <span class="checkmark"></span>
        						</label>
                            </div>
                        </div>
                        <input type="hidden" id="aptID" name="aptID" value="<?php echo $apartment['apartmentID']; ?>" />
                        <input type="hidden" id="pickup_cost" name="pickup_cost" value="" />
                        <input type="hidden" id="startDate" name="startDate" value="" />
                        <input type="hidden" id="endDate" name="endDate" value="" />
                        <input type="hidden" id="no_of_days" name="no_of_days" value="" />
                        <input type="hidden" id="guests" name="guests" value="" />
                        <input type="hidden" id="cost" name="cost" value="" />
                        <input type="hidden" id="actual_cost" name="actual_cost" value="" />
                        <!---<input type="hidden" id="securityDeposit" name="securityDeposit" value="<?php //echo $apartment['securityDeposit']; ?>" />--->
                        <input type="hidden" id="discount" name="discount" value="0" />
							
                        <div class="b-form-control">
                            <input type="submit" class="guest-form-submit" value="Book now" />
                        </div>
                    </form>
				</div>
				
			</div>
            <script src="<?php echo base_url(); ?>assets/js/booking-confirmation.js?version=<?php echo rand(234, 9999999); ?>"></script> 