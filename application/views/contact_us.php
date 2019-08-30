		<?php echo $content['contact_us_content']; ?>
		<div class="wrapper">
			<form method="post" action="<?php echo base_url('ContactUs/add/'); ?>">
				<div class="form">
					<?php 
					if($this->session->flashdata('msg')){
						?>
						<div class="msg-success"><?php echo $this->session->flashdata('msg'); ?></div>
						<?php }?>
						<h2>Contact us <span>* All fields are required.</span></h2>
						<div class="cf">
							<div class="input-field">
								<input type="text" name="firstName" placeholder="First Name" required>
							</div>
							<div class="input-field">
								<input type="text" name="lastName" placeholder="Last Name" required>
							</div>
						</div>
						<div class="cf">
							<div class="input-field">
								<input type="email" name="email" placeholder="Email" required>
							</div>
							<div class="input-field">
								<input type="tel" id="mobi" name="phone" placeholder="Phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
							</div>
						</div>

						<div class="select-field">
							<select class="select" name="category" id="" required>
								<option selected="selected" disabled="disabled" value="">Category</option>
								<option value="Bug Report">Bug Report</option>
								<option value="Suggestion">Suggestion</option>
								<option value="Question">Question</option>
								<option value="Other Inquiries">Other Inquiries</option>
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

						<input type="submit" value="Send Message" class="send-message" name="contact_submit">

					</div>
				</form>
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