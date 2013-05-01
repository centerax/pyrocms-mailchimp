<?php echo form_open('mailchimp/signup', array('id' => 'mailchimp_signup')); ?>
    <fieldset>
      <label for="mc_email" id="address-label"><?php echo lang('user_email'); ?></label>
      <?php echo form_input('mc_email', '', 'id="mc_email"'); ?>
      <?php echo form_hidden('mc_list', $list_id); ?>
      <div id="no-spam"><?php echo $notes; ?></div>
      <div class="pyro-buttons">
        <button type="submit"><?php echo lang('save_label') ?></button>
      </div>
      <span id="mc_response"></span>
    </fieldset>
<?php echo form_close(); ?>
<script type="text/javascript">
    $(document).ready(function() {
	    $('#mailchimp_signup').submit(function(event) {

            $('#mc_response').css("color", "black");

            event.preventDefault();

            var email_address = $('#mc_email').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

            if(email_address == '') {
                alert("Please enter your email address.");
                return false;
            }else if(!emailReg.test(email_address)) {
                alert("Enter a valid email address.");
                return false;
            }

		    // update user interface
		    $('#mc_response').html('Adding email address...');

		    // Prepare query string and send AJAX request
		    $.ajax({
		        type: 'POST',
			    url: $(this).attr('action'),
			    data: 'list='+escape($('input[name$="mc_list"]').val()) + '&email=' + escape(email_address),
			    success: function(msg) {

			        if(msg.match(/^Error/gi)){
			            $('#mc_response').css("color", "red").html(msg);
			        }else{
                        $('#mc_response').css("color", "green").html(msg);
			        }

			    }
		    });

		    return false;
	    });
    });
</script>