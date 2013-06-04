<section class="title">
	<h4><?php echo lang('mailchimp.list_lists_label'); ?></h4>
</section>
<section class="item">	
	<div class="content">
		<?php if ( (int)$mclists['total'] > 0 ): ?>
			<table border="0" class="table-list">
				<thead>
					<tr>
						<th width="140"><?php echo lang('mailchimp.id_label'); ?></th>
						<th width="140"><?php echo lang('mailchimp.name_label'); ?></th>
						<th width="140"><?php echo lang('mailchimp.list_default_from_name_label'); ?></th>
						<th width="140"><?php echo lang('mailchimp.list_default_from_email_label'); ?></th>
						<th width="140"><?php echo lang('mailchimp.list_members_count_label'); ?></th>
						<th width="140"><?php echo lang('mailchimp.list_click_rt_label'); ?></th>
						<th width="140"><?php echo lang('mailchimp.created_at_label'); ?></th>
						<th width="350" class="align-center"><?php echo lang('mailchimp.actions_label'); ?></th>
					</tr>
				</thead>
				<tfoot>
				</tfoot>
				<tbody>
					<?php foreach( $mclists['data'] as $list ): ?>
					<tr>
						<td><?php echo $list['id']; ?></td>
						<td><?php echo $list['name']; ?></td>
						<td><?php echo $list['default_from_name']; ?></td>
						<td><?php echo $list['default_from_email']; ?></td>
						<td><?php echo $list['stats']['member_count']; ?></td>
						<td><?php echo (int)$list['stats']['click_rate']; ?></td>
						<td><?php echo format_date($list['date_created']); ?></td>
						<td class="align-center buttons buttons-small">
						    <?php if( (int)$list['stats']['member_count'] > 0 ): ?>
							    <?php echo anchor('admin/mailchimp/subscribers/' . $list['id'], lang('mailchimp.list_subscribers'), 'class="button"'); ?>
							<?php endif; ?>
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