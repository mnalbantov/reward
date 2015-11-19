
<!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Моят блог сайт
                <small>бета версия :)</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?=site_url('blog');?>">Начало</a>
                </li>
                <?php if($this->ion_auth->logged_in()): ?>
                <li><a href="<?=site_url('blog/add_post');?>">Добави статия</a>
                <?php else:?>
                    <li class="active" >За да добавяте статии,трябва да се регистрирате или да влезнете в системата :) </li>
                    <a href="<?=site_url('auth') ?>">Вход</a>
                <?php endif;?>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <?php if($posts):
            foreach($posts as $post):
            ?>

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h2>
                <a href="<?=site_url('blog/post').'/'.$post->blog_id; ?>"><?=$post->blog_title; ?></a>
            </h2>
            <p><i class="fa fa-clock-o"></i> Публикувано на <?=$post->date_published; ?> от <?=$post->first_name; ?> | Видяно <?= $post->views;?></p>
            <hr>

                <a href="<?=site_url('blog/post').'/'.$post->blog_id; ?>">
                    <?php if (! $post->picture): ?>
                    <img class="img-responsive img-hover" src="<?=base_url('uploads').'/thumb_def_post.png';?>" alt="">
                    <?php else:?>
                        <img class="img-responsive img-hover" src="<?=base_url('uploads/thumbs').'/'.$post->picture;?>" alt="">
                    <?php endif;?>
                </a>
            <hr>
            <p><?=$post->short_description; ?>...</p>
            <a class="btn btn-primary" href="<?=site_url('blog/post').'/'.$post->blog_id; ?>">Прочети повече <i class="fa fa-angle-right"></i></a>
            <hr>
        </div>
    <?php endforeach; else:?>
        <p>Все още няма статии.Напишете първата</p>
        <?php endif;?>


        </div>
<ul class="pagination">
    <li><a href="#"><?= $links; ?></a></li>
</ul>

    <!-- /.row -->




