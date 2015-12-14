<header class="app-bar fixed-top" data-role="appbar">
    <div class="container">
        <a href="<?php echo base_url(); ?>" class="app-bar-element branding"><img src="<?php echo base_url('assets/images/qa.png'); ?>" style="height: 28px; display: inline-block; margin-right: 10px;"> <?php echo $this->config->item('web_name'); ?></a>
        <span class="app-bar-divider"></span>
        <ul class="app-bar-menu">
            <li>
                <a href="" class="dropdown-toggle"><span class="mif-windows"></span> Main Menu</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('questions'); ?>"><span class="mif-question"></span> Questions</a></li>
                    <li><a href="<?php echo base_url('questions/unanswereds'); ?>"><span class="mif-heart-broken"></span> Unanswereds</a></li>
                    <li><a href="<?php echo base_url('questions/most-view'); ?>"><span class="mif-eye"></span> Most View</a></li>
                </ul>
            </li>
            <li>
                <a href="" class="dropdown-toggle"><span class="mif-list2"></span> Outline</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('category'); ?>"><span class="mif-bookmarks"></span> Category</a></li>
                    <li><a href="<?php echo base_url('tag'); ?>"><span class="mif-tags"></span> Tags</a></li>
                </ul>
            </li>
        </ul>
        <?php if ($this->qa_libs->logged_in()): ?>
            <?php $this->load->view('must/login'); ?>
        <?php else: ?>
            <?php $this->load->view('must/not_login'); ?>
        <?php endif ?>
    </div>
</header>
