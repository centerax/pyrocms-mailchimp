<h3><?php echo lang('mailchimp.new_suscriber_label'); ?></h3>
<?php echo form_open(uri_string(), 'class="crud"'); ?>

<div class="tabs">

	<ul class="tab-menu">
		<li><a href="#mailchimp-suscbriber-tab"><span><?php echo lang('mailchimp.new_memberinfo_label'); ?></span></a></li>
	</ul>

	<div id="mailchimp-suscbriber-tab">
		<ol>
			<li>
				<label for="email"><?php echo lang('mailchimp.email_label'); ?></label>
				<?php echo form_input('email', '', 'id="email" maxlength="100"'); ?>
				<span class="required-icon tooltip"><?php echo lang('required_label'); ?></span>
			</li>
			<li class="even">
				<label for="list_id"><?php echo lang('mailchimp.list_form_label'); ?></label>
				<?php echo lists_dropdown($mclists); ?>
				<span class="required-icon tooltip"><?php echo lang('required_label'); ?></span>
			</li>
			<li>
				<label for="fname"><?php echo lang('user_first_name_label'); ?></label>
				<?php echo form_input('fname', '', 'id="fname" maxlength="100"'); ?>
			</li>
			<li class="even">
				<label for="lname"><?php echo lang('user_last_name_label'); ?></label>
				<?php echo form_input('lname', '', 'id="lname" maxlength="100"'); ?>
			</li>
		</ol>
	</div>

</div>

<div class="buttons float-right padding-top">
	<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel'))); ?>
</div>

<?php echo form_close(); ?>