<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $this->uri->segment(2) ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Data <?php echo $this->uri->segment(2) ?>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                        <li><a href="#question" data-toggle="tab">Question</a></li>
                        <li><a href="#answer" data-toggle="tab">Answer</a></li>
                        <li><a href="#comment" data-toggle="tab">Comment</a></li>
                        <li><a href="#vote" data-toggle="tab">Vote</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="profile">
                        <?php foreach ($this->qa_libs->user() as $user): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 25%;">Atribut</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Username</td>
                                            <td><?php echo $user->username ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td><?php echo $user->nama ?></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><i>Hide</i></td>
                                        </tr>
                                        <tr>
                                            <td>Activated</td>
                                            <td>
                                                <?php if ($user->activated === '1'): ?>
                                                    Activated
                                                <?php else: ?>
                                                    Not Activated
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><a href="mailto:<?php echo $user->email ?>"><?php echo $user->email ?></a></td>
                                        </tr>
                                        <tr>
                                            <td>Web</td>
                                            <td><a href="http://<?php echo $user->web ?>" target="_blank"><?php echo $user->web ?></a></td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi</td>
                                            <td><?php echo $user->lokasi ?></td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td><?php echo $user->role_name ?></td>
                                        </tr>
                                        <tr>
                                            <td>Registered</td>
                                            <td><?php echo dateHourIcon($user->user_date) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Login</td>
                                            <td><?php echo dateHourIcon($user->last_login) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last IP</td>
                                            <td><?php echo $user->last_ip ?></td>
                                        </tr>
                                        <tr>
                                            <td>Modified</td>
                                            <td><?php echo dateHourIcon($user->modified) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Lost Password</td>
                                            <td><?php if ($user->lost_password != NULL): ?>
                                                    <?php echo $user->lost_password ?>
                                                <?php else: ?>
                                                    <i>Nothing</i>
                                                <?php endif ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Bio
                                </div>
                                <div class="panel-body">
                                    <p><?php echo $user->bio ?></p>
                                </div>
                            </div>
                            <a href="<?php echo base_url($this->uri->segment(1) . '/account/settings'); ?>" class="btn btn-outline btn-primary">Update Profile</a>
                            <a href="<?php echo base_url($this->uri->segment(1) . '/account/settings/unique'); ?>" class="btn btn-outline btn-info">Change Username or Email</a>
                            <a href="<?php echo base_url($this->uri->segment(1) . '/account/settings/passwd'); ?>" class="btn btn-outline btn-warning">Change Password</a>
                        <?php endforeach ?>
                        </div>
                        <div class="tab-pane fade" id="question">
                        <?php foreach ($question as $question): ?>
                            <div>
                                <h4>
                                    <a href="<?php echo base_url('question/' . $question->url_question) ?>"><?php echo $question->subject ?></a>
                                </h4>
                                <i>Created</i> <?php echo dateHourIcon($question->question_date) ?>
                                <i>Updated</i> <?php echo dateHourIcon($question->question_update) ?>
                                <?php if ($question->viewers != NULL): ?>
                                    <i class="fa fa-eye fa-fw"></i> <?php echo $question->viewers ?>
                                <?php else: ?>
                                    <i class="fa fa-eye-slash fa-fw"></i> Not Yet Viewers
                                <?php endif ?>
                                <br>
                                <?php if ($question->answer_id != NULL): ?>
                                    <i class="fa fa-check fa-fw success"></i> Answered
                                <?php else: ?>
                                    <i class="fa fa-times fa-fw danger"></i> Not Selected Answer
                                <?php endif ?>
                                <br>
                                <i>Category</i> <i class="fa fa-tag fa-fw"></i> <?php echo $question->category_name ?>
                                <i>Tags</i> <i class="fa fa-tags fa-fw"></i>
                                <?php foreach ($question_tag as $qt): ?>
                                    <?php if ($qt->question_id === $question->id_question): ?>
                                        <button type="button" class="btn btn-default btn-xs"><?php echo $qt->tag_name ?></button>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>
                            <hr>
                        <?php endforeach ?>
                        </div>
                        <div class="tab-pane fade" id="answer">
                        <?php foreach ($answer as $answer): ?>
                            <div>
                                <h4>
                                    <a href="<?php echo base_url('question/' . $answer->url_question) ?>"><?php echo $answer->subject ?></a>
                                </h4>
                                <i>Answer on</i> <?php echo dateHourIcon($answer->answer_date) ?>
                                <?php if (!empty($answer->answer_update)): ?>
                                    <i>Updated</i> <?php echo dateHourIcon($answer->answer_update) ?>
                                <?php endif ?>
                                <p><?php echo qa_remove_html(qa_str_limit($answer->description_answer, 250)) ?></p>
                            </div>
                            <hr>
                        <?php endforeach ?>
                        </div>
                        <div class="tab-pane fade" id="comment">
                        <?php if (!empty($comment_question)): ?>
                            <h3>Comment in Question</h3>
                            <?php foreach ($comment_question as $cq): ?>
                                <div>
                                    <h4>
                                        <a href="<?php echo base_url('question/' . $cq->url_question) ?>"><?php echo $cq->subject ?></a>
                                    </h4>
                                    <i>Comment on</i> <?php echo dateHourIcon($cq->comment_date) ?>
                                    <?php if (!empty($cq->comment_update)): ?>
                                        <i>Updated</i> <?php echo dateHourIcon($cq->comment_update) ?>
                                    <?php endif ?>
                                    <i>Comment in</i>
                                    <?php if ($cq->comment_in === 'Question'): ?>
                                        <span class="btn btn-info btn-xs"><i class="fa fa-question-circle"></i> <?php echo $cq->comment_in ?></span>
                                    <?php else: ?>
                                        <span class="btn btn-success btn-xs"><i class="fa fa-comment"></i> <?php echo $cq->comment_in ?></span>
                                    <?php endif ?>
                                    <p><?php echo qa_remove_html(qa_str_limit($cq->description_comment, 250)) ?></p>
                                </div>
                                <hr>
                            <?php endforeach ?>
                        <?php endif ?>
                        <?php if (!empty($comment_answer)): ?>
                            <h3>Comment in Answer</h3>
                            <?php foreach ($comment_answer as $ca): ?>
                                <div>
                                    <h4>
                                        <a href="<?php echo base_url('question/' . $ca->url_question) ?>"><?php echo $ca->subject ?></a>
                                    </h4>
                                    <i>Comment on</i> <?php echo dateHourIcon($ca->comment_date) ?>
                                    <?php if (!empty($ca->comment_update)): ?>
                                        <i>Updated</i> <?php echo dateHourIcon($ca->comment_update) ?>
                                    <?php endif ?>
                                    <i>Comment in</i>
                                    <?php if ($ca->comment_in === 'Question'): ?>
                                        <span class="btn btn-info btn-xs"><i class="fa fa-question-circle"></i> <?php echo $ca->comment_in ?></span>
                                    <?php else: ?>
                                        <span class="btn btn-success btn-xs"><i class="fa fa-comment"></i> <?php echo $ca->comment_in ?></span>
                                    <?php endif ?>
                                    <p><?php echo qa_remove_html(qa_str_limit($ca->description_comment, 250)) ?></p>
                                </div>
                                <hr>
                            <?php endforeach ?>
                        <?php endif ?>
                        </div>
                        <div class="tab-pane fade" id="vote">
                        <?php if (!empty($vote_question)): ?>
                            <h3>Vote in Question</h3>
                            <?php foreach ($vote_question as $vq): ?>
                                <div>
                                    <h4>
                                        <a href="<?php echo base_url('question/' . $vq->url_question) ?>"><?php echo $vq->subject ?></a>
                                        <?php if ($vq->vote_for === 'Up'): ?>
                                            <button type="button" class="btn btn-success btn-circle btn-xl"><i class="fa fa-thumbs-up"></i></button>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-danger btn-circle btn-xl"><i class="fa fa-thumbs-down"></i></button>
                                        <?php endif ?>
                                    </h4>
                                    <i>Vote on</i> <?php echo dateHourIcon($vq->vote_date) ?>
                                    <?php if (!empty($vq->vote_update)): ?>
                                        <i>Updated</i> <?php echo dateHourIcon($vq->vote_update) ?>
                                    <?php endif ?>
                                    <i>Vote in</i>
                                    <?php if ($vq->vote_in === 'Question'): ?>
                                        <span class="btn btn-info btn-xs"><i class="fa fa-question-circle"></i> <?php echo $vq->vote_in ?></span>
                                    <?php else: ?>
                                        <span class="btn btn-success btn-xs"><i class="fa fa-comment"></i> <?php echo $vq->vote_in ?></span>
                                    <?php endif ?>
                                </div>
                                <hr>
                            <?php endforeach ?>
                        <?php endif ?>
                        <?php if (!empty($vote_answer)): ?>
                            <h3>Vote in Answer</h3>
                            <?php foreach ($vote_answer as $va): ?>
                                <div>
                                    <h4>
                                        <a href="<?php echo base_url('question/' . $va->url_question) ?>"><?php echo $va->subject ?></a>
                                        <?php if ($va->vote_for === 'Up'): ?>
                                            <button type="button" class="btn btn-success btn-circle btn-xl"><i class="fa fa-thumbs-up"></i></button>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-danger btn-circle btn-xl"><i class="fa fa-thumbs-down"></i></button>
                                        <?php endif ?>
                                    </h4>
                                    <i>Vote on</i> <?php echo dateHourIcon($va->vote_date) ?>
                                    <?php if (!empty($va->vote_update)): ?>
                                        <i>Updated</i> <?php echo dateHourIcon($va->vote_update) ?>
                                    <?php endif ?>
                                    <i>Vote in</i>
                                    <?php if ($va->vote_in === 'Question'): ?>
                                        <span class="btn btn-info btn-xs"><i class="fa fa-question-circle"></i> <?php echo $va->vote_in ?></span>
                                    <?php else: ?>
                                        <span class="btn btn-success btn-xs"><i class="fa fa-comment"></i> <?php echo $va->vote_in ?></span>
                                    <?php endif ?>
                                </div>
                                <hr>
                            <?php endforeach ?>
                        <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>