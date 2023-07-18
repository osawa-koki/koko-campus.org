<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-11",
	"updated" => "2022-03-11"
);
head($obj);
?>
<p id="message">攻撃手法の第三弾です。<br /><br />ここではユーザ(クライアント)とサーバ間で攻撃する方法について学びます。因みにこのページのタイトルになっているエージェント型攻撃という名前はユーザ(クライアント)とサーバ間で攻撃する方法について分類名が存在しなかったので、僕が勝手に名づけました。覚えなくて良いです。<br /><br />それでは、Let's Sing!</p>
<h2>エージェント型攻撃の種類</h2>
エージェント型攻撃(クライアントとサーバの間に入ってする攻撃)では、通信内容を盗聴する他、送信内容を操作することでクライアント・サーバが意図しない操作をさせることも可能です。<br /><br />エージェント型攻撃には以下のものがあります。
<ul>
	<li>中間者攻撃</li>
	<li>MITM攻撃</li>
	<li>第三者中継</li>
	<li>IPスプーフィング</li>
	<li>キャッシュポイズニング</li>
	<li>セッションハイジャック</li>
	<li>セッションフィクセーション</li>
	<li>リプレイ攻撃</li>
</ul>
<h2>中間者攻撃</h2>
通称、MITM攻撃(Man-In-The-Middle Attack)です。<br />別名、「バケツリレー攻撃」です。<br /><br />クライアントに対しては正規のサーバになりすまし、サーバに対しては正規のクライアントになりすまして通信を仲介して、しれっと情報を盗む攻撃方法です。<br />それ以外にも、不正なリクエストをサーバに送信したり、不正なレスポンスをクライアントに送信したりします。
<div class="step">
	<ul>
		<li>HTTPSを使用する。<span class="sup">※</span><span class="small">(暗号化されていないプレーンHTTPを使用しない)</span></li>
		<li>公衆無線LAN(フリーWi-Fi)は使用しない。</li>
	</ul>
</div>
このページのurlを確認してください。<br />「http<span class="underline">s</span>://koko-campus.com/subjects/情報処理安全確保支援士試験/ver2022/エージェント型攻撃」とhttpの後に「s」がついていると思います。<br />このsは「SSL/TLS」のsでこの通信は暗号化されていますよという意味です。
<span id="href_mitb"></span>
<h2>MITB攻撃</h2>
MITM攻撃とは「Man In The Browser Attack」の略で、攻撃者は<span class="underline">ブラウザを乗っ取る</span>ことでユーザが入力した情報などを盗みます。<br />近年はMITB攻撃によって、オンラインバンキングで入力したデータが攻撃者が盗んで、そのままそのデータを用いて多額のお金が引き出される被害が急増しています。<br /><br />MITB攻撃はPCがマルウェアに感染して、そのマルウェアがブラウザを乗っ取る形で成立するので、対策としてはまずはマルウェアに感染しないことが大切です。
<div class="step">
	<ul>
		<li>セキュリティソフトを導入する。</li>
		<li>安全だと分からないファイルはダウンロードしない。</li>
		<li>知らないメールに添付されたurlはクリックしない。</li>
		<li><a href="認証#href_transaction">トランザクション署名</a></li>
	</ul>
</div>
<div class="exam">
	&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問10 &#9836;&#9836;&#9836;<br />
	&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問9 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	MITBに対する有効な対策として、「<strong>インターネットバンキングでの送金時に利用者が入力した情報と、金融機関が受信した情報に差異がないことを検証できるよう、トランザクション署名を利用する</strong>」ことを挙げています。
</div>
<span id="href_mail"></span>
<h2>第三者中継</h2>
他人のメールサーバを発信元として外部にメールを送信させる攻撃方法です。<br /><br />この攻撃では、機密情報が直接盗まれることはありませんが、迷惑メール送信の踏み台にされてしまう恐れがあります。<br />自身のメールアドレスから大量に迷惑メールが送信されると信頼を無くすほか、ブラックリストに登録されたりするなどの影響があります。<br /><br />ちなみに、迷惑メールの発信元を登録する機構があってそのデータを利用してブラックリストを設定するシステムも多くあります。<br />有名な迷惑メール発信元登録機関へのリンクを貼っておきますね♪
<p>迷惑メール管理サイトは<a href="http://www.anti-abuse.org/multi-rbl-check/">こちら</a>。</p>
<div id="mail_commant_trigger" class="step">
	<ul>
		<li>MTAの設定による発信元メールアドレスの制限</li>
		<li>SMTP-AUTH</li>
		<li>POP before SMTP</li>
		<li>OP25B</li>
		<li>SPF</li>
		<li>Sender ID</li>
		<li>DomainKeys</li>
		<li>DKIM</li>
		<li>DMARK</li>
	</ul>
