<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $this->uri->segment(3) ?> <?php echo $this->uri->segment(2) ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Informations
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-7">
                        <?php if (validation_errors() || !empty($errors)): ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                                <?php echo (!empty($errors)?$errors:NULL); ?>
                            </div>
                        <?php endif ?>
                            <?php echo form_open($this->uri->uri_string(), 'role="form"'); ?>
                                <div class="form-group">
                                    <label>Username</label>
                                    <?php echo form_input('username', set_value('username'), 'class="form-control" autocomplete="off"') ?>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <?php
                                    foreach ($role as $r) {
                                        $role_id[] = array(
                                            $r->id_role => $r->role_name,
                                            );
                                    }
                                    ?>
                                    <?php echo form_dropdown('role_id', $role_id, set_value('role_id'), 'class="form-control"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <?php echo form_password('password', set_value('password'), 'class="form-control"') ?>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <?php echo form_input('email', set_value('email'), 'class="form-control" autocomplete="off"') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <?php echo form_input('nama', set_value('nama'), 'class="form-control" autocomplete="off"') ?>
                                </div>
                                <div class="form-group">
                                    <label>Activated</label>
                                    <?php $activated = array('0' => 'Not Activated','1' => 'Activated'); ?>
                                    <?php echo form_dropdown('activated', $activated, set_value('activated'), 'class="form-control"'); ?>
                                </div>
                                    <label>Web</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                    <?php echo form_input('web', set_value('web'), 'class="form-control" autocomplete="off"') ?>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <?php echo form_input('lokasi', set_value('lokasi'), 'class="form-control" autocomplete="off"') ?>
                                </div>
                                <div class="form-group">
                                    <label>Bio</label>
                                    <?php echo form_textarea('bio', set_value('bio'), 'class="form-control"'); ?>
                                </div>
                                <?php echo form_submit(NULL, 'Submit', 'class="btn btn-success"'); ?>
                                <?php echo form_reset(NULL, 'Reset', 'class="btn btn-warning"'); ?>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="col-lg-5">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Other Informations
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>Tidak diperbolehkan memasukkan <b>Username</b> dan <b>E-mail</b> yang sudah ada sebelumnya.</li>
                                        <li>Gunakan kata sandi yang kuat sehingga mengurangi hal-hal yang tidak diinginkan.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>