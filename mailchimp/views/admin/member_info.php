<?php
    $_m = $mcmember['data'][0];
?>
<h3><?php echo sprintf(lang('mailchimp.email_on_list'), $_m['email'], $mclist_name); ?></h3>

<ul id="member-detail">
	<li><strong><?php echo lang('mailchimp.id_label'); ?>:</strong> <?php echo $_m['id']; ?></li>
	<?php if($_m['merges']['FNAME']): ?>
    	<li><strong><?php echo lang('user_first_name_label'); ?>:</strong> <?php echo $_m['merges']['FNAME']; ?></li>
	<?php endif; ?>
	<?php if($_m['merges']['LNAME']): ?>
    	<li><strong><?php echo lang('user_last_name_label'); ?>:</strong> <?php echo $_m['merges']['LNAME']; ?></li>
	<?php endif; ?>
	<li><strong><?php echo lang('mailchimp.web_id_label'); ?>:</strong> <?php echo $_m['web_id']; ?></li>
	<li><strong><?php echo lang('mailchimp.status_label'); ?>:</strong> <?php echo $_m['status']; ?></li>
	<li><strong><?php echo lang('mailchimp.rating_label'); ?>:</strong> <?php echo $_m['member_rating']; ?></li>
	<li><strong><?php echo lang('mailchimp.email_type_label'); ?>:</strong> <?php echo $_m['email_type']; ?></li>
	<?php if($_m['ip_signup']): ?>
	    <li><strong><?php echo lang('mailchimp.ip_signup_label'); ?>:</strong> <?php echo $_m['ip_signup']; ?></li>
    <?php endif; ?>
</ul>
<div class="buttons buttons-small">
    <?php echo anchor('admin/mailchimp/subscribers/' . $mclistid, lang('mailchimp.all_subscribers_on_tlist'), 'class="button"'); ?>
</div>