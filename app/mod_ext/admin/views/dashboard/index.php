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
            <div class="panel panel-random">
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
            <div class="panel panel-random">
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
            <div class="panel panel-random">
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
            <div class="panel panel-random">
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
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-random">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tag fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php if ($count_categories == FALSE): ?>
                                    0
                                <?php else: ?>
                                    <?php echo $count_categories; ?>
                                <?php endif ?>
                            </div>
                            <div>Categories</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(''.$this->uri->segment(1).'/category'); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-random">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tags fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php if ($count_tags == FALSE): ?>
                                    0
                                <?php else: ?>
                                    <?php echo $count_tags; ?>
                                <?php endif ?>
                            </div>
                            <div>Tags</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(''.$this->uri->segment(1).'/tag'); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-random">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php if ($count_votes == FALSE): ?>
                                    0
                                <?php else: ?>
                                    <?php echo $count_votes; ?>
                                <?php endif ?>
                            </div>
                            <div>Votes</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(''.$this->uri->segment(1).'/vote'); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-random">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php if ($count_sessions == FALSE): ?>
                                    0
                                <?php else: ?>
                                    <?php echo $count_sessions; ?>
                                <?php endif ?>
                            </div>
                            <div>Session</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(''.$this->uri->segment(1).'/sessions'); ?>">
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
        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Statistics Data
                </div>
                <div class="panel-body">
                    <div id="morris-area-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Session Record
                    <div class="pull-right">
                        <button type="button" id="fnReloadAjax" class="btn btn-success btn-xs">Refresh</button>
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
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Information Server
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Database</td>
                                    <td><?php echo $this->db->version(); ?></td>
                                </tr>
                                <tr>
                                    <td>Driver</td>
                                    <td><?php echo $this->db->platform(); ?></td>
                                </tr>
                                <tr>
                                    <td>Gatway Interface</td>
                                    <td><?php echo $_SERVER['GATEWAY_INTERFACE']; ?></td>
                                </tr>
                                <tr>
                                    <td>IP Server</td>
                                    <td><?php echo $_SERVER['SERVER_ADDR']; ?></td>
                                </tr>
                                <tr>
                                    <td>Server Name</td>
                                    <td><?php echo $_SERVER['SERVER_NAME']; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">Web Server</td>
                                    <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
                                </tr>
                                <tr>
                                    <td>Protocol</td>
                                    <td><?php echo $_SERVER['SERVER_PROTOCOL']; ?></td>
                                </tr>
                                <tr>
                                    <td>Document Root</td>
                                    <td><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td>
                                </tr>
                                <tr>
                                    <td>Connection</td>
                                    <td><?php echo $_SERVER['HTTP_CONNECTION']; ?></td>
                                </tr>
                                <tr>
                                    <td>User Agent</td>
                                    <td><?php echo $_SERVER['HTTP_USER_AGENT']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
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