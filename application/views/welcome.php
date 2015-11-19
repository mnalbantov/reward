
<div class="container">
    <header>
        <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>This is my first application for Reward Gateway  :) </p>

        </div>
    </header>
    <div class="row">


        <?= form_open('homecontroller/contact');?>
            <div class="col-lg-6">
                <?php if($message)
                    echo $message;
                ?>


                <div class="validation">
                </div>
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Задължителни полета</strong></div>
                <div class="form-group">
                    <label for="InputName">Вашето име</label>
                    <div class="input-group">
                       <!-- <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" >-->
                        <?= form_input('InputName', $this->input->post('InputName'), 'class="form-control" id="InputName" minlength="3" required'); ?>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    <?= form_error('InputName') ?>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Вашият Email </label>
                    <div class="input-group">
                        <?= form_input('InputEmail', $this->input->post('InputEmail'), 'class="form-control" id="InputEmail" required '); ?>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    <?= form_error('InputEmail') ?>
                </div>
                <div class="form-group">
                    <label for="InputSubject">Заглавие</label>
                    <div class="input-group">
                        <?= form_input('InputSubject', $this->input->post('InputSubject'), 'class="form-control" id="InputSubject" required '); ?>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    <?= form_error('InputSubject') ?>
                </div>
                <div class="form-group">
                    <label for="InputSubject">Телефон</label>
                    <div class="input-group">
                        <?= form_input('InputPhone', $this->input->post('InputPhone'), 'class="form-control" id="InputPhone" required '); ?>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    <?= form_error('InputPhone') ?>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Съобщение</label>
                    <div class="input-group">
                        <?= form_textarea('InputMessage', $this->input->post('InputMessage'), 'class="form-control" id="InputMessage" required '); ?>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    <?= form_error('InputMessage') ?>
                </div>
                <div class="g-recaptcha"   name="catpcha-g"  data-sitekey="6LdXwxATAAAAAOVHEcYpN-_DPXXOSG1OTUGJx5wp"></div>
                <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                <input type="submit" name="submit" id="submit" value="Изпрати" class="btn btn-info pull-right">

            </div>
        </form>

    </div>



