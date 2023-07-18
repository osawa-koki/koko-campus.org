"use strict";






window.addEventListener("load", function() {
	let count = -1;
	const arw = [
		"m 42,91.2 -0.5,-6.1 50.5,-1.3 z",
		"m 89.5,78.5 0.4,6.1 c 0,0 -47.4,12.3 -57.9,-4 -8.4,-13.1 16.7,-43.7 16.7,-43.7 0,0 -20.3,30.5 -11.5,42 10.7,13.8 52.3,-0.4 52.3,-0.4 z",
		"m 42.8,36.7 5.7,2.2 -18.8,40.5 z",
		"m 42.9,39.3 5.8,2 c 0,0 -16.8,23.5 -10.8,33.6 9.8,16.7 57,11.3 57,11.3 0,0 -50.9,9 -62.5,-8.6 -7.3,-11 10.5,-38.3 10.5,-38.3 z",
		"m 89.5,78.5 0.4,6.1 -48.6,-0.2 z",
		"m 42,91.2 -0.5,-6.1 50.5,-1.3 z",
		"",
	]
	const comment = [
		"ユーザがSPにサービスの利用を要求します。",
		"SPはIdPにリダイレクトして認証要求(SAML Request)をします。",
		"認証要求を受けたIdPはユーザ認証を実施します。",
		"認証に成功した場合は、アサーションを生成してSPにリダイレクトします。",
		"SPはユーザに対してCookieを発行します。",
		"ユーザがSPのサービスを利用します。",
		"終了!!!"
	]
	document.getElementById("saml_next").addEventListener("click", function() {
		count++;
		document.getElementById("saml_comment").classList.remove("hidden");
		document.getElementById("saml_arw").setAttribute("d", arw[count]);
		document.getElementById("saml_comment").textContent = `Step${count + 1}---${comment[count]}`;
		if (count === 6) {
			count = -1;
		}
	})
})























