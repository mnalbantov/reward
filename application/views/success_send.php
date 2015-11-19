
<div class="container">
    <header>
        <div class="jumbotron">
            <h1>Congratulations!</h1>
        </div>
    </header>
    <div class="col-lg-10">
        <?php if($message) echo $message; ?>
    </div>
    <div class="col-md-4">
        <a href="<?=site_url('homecontroller');?>" >Израти ново съобщение </a>
    </div>
</div>