<div id="wrapper">


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Качване на файл
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url('auth/index'); ?>">Главно табло</a>
                        </li>
                        <li>
                            <i class="glyphicon glyphicon-picture"></i> <a href="<?= base_url('blog/add_post'); ?>">Добавяне на статия</a>
                        </li>
                        <li class="active">
                            <i class="glyphicon glyphicon-picture"></i> Качване на файл
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <?php echo $error; ?>
            <?php echo form_open_multipart('blog/do_upload'); ?>
            <input type="file" name="pic_file" />
            <br/><br/>
            <input type="submit" value="Качи" class="btn btn-primary" />
            </form>

        </div>

    </div>
</div>


