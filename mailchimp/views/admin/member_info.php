<?php
$_m = $mcmember['data'][0];
?>
<h2 id="page_title" class="page-title"></h2>

<section class="title">
    <h4><?php echo sprintf(lang('mailchimp.email_on_list'), $_m['email'], $mclist_name); ?></h4>
</section>

<section class="item">
    <div class="content">

        <div class="tabs">

            <ul class="tab-menu">
                <li><a href="#subscriber-data"><span><?php echo lang('mailchimp.new_memberinfo_label') ?></span></a></li>
            </ul>
            <div class="form_inputs" id="subscriber-data">
                <fieldset>
                    <ul>
                        <li>
                            <label><?php echo lang('mailchimp.id_label'); ?>:</label>
                            <div class="input"><?php echo $_m['id']; ?></div>
                        </li>
                        <?php if ($_m['merges']['FNAME']): ?>
                        <li>
                            <label><?php echo lang('mailchimp.first_name_label'); ?>:</label>
                            <div class="input"><?php echo $_m['merges']['FNAME']; ?></div>
                        </li>
                        <?php endif; ?>

                        <?php if ($_m['merges']['LNAME']): ?>
                        <li>
                            <label><?php echo lang('mailchimp.last_name_label'); ?>:</label>
                            <div class="input"><?php echo $_m['merges']['LNAME']; ?></div>
                        </li>
                        <?php endif; ?>

                        <li>
                            <label><?php echo lang('mailchimp.web_id_label'); ?>:</label>
                            <div class="input"><?php echo $_m['web_id']; ?></div>
                        </li>
                        <li>
                            <label><?php echo lang('mailchimp.status_label'); ?>:</label>
                            <div class="input"><?php echo $_m['status']; ?></div>
                        </li>
                        <li>
                            <label><?php echo lang('mailchimp.rating_label'); ?>:</label>
                            <div class="input"><?php echo $_m['member_rating']; ?></div>
                        </li>
                        <li>
                            <label><?php echo lang('mailchimp.email_type_label'); ?>:</label>
                            <div class="input"><?php echo $_m['email_type']; ?></div>
                        </li>

                        <?php if ($_m['ip_signup']): ?>
                        <li>
                            <label><?php echo lang('mailchimp.ip_signup_label'); ?>:</label>
                            <div class="input"><?php echo $_m['ip_signup']; ?></div>
                        </li>
                        <?php endif; ?>

                    </ul>
                </fieldset>
            </div>
        </div>
        <div class="buttons">
            <?php echo anchor('admin/mailchimp/subscribers/' . $mclistid, lang('mailchimp.all_subscribers_on_tlist'), 'class="button"'); ?>
        </div>
    </div>
</section>