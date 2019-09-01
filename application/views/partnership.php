<?php echo $content['partnership_content']; ?>		
		<div class="wrapper">
                    <form method="post" action="<?php echo base_url('Partnership/add/'); ?>">
			<div class="form">
                            <?php 
                            if($this->session->flashdata('msg')){
                            ?>
                            <div class="msg-success"><?php echo $this->session->flashdata('msg'); ?></div>
                            <?php  } ?>
				<h2>Join Partner<span>* All fields are required.</span></h2>
				<div class="cf">
					<div class="input-field">
						<input type="text" placeholder="First Name" name="firstName" required>
					</div>
					<div class="input-field">
						<input type="text" placeholder="Last Name" name="lastName" required>
					</div>
				</div>
				<div class="cf">
					<div class="input-field">
						<input type="email" placeholder="Email" name="email" required>
					</div>
					<div class="input-field">
                                            <input type="tel" id="mobi" placeholder="Phone" name="phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
					</div>
				</div>
				
				<div class="cf">
					<div class="input-field">
						<input type="text" placeholder="Company" name="company" required>
					</div>
					<div class="input-field">
						<input type="text" placeholder="City" name="city" required>
					</div>
				</div>
				
					<div class="select-field">
						<select class="select" name="country" id="" required>
							<option selected="selected" disabled="disabled" value="">Country</option>
							<optgroup label="">
								<option value="India">India</option>
								<option value="United States">United States</option>
								<option value="Canada">Canada</option>
								<option value="United Kingdom">United Kingdom</option>
							</optgroup>
							<option disabled="disabled" value="">&nbsp;</option>
							<optgroup label="All Countries">
								<option value="Australia">Australia</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="China">China</option>
								<option value="Denmark">Denmark</option>
								<option value="France">France</option>
								<option value="Germany">Germany</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Italy">Italy</option>
								<option value="Japan">Japan</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Qatar">Qatar</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Singapore">Singapore</option>
								<option value="South Africa">South Africa</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sweden">Sweden</option>
								<option value="Thailand">Thailand</option>
								<option value="United Arab Emirates">United Arab Emirates</option>
								<option disabled="disabled" value="">--</option>
								<option value="Other">Other</option>
							</optgroup>
							
							
					   </select>
				   </div>
				
				<div class="message">
					<textarea placeholder="Message..." rows="5" cols="55" name="message" required></textarea>
				</div>

				<div class="cf">
					<div class="re-captcha">
						<script src='https://www.google.com/recaptcha/api.js'></script>
						<div class="g-recaptcha" data-sitekey="6LfttGgUAAAAAMZiXwxhOSylbsAT5etqeNWYjqsG"></div>
						<div class="validation-advice" id="captcha_err"></div>
					</div>
				</div>
				
				<input type="submit" value="Send Message" class="send-message" name="partnership_submit">
				
			</div>
		</div>
		
</div>
	
</div>
<script>
    
      
    $(document).ready(function() {
            //option A
            $("form").submit(function(e){
                 var mob = /^[1-9]{1}[0-9]{9}$/;
                var txtMobile = document.getElementById('mobi');
                var captcha = grecaptcha.getResponse();
            	if(captcha == ""){
            		e.preventDefault();
            		alert("Please tick captcha.");
            		txtMobile.focus();

            		return false;
            	}
                if (mob.test(txtMobile.value) == false) {
                    e.preventDefault();
                    alert("Please enter valid mobile number.");
                    txtMobile.focus();

                    return false;
                }
                return true;
                
            });
        });
    
    
    </script>