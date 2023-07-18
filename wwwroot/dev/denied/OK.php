<script type="text/javascript" charset="utf-8">
	let section_hold = false; // アラートプロンプト操作時にセクションを非表示にしないように
	const TOKEN = "<?php echo TOKEN; ?>";
</script>
<main>
	<section id="update-info">
		<h2>update-info</h2>
		<div>
			<div id="update-info_dt_box">
				<select id="update-info_dt_select-year"></select>年
				<select id="update-info_dt_select-month"></select>月
				<select id="update-info_dt_select-day"></select>日
				<input id="update-info_dt-button" type="button" value="検索" />
			</div>
			<div id="update-info_pointing-date"></div>
			<div id="update-info_containing-box"></div>
		</div>
		<script type="text/javascript" charset="utf-8"><?php require(__DIR__. "/js/update-info.js"); ?></script>
	</section>
	<section id="link">
		<h2>リンク</h2>
		<div>
			<form id="link-form" method="post">
				<input type="hidden" name="token" value="<?php echo TOKEN; ?>" />
				<input type="submit" value="pw" data-direction="pw" />
			</form>
			<script type="text/javascript" charset="utf-8">
				"use strict";
				(() => {
					const fm =  document.getElementById("link-form");
					Array.from(document.getElementById("link-form").querySelectorAll("input[type=submit]")).forEach(e => {
						e.addEventListener("click", function(event) {
							event.preventDefault();
							fm.action = `../${this.dataset.direction}/`;
							fm.submit();
						});
					});
				})();
			</script>
		</div>
	</section>
</main>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const
			sections = Array.from(document.getElementsByTagName("section"))
		;
		let
			object
		;
		sections.forEach(e => {
			e.addEventListener("click", function() {
				this.classList.add("active");
				object = this;
			});
		});
		document.addEventListener("click", e => {
			if (!e.target.closest("section") && object && !section_hold) {
				object.classList.remove("active");
			} 
		});
	})();
</script>