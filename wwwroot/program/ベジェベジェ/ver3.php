<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-15",
	"updated" => "2021-12-15",
);
head($obj);
?>
<div class="gc"><div id="v3-ttl">♪♪♪ベジェ曲線ジェネレータ・テスタ♪♪♪</div></div>
<p id="v3-announce">簡単にベジェ曲線を作成・テストするツールです。</p>
<div id="v3-width_judge">
	<div id="v3-vvdd">
		<div id="v3-vv">
			<div id="v3-show">cubic-bezier(x1, y1, x2, y2)</div>
			<svg id="v3-svg" class="x" width="300" height="300" version="1.1" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
				<g id="v3-svg_ls"></g>
				<g id="v3-svg_nr"></g>
				<g id="v3-svg_sh"></g>
				<g id="v3-svg_sf"></g>
				<g id="v3-svg_tx"></g>
				<circle id="v3-now" r="10"></circle>
			</svg>
			<div id="v3-btn-bx" class="gc">
				<div id="v3-button">実行!!</div>
			</div>
			<table class="v3-pp" class="x" border="1">
				<tbody>
					<tr>
						<td>グリッド幅</td>
						<td><input type="range" min="1" max="30" value="20" step="1" id="v3-range"></td>
						<td id="v3-sls-sh"></td>
					</tr>
					<tr>
						<td>グリッド濃度</td>
						<td><input type="range" min="1" max="10" value="3" step="1" id="v3-dense"></td>
						<td id="v3-dense-sh"></td>
					</tr>
					<tr>
						<td>移動時間</td>
						<td><input type="range" min="0.3" max="3" value="1" step="0.1" id="v3-speed"></td>
						<td>1.0秒</td>
					</tr>
					<tr>
						<td>移動精度</td>
						<td><input type="range" min="1" max="10" value="7" step="1" id="v3-interval"></td>
						<td>中</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="v3-dd">
			<div id="v3-ddx">
				<svg id="v3-mevg" class="v3-ico x" width="80" height="80" viewBox="-100 -100 500 500" xmlns="http://www.w3.org/2000/svg">
					<g></g>
					<g>
						<circle r="40" cx="0" cy="300"></circle>
						<circle r="40" cx="300" cy="0"></circle>
					</g>
				</svg>
				<div id="v3-mevg-sd">
					<div id="v3-mevg-sh" class="v3-ani"></div>
					<div id="v3-mevg-is" class="v3-ani v3-ani_li"></div>
				</div>
			</div>
			<div id="v3-ddy"></div>
			<div id="v3-btn2-bx" class="gc">
				<div id="v3-button2">一括実行</div>
			</div>
			<table class="v3-pp" class="x" border="1">
				<tbody>
					<tr>
						<td>実行時間</td>
						<td><input type="range" min="0.3" max="3" value="1" step="0.1" id="v3-s_sp"></td>
						<td>1.0秒</td>
					</tr>
					<tr>
						<td>実行回数</td>
						<td><input type="range" min="1" max="3" value="1" step="1" id="v3-s_ct"></td>
						<td>1回</td>
					</tr>
					<tr>
						<td>背景色</td>
						<td><input type="range" min="0" max="360" value="1" step="1" id="v3-s_cl"></td>
						<td style="background-color: #ff0000;"></td>
					</tr>
					<tr>
						<td>リニア線</td>
						<td><input type="range" min="0" max="1" value="1" step="1" id="v3-s_lr"></td>
						<td>あり</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div id="v3-m-adj"><div id="v3-tmpl"></div><div id="v3-log"></div></div>
</div>
<script charset = "UTF-8" type="text/javascript" src = "ver3.js" defer></script>
<?php footer(); ?>