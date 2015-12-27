<?php foreach ($user as $user): ?>
<title><?php echo $user->nama ?> - <?php echo $this->config->item('web_name'); ?></title>
<link rel="stylesheet" href="<?php echo assets_css('style-nested.css'); ?>">
</head>
<body>
<?php $this->load->view('must/menu'); ?>
    <div class="container page-content" style="padding-top: 100px;">
        <div class="warapper-border" data-text="<?php echo $user->username ?>">
            <div class="grid">
                <div class="row cells6">
                    <div class="cell">
                        <img src="<?php echo pic_user($user->image) ?>" data-role="fitImage" data-format="cycle">
                    </div>
                    <div class="cell colspan5">
                        <div class="fl">
                            <h3><?php echo $user->nama ?></h3> <span class="tag info"><span class="mif-bookmark"></span> <?php echo $user->role_name ?></span>
                            <span class="mif-user"></span> <a class="QuestionList-author" href="<?php echo base_url('user/' . $user->username); ?>"><?php echo $user->username ?></a>
                            ─
                            <span class="mif-mail"></span> <?php echo mailto($user->email, NULL, 'class="QuestionList-author"') ?>
                            <p>Registered <?php echo dateHourIcon($user->user_date) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($user->bio)): ?>
            <div class="padding10">
                <p class="bg-grayLighter padding10" style="line-height: 25px;">
                    <?php echo $user->bio ?>
                </p>
            </div>
            <?php endif ?>
        </div>
        <div class="tabcontrol2" data-role="tabcontrol">
            <ul class="tabs">
                <li><a href="#Question">Questions</a></li>
                <li><a href="#Answers">Answers</a></li>
                <li><a href="#Comments">Comments</a></li>
                <li><a href="#Votes">Votes</a></li>
            </ul>
            <div class="frames">
                <div class="frame" id="Question">
                <?php if (!empty($question)): ?>
                <?php foreach ($question as $question): ?>
                    <section class="QuestionList">
                        <header class="QuestionList-header">
                            <img class="QuestionList-avatar" alt="" height="48" width="48" src="<?php echo pic_user($question->image) ?>">
                            <h3 class="QuestionList-title"><a href="<?php echo base_url('question/' . $question->url_question) ?>"><?php echo $question->subject ?></a></h3>
                            <p class="QuestionList-meta">
                                By <a class="QuestionList-author" href="<?php echo base_url('user/' . $question->username); ?>"><?php echo $question->nama ?></a> under <a class="QuestionList-category QuestionList-category-js" href="<?php echo base_url('category/'. uri_encode($question->category_name)) ?>"><?php echo $question->category_name ?></a> <?php echo dateHourIcon($question->question_date) ?> <span class="mif-bubble icon"></span> <?php echo $this->qa_model->count_where('answer', array('question_id' => $question->id_question)) ?> Answers
                            </p>
                        </header>
                        <div class="fl">
                            <span class="mif-tags"></span>
                            <?php foreach ($question_tag as $qt): ?>
                                <?php if ($qt->question_id === $question->id_question): ?>
                                    <a href="<?php echo base_url('tag/' . uri_encode($qt->tag_name)); ?>"><span class="tag success"><?php echo $qt->tag_name ?></span></a>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </section>
                <?php endforeach ?>
                <?php else: ?>
                    <?php $this->load->view('independent/panel_empty'); ?>
                <?php endif ?>
                </div>
                <div class="frame" id="Answers">
                <?php if (!empty($answer)): ?>
                <?php foreach ($answer as $answer): ?>
                    <section class="QuestionList">
                        <header class="QuestionList-header">
                            <img class="QuestionList-avatar" alt="" height="48" width="48" src="<?php echo pic_user($answer->image) ?>">
                            <h3 class="QuestionList-title"><a href="<?php echo base_url('question/' . $answer->url_question) ?>"><?php echo $answer->subject ?></a></h3>
                            <p class="QuestionList-meta">
                                By <a class="QuestionList-author" href="<?php echo base_url('user/' . $answer->username); ?>"><?php echo $answer->nama ?></a> under <a class="QuestionList-category QuestionList-category-js" href="<?php echo base_url('category/'. uri_encode($answer->category_name)) ?>"><?php echo $answer->category_name ?></a> <?php echo dateHourIcon($answer->answer_date) ?> <span class="mif-bubble icon"></span> <?php echo $this->qa_model->count_where('comment', array('answer_id' => $answer->id_answer)) ?> Comments
                            </p>
                        </header>
                    </section>
                <?php endforeach ?>
                <?php else: ?>
                    <?php $this->load->view('independent/panel_empty'); ?>
                <?php endif ?>
                </div>
                <div class="frame" id="Comments">
                    <div class="tabcontrol2" data-role="tabcontrol">
                        <ul class="tabs">
                            <li><a href="#CIQ">Comment in Question</a></li>
                            <li><a href="#CIA">Comment in Answer</a></li>
                        </ul>
                        <div class="frames">
                            <div class="frame" id="CIQ">
                                <?php if (!empty($comment_question)): ?>
                                <?php foreach ($comment_question as $cq): ?>
                                    <section class="QuestionList">
                                        <header class="QuestionList-header">
                                            <h3 class="QuestionList-title"><a href="<?php echo base_url('question/' . $cq->url_question) ?>"><?php echo $cq->subject ?></a></h3>
                                            <p class="QuestionList-meta">
                                                <?php echo dateHourIcon($cq->comment_date) ?>
                                            </p>
                                        </header>
                                    </section>
                                <?php endforeach ?>
                                <?php else: ?>
                                    <?php $this->load->view('independent/panel_empty'); ?>
                                <?php endif ?>
                            </div>
                            <div class="frame" id="CIA">
                                <?php if (!empty($comment_answer)): ?>
                                <?php foreach ($comment_answer as $ca): ?>
                                    <section class="QuestionList">
                                        <header class="QuestionList-header">
                                            <h3 class="QuestionList-title"><a href="<?php echo base_url('question/' . $ca->url_question) ?>"><?php echo $ca->subject ?></a></h3>
                                            <p class="QuestionList-meta">
                                                <?php echo dateHourIcon($ca->comment_date) ?>
                                            </p>
                                        </header>
                                    </section>
                                <?php endforeach ?>
                                <?php else: ?>
                                    <?php $this->load->view('independent/panel_empty'); ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="frame" id="Votes">
                    <div class="tabcontrol2" data-role="tabcontrol">
                        <ul class="tabs">
                            <li><a href="#VIQ">Vote in Question</a></li>
                            <li><a href="#VIA">Vote in Answer</a></li>
                        </ul>
                        <div class="frames">
                            <div class="frame" id="VIQ">
                                <?php if (!empty($vote_question)): ?>
                                <?php foreach ($vote_question as $vq): ?>
                                    <section class="QuestionList">
                                        <header class="QuestionList-header">
                                            <h3 class="QuestionList-title"><a href="<?php echo base_url('question/' . $vq->url_question) ?>"><?php echo $vq->subject ?></a></h3>
                                            <p class="QuestionList-meta">
                                                <?php echo dateHourIcon($vq->vote_date) ?>
                                            </p>
                                        </header>
                                    </section>
                                <?php endforeach ?>
                                <?php else: ?>
                                    <?php $this->load->view('independent/panel_empty'); ?>
                                <?php endif ?>
                            </div>
                            <div class="frame" id="VIA">
                                <?php if (!empty($vote_answer)): ?>
                                <?php foreach ($vote_answer as $va): ?>
                                    <section class="QuestionList">
                                        <header class="QuestionList-header">
                                            <h3 class="QuestionList-title"><a href="<?php echo base_url('question/' . $va->url_question) ?>"><?php echo $va->subject ?></a></h3>
                                            <p class="QuestionList-meta">
                                                <?php echo dateHourIcon($va->vote_date) ?>
                                            </p>
                                        </header>
                                    </section>
                                <?php endforeach ?>
                                <?php else: ?>
                                    <?php $this->load->view('independent/panel_empty'); ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>