<?php if($post):
    foreach($post as $p):?>
<!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$p->blog_title;?>
                <small>от <a href="#"><?=$p->first_name;?></a>
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?=site_url('blog'); ?>">Начало</a>
                </li>
                <li class="active"><?=$p->blog_title;?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <hr>

            <!-- Date/Time -->
            <?php if($this->ion_auth->is_admin()):?>
                 <p><i class="fa fa-clock-o"></i> Публикувано на <?=$p->date_published;?> |&nbsp; <i class="glyphicon glyphicon-eye-open"></i>&nbsp;<?=$views;?> пъти
                     <a href="<?=site_url('blog/edit_post').'/'.$p->blog_id;?>" class="btn btn-primary">Редактирай</a>&nbsp;<a href="<?=site_url('blog/delete_post').'/'.$p->blog_id;;?>" class="btn btn-danger">Изтрий</a></p>
         <?php else:?>
            <p><i class="fa fa-clock-o"></i> Публикувано на <?=$p->date_published;?> |&nbsp; <i class="glyphicon glyphicon-eye-open"></i>&nbsp;<?=$views;?> пъти</p>
        <?php endif;?>
            <hr>

            <!-- Preview Image -->
            <?php if(! $p->picture):?>
                <img class="img-responsive" src="<?= base_url('uploads').'/default_post.png';?>" alt="">
               <?php else:?>
                <img class="img-responsive" src="<?= base_url('uploads/blog_images').'/'.$p->picture;?>" alt="">
               <?php endif;?>
            <hr>

            <!-- Post Content -->
            <p class="lead"><?=$p->post;?><p/>
            <hr>
<?php endforeach; else:
redirect('blog');
endif;?>