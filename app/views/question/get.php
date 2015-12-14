<?php foreach ($question as $ask): ?>
<title><?php echo $ask->subject ?> - <?php echo $this->config->item('web_name'); ?></title>
</head>
<body>
<?php $this->load->view('must/menu'); ?>
    <div class="container page-content">
        <h1 class="title_qa"><?php echo $ask->subject ?></h1>
        <div class="example" data-text="Question">
            <div class="grid">
                <div class="row cells6">
                    <div class="cell">
                        <img src="<?php echo pic_user($ask->image) ?>" data-role="fitImage" data-format="cycle">
                    </div>
                    <div class="cell colspan5">
                        <div class="fl">
                            <h3><?php echo $ask->nama ?></h3>
                            <a class="QuestionList-author" href="<?php echo base_url('user/' . $ask->username); ?>"><?php echo $ask->username ?></a>
                            <p><?php echo dateHourIcon($ask->question_date) ?></p>
                            <a href="<?php echo base_url('category/' . uri_encode($ask->category_name)); ?>" class="button danger"><span class="mif-bookmark"></span> <?php echo $ask->category_name ?></a>
                        </div>
                        <div class="fr vote">
                            <a href="#"><span class="mif-thumbs-up mif-ani-bounce"></span></a>
                            <a href="#"><span class="mif-thumbs-down mif-ani-bounce"></span></a>
                            <?php if (!empty($ask->viewers)): ?>
                                <p style="margin-right: 10px; font-size: 17px;"><i>viewers</i> <i class="mif-eye"></i> <b><?php echo $ask->viewers ?></b></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="padding10">
                <p class="bg-grayLighter padding10" style="line-height: 25px;">
                    <?php echo $ask->description_question ?>
                </p>
                <?php if (!empty($ask->question_update)): ?>
                    <small><i>Question last update on</i> <?php echo dateHourIcon($ask->question_update) ?></small>
                <?php endif ?>
                <div style="height: 3em; margin-top: 1em;">
                    <div class="fl">
                        <span class="mif-tags"></span>
                        <?php foreach ($question_tag as $qt): ?>
                            <?php if ($qt->question_id === $ask->id_question): ?>
                                <a href="<?php echo base_url('tag/' . uri_encode($qt->tag_name)); ?>"><span class="tag success"><?php echo $qt->tag_name ?></span></a>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div class="fr">
                        <?php if ($ask->user_id === $this->qa_libs->id_user()): ?>
                            <div class="dropdown-button">
                                <button class="button dropdown-toggle">Action</button>
                                <ul class="split-content d-menu" data-role="dropdown">
                                    <li><a href="<?php echo base_url($this->uri->segment(1) .'/'. $ask->url_question . '/update'); ?>"><span class="mif-pencil"></span> Update</a></li>
                                    <li><a href="<?php echo base_url($this->uri->segment(1) .'/'. $ask->url_question . '/delete'); ?>"><span class="mif-cancel"></span> Delete</a></li>
                                </ul>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <hr>
                <?php if (!empty($comment_in_question)): ?>
                    <?php foreach ($comment_in_question as $ciq): ?>
                        <ul class="numeric-list list-ac">
                            <li>
                                <strong class="no-margin-top" style="font-size: .675rem;"><?php echo $ciq->nama ?> (<a href="<?php echo base_url('user/' . $ciq->username); ?>"><?php echo $ciq->username ?></a>)</strong>
                                <hr class="bg-black">
                                <div style="font-size: .775rem;">
                                    <?php echo $ciq->description_comment ?>
                                </div>
                            </li>
                        </ul>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
        <div class="example" data-text="Answers">
            <div class="grid">
                <div class="row">
                    <div class="cell">
                        <?php if (!empty($answer)): ?>
                        <ul class="numeric-list large-bullet list-ac">
                            <?php foreach ($answer as $anw): ?>
                            <li>
                                <strong class="no-margin-top"><?php echo $anw->nama ?> (<a href="<?php echo base_url('user/' . $anw->username); ?>"><?php echo $anw->username ?></a>)</strong>
                                <hr class="bg-orange">
                                <div>
                                    <?php echo $anw->description_answer ?>
                                </div>
                                <?php if (!empty($this->qa_libs->comment_in_answer($anw->id_answer))): ?>
                                    <?php foreach ($this->qa_libs->comment_in_answer($anw->id_answer) as $cia): ?>
                                    <ul class="numeric-list default-bullet list-ac">
                                        <li>
                                            <strong class="no-margin-top" style="font-size: .675rem;"><?php echo $cia->nama ?> (<a href="<?php echo base_url('user/' . $cia->username); ?>"><?php echo $cia->username ?></a>)</strong>
                                            <hr class="bg-black">
                                            <div style="font-size: .775rem;">
                                                <?php echo $cia->description_answer ?>
                                            </div>
                                        </li>
                                    </ul>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        <?php endif ?>
                        <?php echo form_open($this->uri->uri_string()); ?>
                        <h4 class="text-light">Answer</h4>
                        <hr class="thin">
                        <br>
                        <?php if (validation_errors() || !empty($errors)): ?>
                            <div class="padding10 bg-red fg-white text-accent">
                                <?php echo validation_errors(); ?>
                                <?php echo (!empty($errors)?$errors:NULL); ?>
                            </div>
                            <br>
                        <?php endif ?>
                        <div class="input-control textarea full-size" data-role="input" data-text-auto-resize="true" data-text-max-height="200">
                            <?php echo form_textarea('description_answer', set_value('description_answer')); ?>
                        </div>
                        <br>
                        <br>
                        <div class="form-actions">
                            <div class="fc">
                                <?php echo form_submit('submit', 'Answer', 'class="button success large-button"'); ?>
                                <?php echo form_reset('reset', 'Reset', 'class="button warning large-button"'); ?>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>