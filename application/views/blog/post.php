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
            <label><i class="glyphicon glyphicon-comment">Коментари &nbsp;</i><?=$total_comments;?></label>
            <hr>

            <!-- Preview Image -->
            <?php if(! $p->picture):?>
                <img class="img-responsive" src="<?= base_url('uploads').'/default_post.png';?>" alt="">
               <?php else:?>
                <img class="img-responsive" src="<?= base_url('uploads/blog_images').'/'.$p->picture;?>" alt="">
               <?php endif;?>
            <hr>
                <p><?=$p->post; ?></p>
            <hr>
            <div class="fb-like" data-href="<?=site_url('blog/post').'/'.$post_id;?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            <div class="g-plus" data-action="share" ... ></div>
            <?php if($comments):?>
                <h3>Коментари</h3>
                <?php foreach ($comments as $comment):?>

            <div class="postemeta" id="comment_id">
                <div>
                    <strong style="color:#0086b3;">
                        <div  class="glyphicon glyphicon-user " style="margin-right: 5px;"><?= ucwords($comment->comment_name   );?></div></strong> каза:
                    <?php if($this->ion_auth->is_admin()):?>
                    <a href="javascript:deleteComment();" title="Изтриване на този коментар" class="pull-right glyphicon glyphicon-remove"></a>
                    <b style="float:right;"></b>
                    <?php endif;?>
                </div>
                <p class="panel panel-body"><?=$comment->comment_body; ?><i class="pull-right"><?=$comment->comment_date; ?></i></p>
            </div>
            <?php endforeach; else:?>
                <p>Все още няма коментари.Напишете първият.</p>
            <?php endif;?>
            <?=form_open('blog/post'.'/'.$post_id);?>
                <h3>Добавяне на коментар</h3>
            <?= validation_errors();?>
                <input type="hidden" name="post_id" id="post_id" value="<?= $post_id; ?>" />
                    <?php if($this->ion_auth->logged_in()):
                        $user = $this->ion_auth->user()->row();?>
                        <input type="hidden" name="commentor" id="commentor" value="<?=$user->first_name;?>"  size="30" />
                        <input id="email" name="email" type="hidden" value="<?=$user->email;?>" size="30" /><br/>
                    <?php else:?>
                        <label for="commentor" class="icon icon-user">Име</label><br/>
                        <input  name="commentor" id="commentor" placeholder="Вашето име" type="text" size="30" /><br/>
                        <label for="email"  class="icon icon icon-edit">Email</label><br/>
                        <input id="email" name="email" placeholder="Вашият email" type="text" size="30" /><br/>
                    <input type="hidden" name="user_id" id="user_id" value="0" />
                    <?php endif;?>

                </p>
            <?php
            $textarea = array(
                'class' => 'form-control',
                'id' => 'type_msg',
                'name' => 'comment',
                'rows' => 5,
                'cols' => 6,
            );
            ?>

            <label for="type_msg" class="icon icon-pencil">&nbsp;Вашият коментар</label><strong style="color:#e23b33;">(на кирилица)</strong><br/>
            <?php echo form_textarea($textarea, $this->input->post('comment')); ?>
            <br />
            <input class="btn btn-primary" type="submit" id="addComment" value="Добави коментар"/>
            <input class="btn btn-warning" type="reset" id="reset" value="Изчисти"/>
            </form>
            </div>
        </div>




<?php endforeach; else:
redirect('blog');
endif;?>

