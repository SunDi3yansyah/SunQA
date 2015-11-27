<?php foreach ($this->qa_libs->user() as $user): ?>
	<li class="pure-menu-item"><a class="pure-menu-link"><?php echo $user->username; ?></a></li>
<?php endforeach ?>