</div>
何だか、たくさんありますね、、、泣<br />ここまで来れた皆さんなら大丈夫です♪<br /><br />まずは、メールがどのように送られるか説明しますね♪
<svg version="1.1" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
	<rect class="computer" transform="matrix(1 0 -.80463 .59378 0 0)" x="614.76" y="598.77" width="52.395" height="32.751" stroke-width="3.7795"/>
	<rect class="computer" x="132.54" y="323.59" width="52.66" height="31.996" stroke-width="3.7795"/>
	<rect class="computer" x="137.71" y="328.67" width="42.659" height="22.663" fill="#dcffff" stroke-width="3.7795"/>
	<rect class="computer" transform="matrix(1 0 -.80463 .59378 0 0)" x="915.37" y="598.78" width="52.395" height="32.751" stroke-width="3.7795"/>
	<rect class="computer" x="433.16" y="323.59" width="52.66" height="31.996" stroke-width="3.7795"/>
	<rect class="computer" x="438.33" y="328.67" width="42.659" height="22.663" fill="#dcffff" stroke-width="3.7795"/>
	<g>
		<rect x="23.997" y="47.994" width="265.3" height="193.31" fill="#ffffbc" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<rect x="309.3" y="47.994" width="265.3" height="193.31" fill="#ddffd9" stop-color="#000000" style="paint-order:markers stroke fill"/>
	</g>
	<rect x="485.95" y="141.64" width="38.414" height="45.72" fill="#675eff" stop-color="#000000" stroke="#000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" style="paint-order:markers stroke fill"/>
	<g transform="translate(0,2)" stroke-width=".6556" style="font-variant-ligatures:none" aria-label="メール ボックス">
		<path d="m488.51 157.88q2.19-1.18 3.15-2.69-1-0.61-1.75-0.93l0.43-0.79q0.79 0.36 1.79 0.93 0.5-1.04 0.86-2.79l0.86 0.28q0.25 0.1 0 0.22-0.47 1.79-0.97 2.76 0.86 0.57 1.4 1l-0.47 0.83q-0.72-0.61-1.36-1.04-1.33 1.79-3.16 2.9z"/>
		<path d="m497.04 155.55v-0.79h8v0.79z"/>
		<path d="m511.02 157.45q1.58-0.61 2.91-2.44l0.5 0.68q-1.36 1.87-3.44 2.69l-0.29 0.15-0.57-0.43 0.1-0.18v-5.78h0.75q0.33 0.1 0.1 0.29zm-4.8 0.97q1.79-1.72 1.79-4.27v-1.61h0.76q0.32 0.1 0.1 0.29v1.29q0 3.01-1.9 4.76z"/>
		<path d="m493.96 167.38q1.29 1.36 1.93 2.51l-0.78 0.53q-0.76-1.32-1.83-2.47zm-1.72-1.54h3.3v0.78h-3.3v4.99h-0.83v-4.99h-3.22v-0.78h3.22v-2.01h0.76q0.39 0.1 0.1 0.28zm-1.9 1.97q0.21 0.18-0.15 0.25-0.53 1.18-1.36 2.47l-0.79-0.43q0.9-1.29 1.51-2.72zm4.34-2.37q-0.65-0.68-1.19-1.11l0.43-0.43q0.61 0.47 1.19 1.07zm1-0.5q-0.65-0.72-1.18-1.18l0.46-0.4q0.61 0.47 1.19 1.15z"/>
		<path d="m504 166.66q-0.25 2.33-1.29 3.37t-2.73 1.65l-0.46-0.68q1.65-0.54 2.58-1.47 1-1.01 1.14-3.41l0.76 0.25q0.32 0.11 0 0.29zm-3.05 1.29q-0.43-0.97-0.86-1.61l0.68-0.36q0.54 0.68 0.93 1.61zm-1.83 0.54q-0.43-1.01-0.89-1.69l0.71-0.36q0.5 0.69 0.9 1.65z"/>
		<path d="m512.85 166.12q-0.68 3.91-4.48 5.6l-0.64-0.69q3.51-1.43 4.23-4.94h-2.87q-0.83 1.36-1.72 2.18l-0.72-0.46q1.87-1.69 2.4-3.95l0.83 0.29q0.21 0.11-0.1 0.22-0.15 0.46-0.4 0.93h2.58l0.33-0.18 0.64 0.64q0.25 0.25-0.11 0.36z"/>
		<path d="m519.99 167.77q1.54 1.18 3.05 2.73l-0.72 0.61q-1.51-1.58-2.91-2.66-1.39 1.51-3.19 2.69l-0.68-0.61q3.8-2.47 4.88-4.95l-3.91 0.26-0.11-0.87 4.16-0.17 0.43-0.11 0.58 0.57q0.25 0.25-0.15 0.32-0.68 1.19-1.43 2.19z"/>
	</g>
	<g id="arrows" fill="#ff0" stroke="#000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.1516">
		<path d="m154.86 298.04-16.14 6.62-6.37-38.47z" stop-color="#000000" style="paint-order:markers stroke; fill: red;"/>
		<path d="m149.26 179.29-13.33-11.24 31.16-23.45z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m264.93 110.25-1.22-17.408 38.52 6.043z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m405.44 106.81 4.51-16.849 34.46 18.249z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m460.21 138.4 16.92 4.23-17.66 34.77z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m447.5 258.78 17.44 0.39-9.57 37.8z" stop-color="#000000" style="paint-order:markers stroke fill"/>
	</g>
	<ellipse cx="122.68" cy="211.14" rx="35.662" ry="19.664" fill="#fff" stop-color="#000000" stroke="#000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" style="paint-order:markers stroke fill"/>
	<g transform="translate(-40)" style="font-variant-ligatures:none" aria-label="MSA">
		<path d="m151.58 222.63h-3.06l-0.45-14.33-0.2-5.5-1.07 3.2-3.39 9.14h-2.16l-3.24-8.79-1.07-3.55-0.1 5.75-0.41 14.08h-2.95l1.13-22.97h3.71l3.09 8.64 1 2.92 0.97-2.92 3.25-8.64h3.81z"/>
		<path d="m169.97 216.41q0 1.63-0.67 2.86t-1.86 2.06q-1.2 0.81-2.89 1.21-1.67 0.41-3.69 0.41-0.91 0-1.83-0.1-0.89-0.1-1.74-0.18-0.82-0.11-1.56-0.25t-1.34-0.29v-3.03q1.32 0.49 2.96 0.78 1.65 0.28 3.74 0.28 1.51 0 2.57-0.23 1.07-0.25 1.74-0.7 0.68-0.48 0.98-1.15 0.32-0.67 0.32-1.53 0-0.93-0.53-1.58-0.51-0.67-1.35-1.18-0.85-0.52-1.94-0.95-1.07-0.44-2.19-0.89-1.13-0.46-2.22-0.99-1.07-0.54-1.91-1.26-0.85-0.74-1.37-1.72-0.51-0.99-0.51-2.34 0-1.18 0.49-2.32 0.49-1.15 1.53-2.02 1.03-0.9 2.65-1.45 1.64-0.54 3.89-0.54 0.58 0 1.24 0 0.69 0.1 1.38 0.16 0.7 0.1 1.37 0.21 0.68 0.12 1.26 0.26v2.82q-1.35-0.39-2.71-0.58-1.35-0.21-2.61-0.21-2.69 0-3.96 0.89-1.27 0.9-1.27 2.41 0 0.93 0.51 1.6 0.53 0.67 1.38 1.2 0.84 0.52 1.91 0.96 1.09 0.42 2.22 0.88 1.12 0.46 2.19 1 1.09 0.55 1.94 1.3 0.84 0.74 1.35 1.74 0.53 1.01 0.53 2.38z"/>
		<path d="m191.85 222.63h-3.41l-1.6-5.01h-9.56l-1.62 5.01h-3.25l7.63-22.97h4.29zm-5.9-7.8-3.89-12.29-3.88 12.29z"/>
	</g>
	<ellipse cx="199.97" cy="113.98" rx="35.662" ry="19.664" fill="#fff" stop-color="#000000" stroke="#000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" style="paint-order:markers stroke fill"/>
	<g style="font-variant-ligatures:none" aria-label="MTA">
		<path d="m188.87 125.47h-3.06l-0.45-14.33-0.2-5.5-1.07 3.2-3.39 9.14h-2.16l-3.24-8.79-1.07-3.55-0.1 5.75-0.41 14.08h-2.95l1.13-22.97h3.71l3.09 8.64 1 2.92 0.97-2.92 3.25-8.64h3.81z"/>
		<path d="m208.01 105.17h-6.8v20.3h-3.16v-20.3h-6.81v-2.67h16.77z"/>
		<path d="m229.14 125.47h-3.41l-1.6-5.01h-9.56l-1.62 5.01h-3.25l7.63-22.97h4.29zm-5.9-7.8-3.89-12.29-3.88 12.29z"/>
	</g>
	<ellipse cx="361.95" cy="93.988" rx="35.662" ry="19.664" fill="#fff" stop-color="#000000" stroke="#000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" style="paint-order:markers stroke fill"/>
	<g style="font-variant-ligatures:none" aria-label="MTA">
		<path d="m350.85 105.48h-3.06l-0.45-14.326-0.2-5.502-1.07 3.199-3.39 9.141h-2.16l-3.24-8.789-1.07-3.551-0.1 5.748-0.41 14.08h-2.95l1.13-22.975h3.71l3.09 8.649 1 2.918 0.97-2.918 3.25-8.649h3.81z"/>
		<path d="m369.99 85.177h-6.8v20.303h-3.16v-20.303h-6.81v-2.672h16.77z"/>
		<path d="m391.12 105.48h-3.41l-1.6-5.01h-9.56l-1.62 5.01h-3.25l7.63-22.975h4.29zm-5.9-7.805-3.89-12.287-3.88 12.287z"/>
	</g>
	<ellipse cx="490.61" cy="111.32" rx="35.662" ry="19.664" fill="#fff" stop-color="#000000" stroke="#000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" style="paint-order:markers stroke fill"/>
	<g style="font-variant-ligatures:none" aria-label="MDA">
		<path d="m479.51 122.81h-3.06l-0.45-14.33-0.2-5.5-1.07 3.2-3.39 9.14h-2.16l-3.24-8.79-1.07-3.55-0.1 5.75-0.41 14.08h-2.95l1.13-22.975h3.71l3.09 8.645 1 2.92 0.97-2.92 3.25-8.645h3.81z"/>
		<path d="m498.88 111.07q0 1.65-0.26 3.16-0.25 1.51-0.81 2.81-0.56 1.31-1.46 2.38-0.9 1.05-2.2 1.81-1.3 0.75-3.02 1.18-1.72 0.4-3.92 0.4h-4.92v-22.975h5.92q5.38 0 8.02 2.775 2.65 2.76 2.65 8.46zm-3.28 0.23q0-2.45-0.46-4.13-0.46-1.69-1.39-2.73t-2.34-1.49q-1.4-0.48-3.3-0.48h-2.69v17.63h2.34q7.84 0 7.84-8.8z"/>
		<path d="m519.78 122.81h-3.41l-1.6-5.01h-9.56l-1.62 5.01h-3.25l7.63-22.975h4.29zm-5.9-7.8-3.89-12.29-3.88 12.29z"/>
	</g>
	<ellipse cx="459.94" cy="210.64" rx="35.662" ry="19.664" fill="#fff" stop-color="#000000" stroke="#000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" style="paint-order:markers stroke fill"/>
	<g style="font-variant-ligatures:none" aria-label="MRA">
		<path d="m448.84 222.13h-3.06l-0.45-14.33-0.2-5.5-1.07 3.2-3.39 9.14h-2.16l-3.24-8.79-1.07-3.55-0.1 5.75-0.41 14.08h-2.95l1.13-22.97h3.71l3.09 8.64 1 2.92 0.97-2.92 3.25-8.64h3.81z"/>
		<path d="m468.18 222.13h-3.54l-3.42-7.35q-0.39-0.84-0.79-1.39-0.41-0.56-0.88-0.88-0.46-0.33-1.02-0.47-0.55-0.14-1.23-0.14h-1.48v10.23h-3.13v-22.97h6.15q2.01 0 3.45 0.43 1.44 0.44 2.35 1.24 0.94 0.79 1.36 1.91 0.44 1.11 0.44 2.46 0 1.07-0.32 2.04-0.32 0.95-0.95 1.74-0.61 0.78-1.55 1.36-0.91 0.56-2.1 0.84 0.96 0.33 1.63 1.18 0.69 0.82 1.39 2.21zm-5.01-16.66q0-1.85-1.16-2.76-1.14-0.92-3.24-0.92h-2.95v7.6h2.53q1.11 0 1.99-0.25 0.89-0.26 1.51-0.76 0.63-0.51 0.97-1.23 0.35-0.73 0.35-1.68z"/>
		<path d="m489.11 222.13h-3.41l-1.6-5.01h-9.56l-1.62 5.01h-3.25l7.63-22.97h4.29zm-5.9-7.8-3.89-12.29-3.88 12.29z"/>
	</g>
	<ellipse cx="88.358" cy="326.63" rx="35.662" ry="19.664" fill="#fff" stop-color="#000000" stroke="#000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" style="paint-order:markers stroke fill"/>
	<g style="font-variant-ligatures:none" aria-label="MUA">
		<path d="m77.258 337.96h-3.059l-0.457-14.33-0.193-5.5-1.073 3.2-3.392 9.14h-2.162l-3.235-8.79-1.072-3.55-0.07 5.75-0.405 14.08h-2.953l1.125-22.97h3.709l3.094 8.64 1.002 2.92 0.967-2.92 3.252-8.64h3.814z"/>
		<path d="m96.014 329.96q0 1.9-0.545 3.45-0.528 1.53-1.565 2.62-1.037 1.07-2.549 1.67-1.494 0.58-3.445 0.58-2.145 0-3.639-0.57-1.494-0.56-2.443-1.58-0.932-1.04-1.371-2.48-0.422-1.44-0.422-3.21v-15.45h3.129v15.2q0 1.35 0.246 2.37 0.264 1.02 0.844 1.71 0.58 0.68 1.494 1.04 0.932 0.35 2.267 0.35 2.497 0 3.674-1.44 1.196-1.45 1.196-4.06v-15.17h3.129z"/>
		<path d="m117.53 337.96h-3.41l-1.6-5.01h-9.56l-1.62 5.01h-3.252l7.632-22.97h4.29zm-5.91-7.8-3.88-12.29-3.89 12.29z"/>
	</g>
	<ellipse cx="381.28" cy="343.95" rx="35.662" ry="19.664" fill="#fff" stop-color="#000000" stroke="#000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" style="paint-order:markers stroke fill"/>
	<g transform="translate(292.93,17.325)" style="font-variant-ligatures:none" aria-label="MUA">
		<path d="m77.258 337.96h-3.059l-0.457-14.33-0.193-5.5-1.073 3.2-3.392 9.14h-2.162l-3.235-8.79-1.072-3.55-0.07 5.75-0.405 14.08h-2.953l1.125-22.97h3.709l3.094 8.64 1.002 2.92 0.967-2.92 3.252-8.64h3.814z"/>
		<path d="m96.014 329.96q0 1.9-0.545 3.45-0.528 1.53-1.565 2.62-1.037 1.07-2.549 1.67-1.494 0.58-3.445 0.58-2.145 0-3.639-0.57-1.494-0.56-2.443-1.58-0.932-1.04-1.371-2.48-0.422-1.44-0.422-3.21v-15.45h3.129v15.2q0 1.35 0.246 2.37 0.264 1.02 0.844 1.71 0.58 0.68 1.494 1.04 0.932 0.35 2.267 0.35 2.497 0 3.674-1.44 1.196-1.45 1.196-4.06v-15.17h3.129z"/>
		<path d="m117.53 337.96h-3.41l-1.6-5.01h-9.56l-1.62 5.01h-3.252l7.632-22.97h4.29zm-5.91-7.8-3.88-12.29-3.89 12.29z"/>
	</g>
	<g id="mail" stroke="#000">
		<path d="m 174.85,269.53 h 40.81 v 20.41 h -40.81 z" fill="#fff" stop-color="#000000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" style="paint-order:markers stroke fill"/>
		<path d="m 174.85,269.53 20.04,10.17 20.77,-10.17 z" fill="none" stroke-width=".70965px"/>
	</g>
