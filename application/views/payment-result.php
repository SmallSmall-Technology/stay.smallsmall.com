        <div class="container-inner">			
			<div class="prop-section-container">
				<div class="big-result-text <?php echo $color ?>"><?php echo @$payment_status; ?></div>
				<div class="small-result-text"><?php echo @$status_text; ?></div>
				<?php if(@$paymentDets){ ?>
				    <div class="spc-div">
        			    <b style="display:block;margin-bottom:15px;">All bank transfers payable to:</b>
            			<table class="bank-det-tbl" cellpadding="20" cellspacing="10" >
            			    
            			    <tr class="bank-det-tr">
            			        <td class="bank-det-td"><b>Account Nam</b>e</td>
            			        <td class="bank-det-td">Rent Small Small Ltd</td>
            			    </tr>
            			    <tr class="bank-det-tr">
            			        <td class="bank-det-td"><b>Bank Name</b></td>
            			        <td class="bank-det-td">Providus Bank</td>
            			    </tr>
            			    <tr class="bank-det-tr">
            			        <td class="bank-det-td"><b>Account Number</b></td>
            			        <td class="bank-det-td">7900982382</td>
            			    </tr>
            			</table>
        			</div>
				<?php } ?>
			</div>