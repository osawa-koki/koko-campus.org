<script type="text/javascript" charset="utf-8"><?php require_once(__DIR__. "/js/fx.js"); ?></script>
<script type="text/javascript" charset="utf-8">
	const TOKEN = "<?php echo TOKEN; ?>";
</script>
<div id="Z">
	<h1>koko-campus 管理者画面</h1>
	<div id="select-box">
		<select id="select">
			<option value="update-info">update-info</option>
			<option value="password">password</option>
			<option value="upload-files">upload-file</option>
			<option value="manage-subjects">manage-subjects</option>
			<option value="manage-category">manage-category</option>
		</select>
		<script type="text/javascript" charset="utf-8"><?php require_once(__DIR__. "/js/script.js"); ?></script>
	</div>
	<section id="update-info" class="show">
		<h2>update-info</h2>
		<?php require_once(__DIR__. "/html/update-info.html"); ?>
		<script type="text/javascript" charset="utf-8"><?php require_once(__DIR__. "/js/update-info.js"); ?></script>
	</section>
	<section id="password">
		<h2>password</h2>
		<?php require_once(__DIR__. "/html/password.html"); ?>
		<script type="text/javascript" charset="utf-8"><?php require_once(__DIR__. "/js/password.js"); ?></script>
	</section>
	<section id="upload-files">
		<h2>upload-files</h2>
		<?php require_once(__DIR__. "/html/upload-files.html"); ?>
		<script type="text/javascript" charset="utf-8"><?php require_once(__DIR__. "/js/upload-files.js"); ?></script>
	</section>
	<section id="manage-subjects">
		<h2>manage-subjects</h2>
		<?php require_once(__DIR__. "/html/manage-subjects.html"); ?>
		<script type="text/javascript" charset="utf-8"><?php require_once(__DIR__. "/js/manage-subjects.js"); ?></script>
	</section>
	<section id="manage-category">
		<h2>manage-category</h2>
		<?php require(__DIR__. "/html/manage-category.html"); ?>
		<script type="text/javascript" charset="utf-8"><?php require(__DIR__. "/js/manage-category.js"); ?></script>
	</section>
</div>