<?php foreach ($this->qa_libs->user() as $ask): ?>
<title>Create New Question - <?php echo $this->config->item('web_name'); ?></title>
<script src="<?php echo assets_js('select2.min.js'); ?>"></script>
</head>
<body>
<?php $this->load->view('must/menu'); ?>
    <div class="container page-content">
        <h1 class="title_qa">Create New Question</h1>
        <div class="example" data-text="Question">
            <div class="grid">
                <div class="row cells6">
                    <div class="cell">
                        <img src="<?php echo pic_user($ask->image) ?>" data-role="fitImage" data-format="cycle">
                    </div>
                    <div class="cell colspan5">
                        <div class="fl">
                            <h3><?php echo $ask->nama ?></h3>
                            <a class="QuestionList-author" href="<?php echo base_url('user/' . $ask->username); ?>">@<?php echo $ask->username ?></a>
                            <p><?php echo dateHourIcon(date('Y:m:d H:i:s')) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="padding10" style="line-height: 25px;">
                <?php if (validation_errors()): ?>
                    <div class="errors padding10 bg-red fg-white text-accent">
                        <?php echo validation_errors(); ?>
                    </div>
                    <br>
                <?php endif ?>
                <?php echo form_open($this->uri->uri_string()); ?>
                    <label for="subject">Subject Question</label>
                    <div class="input-control text full-size">
                        <?php echo form_input('subject', set_value('subject'), 'autocomplete="off"'); ?>
                    </div>
                    <label for="description_question">Description Question</label>
                    <div class="input-control textarea full-size" data-role="input">
                        <?php echo form_textarea('description_question', set_value('description_question')); ?>
                    </div>
                    <div class="flex-grid">
                        <div class="row">
                            <div class="cell colspan4">
                                <label for="category_id">Category Question</label>
                                <div class="input-control full-size" data-role="select">
                                    <?php foreach ($category as $cat): ?>
                                        <?php $options_cat[] = array($cat->id_category => $cat->category_name); ?>
                                    <?php endforeach ?>
                                    <?php echo form_dropdown('category_id', $options_cat); ?>
                                </div>
                            </div>
                            <div class="cell colspan8">
                                <label for="id_tag">Tags Question</label>
                                <div class="input-control full-size" data-role="select" data-multiple="true">
                                    <?php foreach ($tag as $tag): ?>
                                        <?php $options_tag[] = array($tag->id_tag => $tag->tag_name); ?>
                                    <?php endforeach ?>
                                    <?php echo form_dropdown('id_tag[]', $options_tag, '', 'multiple="multiple"'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-actions">
                        <div class="fc">
                            <?php echo form_submit('submit', 'Create Question', 'class="button success large-button"'); ?>
                            <?php echo form_reset('reset', 'Reset Field', 'class="button warning large-button"'); ?>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach ?>