</svg>
<div id="mail-button" class="button">次へ</div>
<table>
	<thead>
		<tr>
			<th width="50%">From</th>
			<th width="50%">To</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td id="mail-from"></td>
			<td id="mail-to"></td>
		</tr>
		<tr>
			<td id="mail-comment" colspan="2"></td>
		</tr>
	</tbody>
</table>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const xy = [
			[0, 0],
			[5, -105],
			[90, -140],
			[220, -145],
			[225, -120],
			[210, 0.5]
		],
			mail = document.getElementById("mail"),
			arws = document.getElementById("arrows").getElementsByTagName("path"),
			ers = () => {
				Array.from(arws).forEach(e => {
					e.style.fill = "yellow";
				});
			},
			comment = [
				"MSAがMUAに対して識別・認証を行います。(ここで用いられる認証がSMTP-AUTHです)<br />この通信の際に用いられるプロトコルはSMTPです。",
				"MSAが認証に成功したMUAから受け取ったメールをMTAに送信します。<br />セキュリティの観点から、MTAは「MSAからメールを受け取る用のMTA」と「送信先にメールを送信する用のMTA」に分かれる場合が多いです。<br />この通信の際に用いられるプロトコルはSMTPです。",
				"送信元のMTAは最初に送信先のMTAにメールを送信します。",
				"送信先のMTAは受け取ったメールをMDAに渡して、メールをメールBOXに格納します。<br />この通信の際に用いられるプロトコルはSMTPです。",
				"実際にはMDAとMRAは直接やり取りはせず、MDAがメールをメールBOXに預けて、MRAはそれを取り出します。",
				"MRAは受信者(MUA)からの要求を受けると、受信者の識別・認証を完成させた後にメールBOXからメールを取り出してMUAに送信します。<br />この通信の際に用いられるプロトコルはPOP・IMAPです。"
			],
			from_to = [
				"MUA(送信側)", "MSA(送信側)", "MTA(送信側)", "MTA(受信側)", "MDA(受信側)", "MRA(受信側)", "MUA(受信側)"
			],
			td_from = document.getElementById("mail-from"),
			td_to = document.getElementById("mail-to"),
			td_comment = document.getElementById("mail-comment"),
			reset = now => {
				arws[now].style.fill = "red";
				x_lock = false;
				td_from.innerHTML = from_to[now];
				td_to.innerHTML = from_to[now + 1];
				td_comment.innerHTML = comment[now];
			};
		(() => {
			const first = 0;
			td_from.innerHTML = from_to[first];
			td_to.innerHTML = from_to[first + 1];
			td_comment.innerHTML = comment[first];
		})();
		let now = 0,
			x_lock = false;
		document.getElementById("mail-button").addEventListener("click", () => {
			if (!x_lock) {
				x_lock = true;
				ers();
				if (now !== xy.length - 1) {
					let count = 0;
					const upto = 30,
						dx = xy[now + 1][0] - xy[now][0],
						dy = xy[now + 1][1] - xy[now][1],
						interval_id = setInterval(() => {
							count++;
							mail.setAttribute("transform", `translate(${count / upto * dx + xy[now][0]}, ${count / upto * dy + xy[now][1]})`);
							if (upto <= count) {
								clearInterval(interval_id);
								now++;
								reset(now);
							}
						}, 30);
				} else {
					mail.setAttribute("transform", "translate(0, 0)");
					now = 0;
					reset(now);
				}
			}
		});
	})();
