<?php if($post):
foreach($post as $p):?>
    <?=form_open('blog/edit_post/'.$p->blog_id);?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Редактиране
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('blog'); ?>">Начало</a>
            </li>
            <li class="active"><?=$p->blog_title;?></li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="col-lg-10">
    <div class="validation">
    </div>
    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Задължителни полета</strong></div>


    <div class="form-group">
        <label for="InputSubject">Заглавие</label>
        <div class="input-group">
            <?= form_input('InputSubject',$p->blog_title, 'class="form-control" id="InputSubject" required '); ?>
<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
</div>
<?= form_error('InputSubject') ?>
</div>

<div class="form-group">
    <label for="InputMessage">Статия</label>
    <div class="input-group">
        <?= form_textarea('InputPost',$p->post, 'class="form-control" id="InputPost" " required '); ?>
        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
    </div>
    <?= form_error('InputPost') ?>
</div>
    <div class="form-group">
        <input type="submit" value="Редактрай" class="btn btn-success">
        </div>
</div>
<?php form_close(); endforeach; else:redirect('blog');endif;?>
