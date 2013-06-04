<section class="title">
    <h4><?php echo lang('mailchimp.new_suscriber_label'); ?></h4>
</section>
<?php echo form_open(uri_string(), 'class="crud"'); ?>
<section class="item">
    <div class="content">
        <div class="tabs">

            <ul class="tab-menu">
                <li><a href="#mailchimp-suscbriber-tab"><span><?php echo lang('mailchimp.new_memberinfo_label'); ?></span></a></li>
            </ul>

            <div class="form_inputs" id="user-basic-data-tab">
                <fieldset>
                    <ul>
                        <li class="even">
                            <label for="email"><?php echo lang('mailchimp.email_label'); ?> <span>*</span></label>
                            <div class="input"><?php echo form_input('email', '', 'id="email" maxlength="100"'); ?></div>
                        </li>
                        <li>
                            <label for="list_id"><?php echo lang('mailchimp.list_form_label'); ?><span>*</span></label>
                            <div class="input"><?php echo lists_dropdown($mclists); ?></div>
                        </li>
                        <li class="even">
                            <label for="fname"><?php echo lang('mailchimp.first_name_label'); ?></label>
                            <div class="input"><?php echo form_input('fname', '', 'id="fname" maxlength="100"'); ?></div>
                        </li>
                        <li >
                            <label for="lname"><?php echo lang('mailchimp.last_name_label'); ?></label>
                            <div class="input"><?php echo form_input('lname', '', 'id="lname" maxlength="100"'); ?></div>
                        </li>
                    </ul>

                </fieldset>
            </div>

        </div>

        <div class="buttons">
            <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel'))); ?>
        </div>

        <?php echo form_close(); ?>
    </div>
</section>