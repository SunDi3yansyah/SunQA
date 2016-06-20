<?php foreach ($record_join as $data): ?>
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
                        <div class="col-lg-8">
                        <?php if (validation_errors()): ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php endif ?>
                            <?php echo form_open($this->uri->uri_string(), 'role="form"'); ?>
                                <div class="form-group">
                                    <label>Description</label>
                                    <?php echo form_textarea('description_answer', $data->description_answer, 'class="form-control" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"'); ?>
                                </div>
                                <?php echo form_submit(NULL, 'Submit', 'class="btn btn-success"'); ?>
                                <?php echo form_reset(NULL, 'Reset', 'class="btn btn-warning"'); ?>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Other Informations
                                </div>
                                <div class="panel-body">
                                    <p>
                                        Jawaban ini ditujukan untuk pertanyaan <b><?php echo $data->subject ?></b>
                                    </p>
                                </div>
                            </div>
                            <div class="alert alert-info">
                                Detail Author :
                                <ul>
                                    <li>Submited : <b><?php echo dateHourStripe($data->answer_date) ?></b></li>
                                    <li>Username : <b><?php echo $data->username ?></b></li>
                                    <li>Nama : <b><?php echo $data->nama ?></b></li>
                                    <li>E-mail : <b><a href="mailto:<?php echo $data->email ?>"><?php echo $data->email ?></a></b></li>
                                </ul>
                            </div>
                            <div class="fc">
                                <a href="<?php echo base_url('question/' . $data->url_question) ?>" target="_blank" class="btn btn-primary btn-lg">See <?php echo $this->uri->segment(2) ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>