</script>
こんな感じです。<br />では、実際の対策方法について、以下でひとつずつ説明していきますね♪
<div class="explanation">
	<div class="title">MTAの設定による発信元メールアドレスの制限</div>
	MTAの設定によって、送信元メールアドレスと送信先メールアドレスのいずれにも自身のドメインが含まれていないメールを中継しないようにします。
</div>
<div class="explanation">
	<div class="title">SMTP-AUTH</div>
	簡単に説明すると、「SMTP」&times;「ユーザ認証」です。<br /><br />MSAがMUAからメールを受け取る際にMUAを識別した後にユーザ認証(MUA認証)することを言います。<br /><small>※この認証ではSASLフレームワークを使用し、そのメカニズムとして「Kerberos v4」「GSSAPI」「S/Key」があります。</small>
	<div class="exam">
		&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問16 &#9836;&#9836;&#9836;<br />
		&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問14 &#9836;&#9836;&#9836;
		<div class="separator"></div>
		「<strong>メールクライアントからメールサーバの電子メール送信時に、利用者IDとパスワードによる利用者認証を行う。</strong>」と説明されています。
	</div>
</div>
<div class="explanation">
	<div class="title">POP before SMTP</div>
	メールの送信に先だってPOPによる認証を行い、認証に成功した場合のみ一定期間メールの送信を許可します。<br />具体的な手法としては、認証に成功したMUAのIPアドレスを保存しておき、MSAはメール受信時にIPアドレスが認証済みIPアドレスリストに含まれているかどうかチェックします。<small>(<a href="https://datatracker.ietf.org/doc/html/rfc2476">RFC2476</a>)</small>
