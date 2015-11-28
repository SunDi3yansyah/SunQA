<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $this->uri->segment(2) ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success">
                Welcome to pages Administrator site of <?php echo $this->config->item('web_name') ?>,
                you are logged in as
                <?php foreach ($this->qa_libs->user() as $user): ?>
                    <b><?php echo $user->username; ?></b>.
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-question-circle fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php if ($count_questions == FALSE): ?>
                                    0
                                <?php else: ?>
                                    <?php echo $count_questions; ?>
                                <?php endif ?>
                            </div>
                            <div>Questions</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(''.$this->uri->segment(1).'/question'); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php if ($count_answers == FALSE): ?>
                                    0
                                <?php else: ?>
                                    <?php echo $count_answers; ?>
                                <?php endif ?>
                            </div>
                            <div>Answers</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(''.$this->uri->segment(1).'/answer'); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php if ($count_users == FALSE): ?>
                                    0
                                <?php else: ?>
                                    <?php echo $count_users; ?>
                                <?php endif ?>
                            </div>
                            <div>Users</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(''.$this->uri->segment(1).'/user'); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comment fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php if ($count_comments == FALSE): ?>
                                    0
                                <?php else: ?>
                                    <?php echo $count_comments; ?>
                                <?php endif ?>
                            </div>
                            <div>Comments</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(''.$this->uri->segment(1).'/comment'); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Statistics System Flow 
                    <div class="pull-right">
                        <button type="button" class="btn btn-default btn-xs">Refresh</button>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="morris-area-chart"></div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Session Record
                    <div class="pull-right">
                        <button type="button" class="btn btn-default btn-xs">Refresh</button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="qa-dataTables">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>IP Address</th>
                                            <th>Timestamp</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Another Count Table
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/category'); ?>" class="list-group-item">
                            <i class="fa fa-comment fa-fw"></i> <?php echo $count_category; ?> Category
                        </a>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/role'); ?>" class="list-group-item">
                            <i class="fa fa-group fa-fw"></i> There are only <?php echo $count_role; ?> roles
                        </a>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/session_'); ?>" class="list-group-item">
                            <i class="fa fa-users fa-fw"></i> <?php echo $count_session; ?> Session
                        </a>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/tag'); ?>" class="list-group-item">
                            <i class="fa fa-tags fa-fw"></i> <?php echo $count_tag; ?> Tag
                        </a>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/vote'); ?>" class="list-group-item">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $count_vote; ?> Vote
                        </a>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Statistics User
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                    <a href="<?php echo base_url(''.$this->uri->segment(1).'/user'); ?>" class="btn btn-default btn-block">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>