"use strict";

function clicked() {
	let txt = document.getElementById("txt").value;
	console.log(txt);
	document.getElementById("insert").innerHTML = txt;
	setTimeout(function () {
		window.location.reload();
	}, 500);
}




window.addEventListener("load", function() {
	const doc = document.getElementById("iframe0");
	const width = document.getElementById("main").clientWidth;
	doc.setAttribute("width", width);
	doc.setAttribute("height", width * 0.5);
})
window.addEventListener("load", function() {
	const doc = document.getElementById("iframe1");
	const width = document.getElementById("main").clientWidth;
	doc.setAttribute("width", width);
	doc.setAttribute("height", width * 0.5);
})
window.addEventListener("load", function() {
	const doc = document.getElementById("iframe2");
	const width = document.getElementById("main").clientWidth;
	doc.setAttribute("width", width);
	doc.setAttribute("height", width * 0.5);
})




window.addEventListener("load", function() {
	const for_delete = document.getElementsByClassName("os");
	document.getElementById("select").addEventListener("change", function() {
		let value = this.value;
		os_delete(for_delete);
		document.getElementById(value).classList.remove("hidden");
	})
})
function os_delete(all) {
	for (let i = 0; i < all.length; i++) {
		all[i].classList.add("hidden");
	}
}







// ダウンロード処理(イベントハンドラ)
function downloadImage() {
  const src = "img.png";

  let xhr = new XMLHttpRequest();
  xhr.open('GET', src, true);
  xhr.responseType = "blob";
  xhr.onload = downloadImageToLocal;
  xhr.send();
}

// ローカルへのダウンロード処理(画像リクエスト完了時に動作)
function downloadImageToLocal() {
  let dlLink = document.createElement("a");

  const dataUrl = URL.createObjectURL(this.response);
  dlLink.href = dataUrl;

  const fileName = `mr-campus(drive-by-download).${this.response.type.replace("image/", "")}`;
  dlLink.download = fileName;

  document.body.insertAdjacentElement("beforeEnd", dlLink);
  dlLink.click();
  dlLink.remove();

  setTimeout(function() {
    window.URL.revokeObjectURL(dataUrl);
  }, 1000);
}







window.addEventListener("load", function() {
	let drive_ok = 0;
	const where = document.getElementById("drive_where").getBoundingClientRect().top;
	window.addEventListener("scroll", function() {
		let scrolled = window.scrollY;
		if (scrolled > where && drive_ok === 0 ) {
			let checked = document.getElementById("check_drive").checked;
			if (checked === true) {
				drive_ok = 1;
				downloadImage();
			}
		}
	})
})