</div>
<div class="explanation">
	<div class="title">OP25B</div>
	(OutBound Port25 blocking)の略で、<span class="underline">ISPのメールサーバを経由せずにインターネットへ送られる25番ポート宛のSMTPパケットを遮断します。</span><br /><br />正当な利用者がインターネット方向にメールを送信する際には、投稿専用のポート(587番ポート/Submissionポート)を使用する必要があります。<br /><br /><small>迷惑メールが迷惑メール送信業者のメールサーバからDHCPによって割り当てられたIPアドレスを使用して、直接宛先のメールサーバにメールを送信することが多いため、ISPのメールサーバを経由しないメールを遮断することで対応します。<br /><br />反対バージョンとしてIP25Bも存在します。</small><br /><br />
	<div class="exam">
		&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問14 &#9836;&#9836;&#9836;
		<div class="separator"></div>
		「<strong>ISP管理外のネットワークに向けてISP管理下のネットワークから送信されるスパムメールを制限する</strong>」と説明しています。
		<div class="super_separator"></div>
		&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問14 &#9836;&#9836;&#9836;
		<div class="separator"></div>
		ISPがOP25Bを導入する目的として、「<strong>ISP管理外のネットワークに向けて、ISP管理下のネットワークから送信されるスパムメールを制限する。</strong>」と説明しています。
	</div>
</div>
<div class="explanation">
	<div class="title">SPF</div>
	予め発信元ドメインのDNSサーバのTXTレコードに正当なSMTPサーバのIPアドレス(SPFレコード)を登録して、受信側のメールサーバ(SMTPサーバ)はメール受信時に発信元のDNSサーバに問い合わせて、エンベロープに記載されているメールアドレスの正当性を検証します。
	<div class="exam">
		&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問14 &#9836;&#9836;&#9836;
		<div class="separator"></div>
		SPFによるドメイン認証を実施する場合に電子メール送信元アドレスのドメイン所有側で行う必要がある設定として、「<strong>DNSサーバにSPFレコードを登録する。</strong>」を挙げています。
	</div>
</div>
<div class="explanation">
	<div class="title">Sender ID</div>
	SPFに加えて受信したメールのヘッダ情報のメールアドレスのドメインの正当性を検証します。
</div>
<div class="explanation">
	<div class="title">DomainKeys</div>
	予め発信元ドメインのDNSサーバに公開鍵を登録しておき、SMTPサーバがメールに対になる秘密鍵でディジタル署名を付してメールを送信して、受信側のメールサーバ(SMTPサーバ)が発信元の公開鍵を用いてメールの正当性を検証します。
</div>
<div class="explanation">
	<div class="title">DKIM</div>
	DomainKeysの進化バージョンです。(Domain Keys Identified Mail)<br /><br />DomainKeysではドメイン単位での認証であったのに対して、DKIMではユーザ単位でのディジタル署名・検証を可能とします。<br /><br />前述したDomainKeysとIIM(Internet Identified Mail)をIETFが統一したものです。
	<div class="exam">
		&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問12 &#9836;&#9836;&#9836;
		<div class="separator"></div>
		DKIMを「<strong>送信側メールサーバにおいてディジタル署名を電子メールのヘッダに付加し、受信側のメールサーバにおいてそのディジタル署名を公開鍵によって検証する仕組み。</strong>」と説明しています。
	</div>
