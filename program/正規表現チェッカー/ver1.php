<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-11-20",
	"updated" => "2021-11-20",
);
head($obj);
?>
<div id="v1-main">
	<div id="v1-preg_wrap">
		<input id="v1-preg" type="text" />
	</div>
	<div id="v1-info"></div>
	<div id="v1-text_wrap">
		<div><div class="v1-instruction">検索対象文字列を入力してください。</div><textarea id="v1-text"></textarea></div>
		<div><div class="v1-instruction">結果が表示されます。</div><div id="v1-text_answer"></div></div>
	</div>
</div>
<script charset = "UTF-8" type="text/javascript">
window.addEventListener("load", () => {
	let rd = document.getElementById("v1-preg");
	let rt = document.getElementById("v1-text");
	Array.from(document.querySelectorAll("#v1-preg, #v1-text")).forEach(e => {
		e.addEventListener("input", () => {
			document.getElementById("v1-info").textContent = "";
			let r = rd.value;
			let t = rt.value;
			try {
				let preg = new RegExp(r, "g");
				let found = new String;
				let f = t.match(preg);
				if (f !== null) {
					for (let i = 0; i < f.length; i++) {
						found += `<tr><td>${i}</td><td>${f[i]}</td></tr>`;
					}
					document.getElementById("v1-text_answer").innerHTML = `<table id="v1-result_table"><tbody>${found}</tbody></table>`;
				} else {
					document.getElementById("v1-text_answer").innerHTML = "マッチしませんでした。";
				}
			} catch (e) {
				document.getElementById("v1-info").textContent = "正規表現が不正です。";
				document.getElementById("v1-text_answer").innerHTML = "";
			}
		});
	});
});
</script>
<?php footer(); ?>