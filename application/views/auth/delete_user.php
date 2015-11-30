<!-- Page Heading/Breadcrumbs -->
<?php if($user_id):?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Изтриване
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('auth'); ?>">Админ секция</a>
            </li>
            <li class="active">Сигурни ли сте,че искате да изтриете този потребител?</li>
        </ol>
        <?=form_open('auth/confirm_delete/'.$user_id); ?>
        <input type="submit" value="Да" class="btn btn-danger">
        <a href="<?=site_url('auth');?>" class="btn btn-default">Не</a>
        <?= form_close();?>
    </div>
</div>
<?php else:
show_404();
endif;?>