</div>
<div class="explanation">
	<div class="title">DMARK</div>
	「Domain-based Message Authentication Reporting & Conformance」の略で、SPFやDKIMによる認証を補強する技術です。<br /><br />
	SPFやDKIMの認証結果を受けてから送信者がメールの中継可否をポリシとして公開することで、メールの扱いを送信者が決定することを可能にします。
</div>
<h2>IPスプーフィング</h2>
不正アクセスを目的としてIPアドレスを詐称することを指します。<br />スプーフ(spoof)とは「騙す」の意味で、自分のIPアドレスを隠してIT資源(サーバ・ネットワーク)に対して過剰な負荷をかけて情報セキュリティ特性の可用性(A)を損なわせる攻撃に用いられます。<br /><br />後述するセッションハイジャック攻撃でもこのIPスプーフィングが用いられます。
<div class="step">
	<ul>
		<li>IPアドレスのみで認証をしない。<span class="sup">※</span><span>(IPアドレスは偽装が可能なため)</span><br /><small>(rcp、rloginを使用しない)</small></li>
		<li>FWを正しく設定する。</li>
	</ul>
</div>
<span id="href_dns-poizon"></span>
<h2>キャッシュポイズニング</h2>
正式名称、DNSキャッシュポイズニング攻撃です。<br /><br />キャッシュポイズニングについて説明する前に簡単にDNSの仕組みを説明します。<br /><br />DNSとは「Domain Name System」の略で、ドメイン名からIPアドレスを特定するための仕組みです。<br /><br />DNSに関連する用語を確認しますね。
<div class="scroll-600w">
	<table>
		<caption>DNSに関連する用語</caption>
		<tbody>
			<tr>
				<th>リゾルバ</th>
				<td>「ドメイン名からIPアドレス」「IPアドレスからドメイン」を特定するためのプログラムのことを指します。<br /><br />リゾルバにはスタブリゾルバとフルサービスリゾルバのふたつがあります。</td>
			</tr>
			<tr>
				<th>スタブリゾルバ</th>
				<td>OSに標準搭載されているプログラムであり自身は名前解決ができないため、後述するフルサービスリゾルバに名前解決を要求します。</td>
			</tr>
			<tr>
				<th>フルサービスリゾルバ</th>
				<td>スタブリゾルバから受け取った名前解決要求に対して、名前解決を行ってその結果を返します。<br />フルサービスリゾルバとは一般的に後述するキャッシュサーバのことを指します。</td>
			</tr>
			<tr>
				<th>権威DNSサーバ</th>
				<td>別名、「コンテンツサーバ」「ゾーンサーバ」です。<br /><br />フルサービスリゾルバからの<span class="underline">非再帰的要求に対して、</span>自身が管理するドメイン内の名前解決に応じます。</td>
			</tr>
			<tr>
				<th>キャッシュサーバ</th>
				<td>別名、「フルサービスリゾルバ」です。<br /><br />スタブリゾルバからの<span class="underline">再帰的要求に対して、</span>必要ならば他のDNSサーバに名前解決要求をしてその結果を返します。</td>
			</tr>
			<tr>
				<th>オープンリゾルバ</th>
				<td>「問い合わせ元」「対象のドメイン」に制限なく、名前解決要求に応じるキャッシュサーバ(コンテンツサーバ)のことを指します。</td>
			</tr>
		</tbody>
	</table>
</div>
では、本題ですね♪<br /><br />DNSキャッシュポイズニング攻撃とは、キャッシュDNSサーバから権威DNSサーバへの名前解決要求に対して、攻撃者が偽のDNS応答を返すことでDNSのキャッシュに偽の情報を登録させて汚染させる(ポイズニング)攻撃のことです。<br /><br />DNSキャッシュポイズニングについて図を用いて説明しますね♪
<svg version="1.1" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
	<g stroke-width="2.5575">
		<ellipse cx="335.9" cy="363.31" rx="34.054" ry="29.77" fill="#d200ff"/>
		<path class="eye0" d="m353.73 350.26-16.92 14.89s6.84 0.68 10.15 0c2.18-0.48 4.63-1.04 6.09-2.71 1.55-1.77 1.98-4.42 2.04-6.77 0.16-1.85-1.36-5.41-1.36-5.41z"/>
		<path d="m313.13 350.26 16.91 14.89s-6.83 0.68-10.14 0c-2.18-0.48-4.63-1.04-6.09-2.71-1.57-1.77-1.98-4.42-2.04-6.77-0.16-1.85 1.36-5.41 1.36-5.41z"/>
	</g>
	<g stroke-width="2.5571">
		<rect x="245.27" y="148.28" width="54.125" height="87.957" fill="#000050"/>
		<rect class="window" x="253.34" y="158.64" width="22.549" height="9.9214" fill="#fff"/>
		<rect class="window" x="253.8" y="178.48" width="22.549" height="9.9214" fill="#fff"/>
	</g>
	<g stroke-width="2.5571">
		<rect class="server" x="517.32" y="14.899" width="54.125" height="87.957" fill="#000050"/>
		<rect class="window" x="525.39" y="25.261" width="22.549" height="9.9214" fill="#fff"/>
		<rect class="window" x="525.85" y="45.101" width="22.549" height="9.9214" fill="#fff"/>
		<rect class="server" x="517.32" y="148.28" width="54.125" height="87.957" fill="#000050"/>
		<rect class="window" x="525.39" y="158.64" width="22.549" height="9.9214" fill="#fff"/>
		<rect class="window" x="525.85" y="178.48" width="22.549" height="9.9214" fill="#fff"/>
		<rect class="server" x="517.32" y="281.67" width="54.125" height="87.957" fill="#000050"/>
		<rect class="window" x="525.39" y="292.03" width="22.549" height="9.9214" fill="#fff"/>
		<rect class="window" x="525.85" y="311.87" width="22.549" height="9.9214" fill="#fff"/>
	</g>
	<g fill="#fff" stroke="#000">
		<ellipse cx="57.093" cy="193.74" rx="43.26" ry="37.816" stroke-width="3.2488"/>
		<g stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round">
			<ellipse cx="42.266" cy="187.31" rx="8.5377" ry="5.834" stop-color="#000000" stroke-width="2.8909" style="paint-order:markers stroke fill"/>
			<ellipse cx="74.878" cy="187.31" rx="8.5377" ry="5.834" stop-color="#000000" stroke-width="2.8909" style="paint-order:markers stroke fill"/>
			<ellipse cx="57.834" cy="210.94" rx="16.489" ry="1.7227" stop-color="#000000" stroke-width="2.5" style="paint-order:markers stroke fill"/>
		</g>
	</g>
	<g id="dns-arrows" fill="#fff" stroke="#000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
		<path d="m126.88 190.43v-17.1l93.77 8.55z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m366.06 135.51-7.15-15.53 88.78-31.39z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m451.69 96.59 7.15 15.53-88.78 31.39z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m363.81 197.37v-17.09l93.77 8.55z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m457.58 213.92v-17.09l-93.77 8.55z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m369.27 255.5-7.15 15.53 88.78 31.39z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m435.75 323.95 7.15-15.53-88.78-31.39z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m322.08 317.18-9.75 3.79-15.5-54.38z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m220.65 211.53v-17.1l-93.77 8.55z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m0 0z" stop-color="#000000" style="paint-order:markers stroke fill"/>
	</g>
