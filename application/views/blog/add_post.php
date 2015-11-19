<div class="jumbotron">
    <h1>Добавяне на статия</h1>
    <p>Добавете нова статия като използвате формата по-долу.</p>
</div>
<?= form_open('blog/add_post');?>


<div class="col-lg-6">
    <div class="validation">
    </div>
    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Задължителни полета</strong></div>


    <div class="form-group">
        <label for="InputSubject">Заглавие</label>
        <div class="input-group">
            <?= form_input('InputSubject', $this->input->post('InputSubject'), 'class="form-control" id="InputSubject" required '); ?>
            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        </div>
        <?= form_error('InputSubject') ?>
    </div>

    <div class="form-group">
        <label for="InputMessage">Статия</label>
        <div class="input-group">
            <?= form_textarea('InputPost', $this->input->post('InputPost'), 'class="form-control" id="InputPost" " required '); ?>
            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        </div>
        <?= form_error('InputPost') ?>
    </div>
    <?php if ($this->ion_auth->logged_in()):
        $user = $this->ion_auth->user()->row();?>
    <input type="hidden" name="user_id" id="commentor" value="<?php echo $user->id; ?>" type="text" />
    <?php endif;?>
    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
    <input type="submit" name="submit" id="submit" value="Изпрати" class="btn btn-info pull-right">

</div>

<a href="<?=site_url('blog/upload');?>"class="btn btn-primary">Качи снимка</a>
<br/><br/>
<div class="col-lg-offset-2 pull-right">

    <?php if($images):?>
        <p>Изберете картинка,ако желаете.</p>
       <?php foreach ($images as $image ):
        ?>
            <div class="row">
                <input id="<?=$image['url']?>" name="pic"  value="<?=$image['thumb_url']?>" type="radio">
                <label for="<?=$image['url']?>"> <img src="<?=$image['thumb_url']?>" alt=""></label>
            </div>
    <?php endforeach; else:?>
        <p>Нямате качени снимки.</p>
    <?php endif;?>
</div>
<?= form_close()?>
