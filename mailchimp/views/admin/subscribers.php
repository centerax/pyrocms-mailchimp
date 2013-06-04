<section class="title">
	<h4><?php echo sprintf(lang('mailchimp.list_subscribers_for_list_label'), $mclist_name); ?></h4>
</section>
<section class="item">
	<div class="content">
		<?php if ( (int)$mcsubscribers['total'] > 0 ): ?>
			<table border="0" class="table-list">
				<thead>
					<tr>
						<th width="140"><?php echo lang('mailchimp.email_label'); ?></th>
						<th width="140"><?php echo lang('mailchimp.last_changed_label'); ?></th>
						<th width="350" class="align-center"><?php echo lang('mailchimp.actions_label'); ?></th>
					</tr>
				</thead>
				<tfoot>
				</tfoot>
				<tbody>
					<?php foreach( $mcsubscribers['data'] as $member ): ?>
					<tr>
						<td><?php echo $member['email']; ?></td>
						<td><?php echo format_date($member['timestamp']); ?></td>
						<td class="align-center buttons buttons-small">
						    <?php echo anchor('admin/mailchimp/subscriber_detail/' . $listid .'/'.urlencode(str_replace('@', '~at~', $member['email'])), lang('mailchimp.subscriber_info'), 'class="button"'); ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

		<?php else: ?>
			<div class="blank-slate">
				<img src="<?php echo base_url().'addons/shared_addons/modules/mailchimp/img/no-records.png' ?>" />
				<h2><?php echo lang('mailchimp.no_records'); ?></h2>
			</div>
		<?php endif;?>
	</div>
</section>