</svg>
<div>
	<div>
		<input type="radio" id="dns-normal" name="dns" checked />
		<label for="dns-normal">通常の名前解決</label>
	</div>
	<div>
		<input type="radio" id="dns-attack" name="dns" />
		<label for="dns-attack">DNSキャッシュポイズニング</label>
	</div>
</div>
<div id="dns-button" class="button">次へ</div>
<div id="dns-info" class="r-border"></div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const input = document.querySelectorAll("input[name=dns]"),
			arws = document.getElementById("dns-arrows").getElementsByTagName("path"),
			ers = () => {
				Array.from(arws).forEach(e => {
					e.style.fill = "white";
					info.innerHTML = "";
				});
			},
			info = document.getElementById("dns-info");
		let count = 0,
			na = true;
		Array.from(input).forEach(e => {
			e.addEventListener("change", () => {
				na = input[0].checked;
				ers();
				count = 0;
			});
		});
		const st_n = [
			[0, "スタブリゾルバがフルサービスリゾルバ(キャッシュサーバ)に対して名前解決要求(再帰問合せ)をします。"],
			[1, "スタブリゾルバからの名前解決要求を受けたフルサービスリゾルバ(キャッシュサーバ)は、上位の権威DNSサーバ(コンテンツサーバ/ゾーンサーバ)に対して名前解決要求(非再帰問合せ)をします。"],
			[2, "フルサービスリゾルバ(キャッシュサーバ)からの名前解決要求を受けた権威DNSサーバ(コンテンツサーバ/ゾーンサーバ)はより下位のDNSサーバへ問い合わせるように伝えます。"],
			[3, "フルサービスリゾルバ(キャッシュサーバ)は、より下位のDNSサーバへの名前解決要求を送信します。"],
			[4, "フルサービスリゾルバ(キャッシュサーバ)からの名前解決要求を受けた権威DNSサーバ(コンテンツサーバ/ゾーンサーバ)はより下位のDNSサーバへ問い合わせるように伝えます。"],
			[5, "フルサービスリゾルバ(キャッシュサーバ)は、より下位のDNSサーバへの名前解決要求を送信します。"],
			[6, "自身が管理しているエリアの名前解決要求であれば、DNSサーバは名前解決要求に対する応答を返します。"],
			[8, "フルサービスリゾルバ(キャッシュサーバ)はスタブリゾルバに対して名前解決要求の最終的な応答を返します。"],
			[9, ""]
		],
			st_a = [
			[0, "スタブリゾルバがフルサービスリゾルバ(キャッシュサーバ)に対して名前解決要求(再帰問合せ)をします。"],
			[1, "スタブリゾルバからの名前解決要求を受けたフルサービスリゾルバ(キャッシュサーバ)は、上位の権威DNSサーバ(コンテンツサーバ/ゾーンサーバ)に対して名前解決要求(非再帰問合せ)をします。"],
			[7, "攻撃者は名前解決要求に対する正当な応答が返されるよりも前に偽の応答を返します。"],
			[8, "偽の応答を受け取ったフルサービスリゾルバ(キャッシュサーバ)がそのデータをスタブリゾルバに返します。<br />また、フルサービスリゾルバ(キャッシュサーバ)は一定期間そのデータを保持するためしばらくの間は不正な名前解決要求に対する応答を返します。"],
			[9, ""]
		];
		let x_lock = false;
		document.getElementById("dns-button").addEventListener("click", () => {
			if (!x_lock) {
				x_lock = true;
				ers();
				const data = (na) ? st_n : st_a,
					n = data[count][0],
					comment = data[count][1]
				arws[n].style.fill = (!na && (n === 7 || n === 8)) ? "purple" : "red";
				info.innerHTML = comment;
				count = (count !== data.length - 1) ? count + 1 : 0;
				setTimeout(() => {
					x_lock = false;
				}, 500);
			}
		});
	})();
</script>
こんな感じで、正規の名前解決応答が返される前に攻撃者が偽の名前解決応答を送信することで、ユーザを罠サイトに誘導します。<br /><br />次に、DNSキャッシュポイズニング攻撃の一種であるカミンスキー攻撃について説明しますね♪
<div class="explanation">
	<div class="title">カミンスキー攻撃</div>	
	Dan Kaminskyによって発表されたDNSキャッシュポイズニング攻撃の一種です。<br />プレーンDNSキャッシュポイズニング攻撃に比べて大量の試行が可能であり、セキュリティ対策が必須である状態です。<br /><br />以下で、カミンスキー攻撃の手順について説明します。
	<ol class="bg-white">
		<li>攻撃者が標的のDNSサーバに対して、攻撃対象のドメイン名(example.com)の存在しないサブドメイン名(dummy.example.com)によるFQDNの名前解決要求を行う。</li>
		<li>標的となったDNSサーバは当然、自身が知らないFQDNであるため上位のDNSサーバに対して問い合わせる。</li>
		<li>攻撃者は「2」の問い合わせに対する応答より先に、偽の名前解決応答を返します。</li>
		<li>「1」で送信した存在しないFQDNと「3」で送信した偽の応答を変えて再チャレンジ!!(永遠と、、、)</li>
	</ol>
