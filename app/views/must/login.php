<?php foreach ($this->qa_libs->user() as $user): ?>
<div class="app-bar-element place-right">
	<img src="<?php echo pic_user($user->image); ?>" class="pic-user">
    <a class="dropdown-toggle fg-white"><?php echo $user->username; ?></a>
	    <ul class="app-bar-drop-container d-menu place-right" data-role="dropdown">
	        <li><a href="<?php echo base_url('create'); ?>"><span class="mif-question"></span> New Question</a></li>
	        <li class="divider"></li>
	        <li><a href="<?php echo base_url('user/' . $user->username); ?>"><span class="mif-user-check"></span> My Profile</a></li>
	        <li><a href="<?php echo base_url('auth/account'); ?>"><span class="mif-user"></span> Account</a></li>
	        <li><a href="<?php echo base_url('log/out'); ?>" class="fg-magenta"><span class="mif-exit"></span> Logout</a></li>
	        <?php if ($user->role_id == 1): ?>
	        	<li><a href="<?php echo base_url('admin/dashboard'); ?>" class="fg-emerald"><span class="mif-security"></span> Admin</a></li>
	        <?php endif ?>
	    </ul>
</div>
<?php endforeach ?>