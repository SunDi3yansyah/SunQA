<?php foreach ($this->qa_libs->user() as $user): ?>
<title>Comment Question - <?php echo $this->config->item('web_name'); ?></title>
<script src="<?php echo assets_js('select2.min.js'); ?>"></script>
</head>
<body>
<?php $this->load->view('must/menu'); ?>
    <div class="container page-content">
        <h1 class="title_qa">Comment Question</h1>
        <div class="example" data-text="Question">
            <div class="grid">
                <div class="row cells6">
                    <div class="cell">
                        <img src="<?php echo pic_user($user->image) ?>" data-role="fitImage" data-format="cycle">
                    </div>
                    <div class="cell colspan5">
                        <div class="fl">
                            <h3><?php echo $user->nama ?></h3>
                            <a class="QuestionList-author" href="<?php echo base_url('user/' . $user->username); ?>"><?php echo $user->username ?></a>
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
                    <label for="description_comment">Description Comment</label>
                    <div class="input-control textarea full-size" data-role="input">
                        <?php echo form_textarea('description_comment', set_value('description_comment')); ?>
                    </div>
                    <hr>
                    <div class="form-actions">
                        <div class="fc">
                            <?php echo form_submit('submit', 'Comment Question', 'class="button success large-button"'); ?>
                            <?php echo form_reset('reset', 'Reset Field', 'class="button warning large-button"'); ?>
                            <a href="<?php echo base_url($this->uri->segment(1) .'/'. $this->uri->segment(2)); ?>" class="button primary">Back to Question <span class="mif-enter"></span></a>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach ?>