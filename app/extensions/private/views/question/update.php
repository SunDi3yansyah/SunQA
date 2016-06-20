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
                                    <label>Subject</label>
                                    <?php echo form_input('subject', $data->subject, 'class="form-control" autocomplete="off"') ?>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <?php
                                    foreach ($category as $cid)
                                    {
                                        $category_id[] = array(
                                            $cid->id_category => $cid->category_name,
                                            );
                                    }
                                    ?>
                                    <?php echo form_dropdown('category_id', $category_id, $data->category_id, 'class="form-control"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tag</label>
                                    <?php
                                    foreach ($qt_all as $qt_all)
                                    {
                                        $question_tag[] = array(
                                            $qt_all->id_tag => $qt_all->tag_name,
                                            );
                                    }
                                    ?>
                                    <?php echo form_dropdown('question_tag[]', $question_tag, '', 'class="form-control"  multiple="multiple"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <?php echo form_textarea('description_question', $data->description_question, 'class="form-control" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"'); ?>
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
                                        <?php if ($data->answer_id != NULL): ?>
                                            Pertanyaan ini sudah memiliki jawaban.
                                        <?php else: ?>
                                            Nampaknya sang penanya belum mendapatkan jawaban yang ia cari.
                                        <?php endif ?>
                                    </p>
                                </div>
                            </div>
                            <div class="alert alert-info">
                                Detail Question :
                                <ul>
                                    <li>Submited <b><?php echo dateHourStripe($data->question_date) ?></b></li>
                                    <li><b><?php echo $count_answer ?> Jawaban</b></li>
                                    <li><b><?php echo $count_comment ?> Komentar</b></li>
                                    <?php if (!empty($qt_current)): ?>
                                    <li><b>Tags : </b>
                                        <?php foreach ($qt_current as $qt): ?>
                                            <button type="button" class="btn btn-default btn-xs"><?php echo $qt->tag_name ?></button>
                                        <?php endforeach ?>
                                    </li>
                                    <?php endif ?>
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