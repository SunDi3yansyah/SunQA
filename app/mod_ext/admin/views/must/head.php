<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
<title><?php echo ucwords($this->uri->segment(1)); ?> - <?php echo $this->config->item('web_name'); ?></title>
<link href="<?php echo base_url($this->config->item('private_css') . 'bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url($this->config->item('private_css') . 'select2.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url($this->config->item('private_css') . 'metisMenu.min.css'); ?>" rel="stylesheet">
<?php if (isset($timelineCSS) == TRUE): ?>
<link href="<?php echo base_url($this->config->item('private_css') . 'timeline.css'); ?>" rel="stylesheet">
<?php endif ?>
<?php if (isset($dataTables) == TRUE): ?>
<link href="<?php echo base_url($this->config->item('private_css') . 'dataTables.bootstrap.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url($this->config->item('private_css') . 'dataTables.responsive.css'); ?>" rel="stylesheet">
<?php endif ?>
<?php if (isset($morrisjs) == TRUE): ?>
<link href="<?php echo base_url($this->config->item('private_css') . 'morris.css'); ?>" rel="stylesheet">
<?php endif ?>
<link href="<?php echo base_url($this->config->item('private_css') . 'font-awesome.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url($this->config->item('private_css') . 'style.css'); ?>" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand"><?php echo $this->uri->segment(1); ?> - <?php echo $this->config->item('web_name'); ?></div>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <?php foreach ($this->qa_libs->user() as $user): ?>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>
                        <?php echo $user->nama; ?>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/account'); ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/account/settings'); ?>"><i class="fa fa-gear fa-fw"></i> Settings Account</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo base_url(); ?>" target="_blank" class="primary"><i class="fa fa-external-link fa-fw"></i> Public Site</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('log/out'); ?>" class="danger"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <?php endforeach ?>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <h4><i class="fa fa-list-ul"></i> Menu</h4>
                    </li>
                    <li>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/question'); ?>"><i class="fa fa-question-circle fa-fw"></i> Questions</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/answer'); ?>"><i class="fa fa-comments fa-fw"></i> Answers</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/user'); ?>"><i class="fa fa-user fa-fw"></i> Users</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/comment'); ?>"><i class="fa fa-comment fa-fw"></i> Comments</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/vote'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i> Votes</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/category'); ?>"><i class="fa fa-tag fa-fw"></i> Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/tag'); ?>"><i class="fa fa-tags fa-fw"></i> Tags</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(''.$this->uri->segment(1).'/sessions'); ?>"><i class="fa fa-users fa-fw"></i> Sessions</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>