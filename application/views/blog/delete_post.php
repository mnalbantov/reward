<?php if($post):
foreach($post as $p):?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Изтриване
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('blog'); ?>">Начало</a>
            </li>
            <li class="active">Сигурни ли сте,че искате да изтриете тази публикация?</li>
        </ol>
        <?=form_open('blog/confirm_delete/'.$p->blog_id); ?>
        <input type="submit" value="Да" class="btn btn-danger">
        <a href="<?=site_url('blog/post/'.$p->blog_id); ?>" class="btn btn-default">Не</a>
        <?= form_close();?>
    </div>
</div>
<?php endforeach; else: redirect('blog'); endif;?>