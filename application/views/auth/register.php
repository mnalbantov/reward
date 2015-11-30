<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#"  class="active" id="register-form-link">Регистрация</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="register-form" action="<?=site_url('auth/validate_register') ?>" method="post" role="form">
                                <div class="form-group">
                                    <?= form_input('username', $this->input->post('username'), 'class="form-control" placeholder="Потребителско име" id="username" required '); ?>
                                </div>
                                <div class="form-group">
                                    <?= form_input('email', $this->input->post('email'), 'class="form-control" placeholder="Email ... няма да спамим :)" id="email" required '); ?>
                                </div>
                                <div class="form-group">
                                    <?= form_input('f_name', $this->input->post('f_name'), 'class="form-control" placeholder="Име" id="f_name" required '); ?>
                                </  div>
                                <div class="form-group">
                                    <?= form_input('l_name', $this->input->post('l_name'), 'class="form-control" placeholder="Фамилия" id="l_name" required '); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Парола">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Повтори парола">
                                </div>
                                <div class="form-group">
                                    <?= validation_errors(); ?>
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Регистрирай ме!">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>