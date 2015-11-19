<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" class="active" id="login-form-link">Вход</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="<?=site_url('login/validate') ?>" method="post" role="form" style="display: block;">
                                <div class="form-group">
                                    <?= form_input('username', $this->input->post('username'), 'class="form-control" id="username" required '); ?>
                                </div>

                                <div class="form-group">
                                    <input type="password" id="user_password" class="form-control" name="user_password" required>
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                    <label for="remember">Запомни ме</label>
                                     <p><?= validation_errors();?></p>
                                    <?php if($this->session->flashdata('message')) {echo $this->session->flashdata('message');} ?>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Влез">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="<?= site_url('login/register')?>" tabindex="5" >Нямате регистрация?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="register-form" action="<?=site_url('login/register') ?>" method="post" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Потребителско име" value="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder=" Email ...няма да спамим :)" value="">
                                </div>
                                <div class="form-group">
                                    <input type="f_name" name="f_name" id="f_name" tabindex="1" class="form-control" placeholder="Име" value="">
                                </div>
                                <div class="form-group">
                                    <input type="l_name" name="l_name" id="l_name" tabindex="1" class="form-control" placeholder="Фамилия" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Парола">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Повтори парола">
                                </div>
                                <div class="form-group">
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
</div>