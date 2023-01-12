"use strict";



window.addEventListener("load", function() {

	// このjsファイルのパスを求める
	// 参照元のhtmlのscriptタグを全て取得して、src属性がこのファイル名に一致するものを取得
    let root;
    let scripts = document.getElementsByTagName("script");
    for (let i = 0; i < scripts.length; i++) {
        let match = scripts[i].src.match(/(^|.*\/)ver1\.js$/);
        if (match) {
            root = match[1];
        }
    }


    // cssリンク先を追加
    // linkタグを生成してheadタグの最後に追加する
    let link = document.createElement("link");
    link.rel = "stylesheet";
    link.href = root + "ver1.css";
    link.type = "text/css";
    let head = document.getElementsByTagName("head")[0];
    head.appendChild(link);




    // koko-chartクラスを取得

	let chart = document.getElementsByClassName("koko-chart");
	for (let i = 0; i < chart.length; i++) {


		// 各koko-chartブロックごとに処理を開始
		let content = chart[i].textContent;

		// 全てのスペース・タブ等を削除
		content = content.replace(/\s/g, "");

		// textcontentを整形・オブジェクト化
		content = get_property(content);
		content.like_term_into_one();
		content.create_array_out_of_formula();
		console.log(content);


	}
})





// 純粋関数
// 引数=>\sを取り除いたtextcontent
// 戻り値=>「各属性:値」形式のobject
function get_property(content) {

	// 戻り値用のobjectの宣言
	// デフォルト値としてwidth=>600px,height=>600pxを設定
	// formulaは複数想定して予め配列型をセット
	// calculateメソッドではxとyの範囲を設定
	let obj = {
		"width":"600px",
		"height":"600px",
		"formula":[],
		like_term_into_one:function() {
			like_term_into_one(this.formula)
		},
		put_multiple_mark:function() {
			// 要らなくなりました、、、
			put_multiple_mark(this.formula);
		},
		create_array_out_of_formula:function() {
			let answer = create_array_out_of_formula(this.formula);
			this.broken_formula = answer;
		},
		calculate_min_max:function() {

			// xとy両方の範囲が指定されていたら、、、
			if (typeof this.x_range !== "undefined" && typeof this.y_range !== "undefined") {
				// 何もしない、、、
			} else


			// xの範囲が指定されていて、yの範囲が指定されていなかったら、、、
			if (typeof this.x_range !== "undefined" && typeof this.y_range === "undefined") {
				// 実際の式(formula)にxの取り得る値を代入してyの範囲(Min・Max)を求める
				get_min_max(this.formula, this.x_range, "x");
			}


			// yの範囲が指定されていて、xの範囲が指定されていなかったら、、、
			if (typeof this.x_range === "undefined" && typeof this.y_range !== "undefined") {
			}


			// xとyの範囲が両方指定されていなかったら、、、
			if (typeof this.x_range === "undefined" && typeof this.y_range === "undefined") {
			}


		}
	}

	let range = new Array;
	content = content.split(",");
	for (let i = 0; i < content.length; i++) {
		let element = content[i];

		// 文字列に「x」「=」「y」が含まれていたら、、、
		if (element.search(/(?=.*x)(?=.*=)(?=.*y)/g) !== -1) {
			obj["formula"].push(element);
		} else

		// 文字列に「width」が含まれていたら、、、
		if (element.search(/width/g) !== -1) {
			obj["width"] = element.replace(/width=/g, "");
		} else

		// 文字列に「height」が含まれていたら、、、
		if (element.search(/height/g) !== -1) {
			obj["height"] = element.replace(/height=/g, "");
		} else

		// 文字列に「-x-」が含まれていたら、、、
		if (element.search(/-x-/g) !== -1) {

			// 正規表現「x(?=Y)」=>xの次にyが現れる場合、xにマッチ
			range.push(element.match(/(.*)(?=-x-)/g)[0]);

			// 正規表現「(?<=x)y」xの次にyが現れる場合、yにマッチ
			range.push(element.match(/(?<=-x-)(.*)/g)[0]);

			range.sort();
			obj["x_range"] = range;
			range = [];
		} else

		// 文字列に「-y-」が含まれていたら、、、
		if (element.search(/-y-/g) !== -1) {

			// 正規表現「x(?=Y)」=>xの次にyが現れる場合、xにマッチ
			range.push(element.match(/(.*)(?=-y-)/g)[0]);

			// 正規表現「(?<=x)y」xの次にyが現れる場合、yにマッチ
			range.push(element.match(/(?<=-y-)(.*)/g)[0]);
			
			range.sort();
			obj["y_range"] = range;
			range = [];
		}
	}
	return obj;
}








// 純粋関数
// 引数=>各式(非整形)
// 戻り値=>各式(同類項を計算済)
// 一旦中止、、、そのまま返す
function like_term_into_one(formula) {
	for (let i = 0; i < formula.length; i++) {
		let exp = formula[i].split("=");
	}
	return formula;
}



// 純粋関数
// 引数=>各式(非整形)
// 戻り値=>各式(「数字*x」の形に変形済)
function put_multiple_mark(formula) {
	for (let i = 0; i < formula.length; i++) {
		formula[i] = formula[i].replace(/(?<=\d)x/g, "*x");
	}
	return formula;
}






// 純粋関数
// 引数=>式(配列型)->「y=ax**3+bx**2+cx+d」の形
// 戻り値=>二次元配列型の式の構成情報(「x**0,x**1,x**2...」の配列の配列)
function create_array_out_of_formula(exp) {

	let formula_array = [];

	for (let i = 0; i < exp.length; i++) {
		let formula = exp[i];
		let array = [];

		// 単純数値を計算
		// 項が最後にないと正しく動作しない、、、
		// 正規表現=>行末にある数字
		if (formula.search(/\d+$/) !== -1) {
			array.push(formula.match(/\d+$/)[0]);
		} else {
			array.push("0");
		}


		// xの係数の数値を計算
		// 項が最後にあると正しく動作しない、、、
		// 正規表現=>「=」「+」「-」の後に続く数字(肯定戻り読み)
		// 正規表現=>後ろに*が続かないxの前の数字(肯定先読み+否定先読み)
		if (formula.search(/(?<=[=|+|-])\d+(?=x(?!\*))/) !== -1) {
			array.push(formula.match(/(?<=[=|+|-])\d+(?=x(?!\*))/)[0]);
		} else {
			array.push("1");
		}


		// もし累乗計算があれば、、、
		// 正規表現=>「x**」の前の数字(肯定先読み)

		// 固定数(to_how_many)は「2以上の正の整数」
		const to_how_many = 3;
		for (let j = 0; j < to_how_many - 1; j++) {

			// 正規表現=>「x**」の後の設定された数字(2.3.4...)続く場合の「x**」の前の数字
			let reg = "\\d*(?=x\\*{2}" + (to_how_many - 1 + j) + ")";
			reg = new RegExp(reg);


			if (formula.search(reg) !== -1) {
				array.push(formula.match(reg)[0]);
			} else {
				array.push("0");
			}
		}
	formula_array.push(array);
	}
	return formula_array;
}



























