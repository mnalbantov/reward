<?php $this->load->view('layouts/header'); ?>
<h1><?php echo lang('index_heading');?></h1>
<p><i class="glyphicon glyphicon-user"></i><?php echo lang('index_subheading');?><a href="<?=site_url('blog');?>">Блог</a><a class="pull-right" href="<?=site_url('auth/logout');?>">Изход</a></p>



	<?php if($message)  {echo'<div id="infoMessage" class="alert alert-info">'.$message.'</div>';}?>
<div class="table-responsive">
	<table class="table" cellpadding=0 cellspacing=10>
		<tr>
			<th><?php echo lang('index_fname_th');?></th>
			<th><?php echo lang('index_lname_th');?></th>
			<th><?php echo lang('index_email_th');?></th>
			<th><?php echo lang('index_groups_th');?></th>
			<th><?php echo lang('index_status_th');?></th>
			<th><?php echo lang('index_action_th');?></th>
		</tr>
		<?php foreach ($users as $user):?>
			<tr>
				<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
				<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
				<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
				<td>
					<?php foreach ($user->groups as $group):?>
						<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
					<?php endforeach?>
				</td>
				<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
				<td><?php echo anchor("auth/edit_user/".$user->id, 'Обнови','class="btn btn-primary"') ;?> <?php echo anchor("auth/delete_user/".$user->id, 'Изтрий','class="btn btn-danger"') ;?></td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
<p><?php echo anchor('auth/create_user',lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
<?php $this->load->view('layouts/footer'); ?>