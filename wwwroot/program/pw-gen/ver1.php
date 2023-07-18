<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-04-10",
	"updated" => "2022-04-10",
);
head($obj);
?>
<div id="v1">
	<h1>pw-generator</h1>
	<div class="button" id="generate">生成</div>
	<div id="v1-box"></div>
	<script type="text/javascript" charset="utf-8">
		"use strict";
		(() => {
			const b = document.getElementById("generate"),
				bx = document.getElementById("v1-box");
			b.addEventListener("click", () => {
				while(bx.firstChild) {
					bx.removeChild(bx.firstChild);
				}
				for (let i = 0; i < 10; i++) { // pwの数
					let pw = new String;
					const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!?';
					for (let j = 0; j < 16; j++) { // pwの長さ
						pw += chars.charAt(Math.floor(Math.random() * chars.length));
					}
					const elm = document.createElement("div"),
						ipt = document.createElement("input"),
						btn = document.createElement("div");
					elm.classList.add("ipt-btn_container");
					ipt.value = pw;
					ipt.readOnly = true;
					btn.textContent = "copy";
					btn.classList.add("cp-button");
					btn.addEventListener("click", function() {
						const f = this.parentNode.getElementsByTagName("input")[0],
							bn = this;
						f.select();
						document.execCommand("copy");
						bn.textContent = "copied!";
						bn.style.color = "white";
						bn.style.backgroundColor = "red";
						setTimeout(() => {
							bn.removeAttribute("style");
							bn.textContent = "copy";
						}, 1000);
					});
					elm.appendChild(ipt);
					elm.appendChild(btn);
					bx.appendChild(elm);
				}
			});
		})();
	</script>
</div>
<?php footer(); ?>