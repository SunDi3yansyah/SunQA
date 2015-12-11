<?php foreach ($this->qa_libs->user() as $user): ?>
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
                                    <?php echo form_input('username', $user->username, 'class="form-control" autocomplete="off"') ?>
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
                                        <li>Tidak diperbolehkan memasukkan <b>Username</b> yang sudah ada sebelumnya.</li>
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
<?php endforeach ?>