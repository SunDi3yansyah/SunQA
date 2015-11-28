<?php foreach ($record as $data): ?>
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
                        <div class="col-lg-6">
                        <?php if (validation_errors() || !empty($errors)): ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                                <?php echo (!empty($errors)?$errors:NULL); ?>
                            </div>
                        <?php endif ?>
                            <?php echo form_open($this->uri->uri_string(), 'role="form"'); ?>
                                <div class="form-group">
                                    <label>Description</label>
                                    <?php echo form_input('tag_name', $data->tag_name, 'class="form-control" autocomplete="off"'); ?>
                                </div>
                                <?php echo form_submit(NULL, 'Submit', 'class="btn btn-success"'); ?>
                                <?php echo form_reset(NULL, 'Reset', 'class="btn btn-warning"'); ?>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Other Informations
                                </div>
                                <div class="panel-body">
                                    <p>
                                        Question yang memiliki kategori <b><?php echo $data->tag_name ?></b> sebanyak
                                        <b>
                                            <?php if ($count_question == FALSE): ?>
                                                0
                                            <?php else: ?>
                                                <?php echo $count_question ?>
                                            <?php endif ?>
                                        </b>
                                    </p>
                                </div>
                            </div>
                            <div class="fc">
                                <a href="<?php echo base_url('tag/' . uri_encode($data->tag_name)) ?>" target="_blank" class="btn btn-primary btn-lg">See <?php echo $this->uri->segment(2) ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>