</div>
<div class="step">
	<ul>
		<li>ソースポートランダマイゼーション<br /><small>※UDP53番ポートに対象にした攻撃を無効化</small></li>
		<li><a href="認証プロトコル?to=href_dnssec">DNSSEC</a><span class="sup">※</span><span class="small">(後ほど学習します)</span></li>
		<li>DNSサーバのキャッシュ有効期間を短縮</li>
	</ul>
</div><br />
<div class="exam">
	&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問11 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	DNSキャッシュポイズニング攻撃への有効な対策として、「<strong>DNS問合せに使用するDNSヘッダ内のIDを固定せずにランダムに変更する。</strong>」を挙げています。
</div>
<h2>セッションハイジャック</h2>
攻撃者がクライアント(ユーザ)とサーバの間に入って、「クライアントに対しては正規のサーバに」「サーバに対しては正規のクライアントに」なりすますことで、両社の通信を盗聴したり不正なリクエストやレスポンスを紛れ込ませる攻撃方法です。<br /><br />前述した中間者攻撃もセッションハイジャック攻撃に該当します。<br /><br />セッションハイジャック攻撃の種類として「TCPコネクション」「UDPコネクション」「クライアント・サーバの通信」に対する攻撃に分類できます。<br /><br />最初に、TCPコネクションに対するセッションハイジャック攻撃について説明したいんですけど、、、その前の準備として、TCPコネクションの確立について説明しますね♪
<img src="../pics/3ウェイハンドシェイク.png" alt="3ウェイハンドシェイク" />
<span id="session_button">次へ</span>
TCPコネクションはコネクション確立時に3回のやり取りを行います。(3ウェイハンドシェイク)<br /><br />またTCPコネクションでは、コネクション確立時に互いが受け取ったシーケンス番号に1を加算して相手に返信することで正当性を検証します。<br /><br />以下で、手順を簡単に確認しますね♪
<ol>
	<li>クライアントからサーバに、SYNフラグをオン・初期シーケンスを設定したデータを送信します。</li>
	<li>サーバはSYN/ACKの両方をオンにして、SYNの初期シーケンス番号を設定・ACKには受けとった初期シーケンス番号に1を加算して返します。</li>
	<li>クライアントはACKフラグをオンにして、サーバから受け取ったシーケンス番号に1を加算したでデータを返します。</li>
</ol>
この手順からわかるように、<span class="underline">シーケンス番号さえ矛盾なく送信することさえできれば</span>セッションハイジャックが可能になります。<br /><br />また、TCPコネクションではなくUDPコネクションでは3ウェイハンドシェイクを確立することなくコネクションが成立するため、要求(UDP問い合わせ)に対する応答(UDP応答)より先に偽の応答を送ることでセッションハイジャックが成立します。
<div class="separator"></div>
次に「クライアント・サーバ間の通信」に対するセッションハイジャック攻撃について説明しますね♪<br /><br />現在のwebアーキテクシャスタイルのデファクトスタンダートはRoy Fieldingが考案したREST(Representative State Transfer)です。またRESTの特徴として「ステートレス」があげられます。ステートレス(State Less/状態を持たない)とはサーバとクライアントの通信は一度きりでリセットされるという意味です。<br />ですけどそれだとかなり不便ですよね、、、<br />ログイン認証が完了してもサーバはそれを覚えてくれないので次の画面に進む際にもう一度ログイン認証して、そしてまた次の画面に進むにも再度ログイン認証してと、、、<br /><br />これに対する対応策として、Cookieを使ったセッション管理が誕生しました。一度ログインに認証したらその情報(セッションID/ユーザID等)をCookieとしてブラウザに保存してその後の通信データに付加します。<br />サーバ側はそのデータを基にユーザを識別します。<br /><br />この説明でなんとなくセッションハイジャックがどのように実行されるか分かりましたか???<br />このCookieに含まれる攻撃対象者のセッションIDさえ特定できればセッションハイジャックが可能です。<br /><br />ではセッションハイジャック攻撃に対する対策方法について学びましょう♪
<div class="step">
	<ul>
		<li>URLにセッションIDを含めない。</li>
		<li>ワンタイムセッションIDの発行(session_regenerate_id();//php)</li>
		<li>推測困難なセッションIDの発行</li>
		<li>セッションの有効期限を必要最小限に設定する。</li>
	</ul>
</div>
<h2>セッションフィクセーション</h2>
セッションハイジャックが<span class="underline">クライアントとサーバで確立された</span>セッションをハイジャックするのに対して、セッションフィクセーションでは<span class="underline">攻撃者がサーバとの間で確立した</span>セッションIDを攻撃者に送信して、それをしれっと使わせることでそのセッションをハイジャックする攻撃方法を指します。<br />「Cookie Monster Bug」(CookieのDomain属性が正しく機能しないバグ)があるブラウザでは要注意です。<small>(今はそんなブラウザはほとんどないかな?)</small>
<div class="step">
	<ul>
		<li>URL Rewriting機能をオフに</li>
		<li>セッションIDの再発行</li>
	</ul>
</div>
<h2>リプレイ攻撃</h2>
盗聴によって得たパスワードや暗号鍵、あるいは認証済みのセッションデータなどを再利用してそのユーザーになりすます攻撃のことを指します。<br />TELNETやPOP3といった通信内容を平文で送信する(暗号化しない)プロトコルは、このリプレイ攻撃に対して要注意です。
<div class="step">
	<ul>
		<li>チャレンジレスポンス認証</li>
	</ul>
</div>
<?php footer(); ?>