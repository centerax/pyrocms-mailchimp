<?php echo form_open('mailchimp/signup', array('id' => 'mailchimp_signup')); ?>
    <fieldset>
      <div class="mc_email"><label for="mc_email" id="address-label"><?php echo lang('user_email'); ?></label>
        <?php echo form_input('mc_email', '', 'id="mc_email"'); ?>
        <?php echo form_hidden('mc_list', $list_id); ?>
        <div id="no-spam"><?php echo $notes; ?></div>
      </div>
      <div class="mc_submit"><button type="submit"><?php echo lang('mailchimp.signup'); ?></button></div>
      <div class="mc_response"><span id="mc_response"></span></div>
    </fieldset>
<?php echo form_close(); ?>
<script type="text/javascript">
  //todo make that cleaner.
    var msgs = {empty: "<?php echo lang('mailchimp.emptyemail'); ?>",
            emailformat: "<?php echo lang('mailchimp.badformatemail'); ?>",
            updating: "<?php echo lang('mailchimp.updatinglist'); ?>"};
    $(document).ready(function() {
	    $('#mailchimp_signup').submit(function(event) {

            $('#mc_response').css("color", "black");

            event.preventDefault();

            var email_address = $('#mc_email').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

            if(email_address == '') {
                alert(msgs.empty);
                return false;
            }else if(!emailReg.test(email_address)) {
                alert(msgs.emailformat);
                return false;
            }

		    // update user interface
		    $('#mc_response').html(msgs.updating);

		    // Prepare query string and send AJAX request
		    $.ajax({
		        type: 'POST',
  			    url: $(this).attr('action'),
  			    data: 'list=' + escape($('input[name$="mc_list"]').val()) + '&email=' + escape(email_address),
  			    success: function(msg) {
  			        if(msg.match(/^Error/gi)){
  			            $('#mc_response').addClass("error").html(msg);//css("color", "red")
  			        }else{
                    $('#mc_response').addClass("success").html(msg);
  			        }
  			    }
		    });

		    return false;
	    });
    });
</script>