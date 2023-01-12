"use strict";


/* グローバル変数の定義 */
const
	numberCount = 9, // 一行・一列の長さ
	blockSeparation_count = 3 // 枠のサイズ(9 / 3)
;
const xor = (a, b) => (a || b) && !(a && b);

const getStandard_position = n => {
	let answer;
	switch (n) {
		case 0: case 1: case 2:
			answer = 0;
			break;
		case 3: case 4: case 5:
			answer = 3;
			break;
		case 6: case 7: case 8:
			answer = 6;
			break
	}
	return answer;
};

const main = () => { // メインの処理(ボタンがクリックされたら)
	const
		inputObjects = Array.from(document.getElementById("outline-box").querySelectorAll("input[type='number']")), // 入力用の「input」オブジェクト
		inputObjects2 = inputObjects.slice(),
		array_9x9 = new Array()
	;
	for (let x = 0; x < numberCount; x++) { // 外側のループ
		const temp_array9 = new Array();
		for (let y = 0; y < numberCount; y++) { // 内側のループ
			const n = parseInt(inputObjects.shift().value); // 入力された値を取得
			/*
			temp_array9.push(
				(!isNaN(n)) ? [n] : [...Array(9)].map((_, i) => i + 1) // 数値が入力されていたらその数値だけを、入力されていなかったら「1 ～ 9」の全ての可能性を
			);
			*/
			temp_array9.push(n || 0);
		}
		array_9x9.push(temp_array9); // 内側のループで作成した配列を全体の配列の各要素に代入
	}
	if (solver(array_9x9)) {
		console.log(array_9x9);
		for (let x = 0; x < numberCount; x++) {
			for (let y = 0; y < numberCount; y++) {
				const nm = y * numberCount + x;
				if (isNaN(parseInt(inputObjects2[nm].value)) && parseInt(inputObjects2[nm].value) !== 0) {
					inputObjects2[nm].value = array_9x9[y][x];
					inputObjects2[nm].classList.add("filled");
				} else {
					inputObjects2[nm].value = array_9x9[y][x];
				}
			}
		}
	} else {
		window.alert("解がありません。");
	}
};



const solver = (array_9x9, x=0, y=0) => {
	const [newX, newY] = (x === numberCount - 1) ? [0, y + 1] : [x + 1, y]; // 次の座標
	if (numberCount - 1 < y) { // 81個分埋まったら終了、、、
		return true;
	} else { // まだ残りがあれば、それを埋める♪
		if (array_9x9[y][x] !== 0) { // 既に数値が埋められていたら、、、
			if (solver(array_9x9, newX, newY)) {
				return true;
			}
			return false;
		} else { // 数値が埋まっていなければ、、、
			for (let i = 1; i <= 9; i++) { // 入れてもok!な数字を探す
				if (check(array_9x9, [x, y], i)) { // 入れてもok!な数字があれば、、、
					array_9x9[y][x] = i; // それを代入
					if (solver(array_9x9, newX, newY)) {
						return true;
					}
				}
			}
			array_9x9[y][x] = 0;
			return false;
		}
	}
}


const check = (array_9x9, [x, y], i) => {
	if (row(array_9x9, y, i) && column(array_9x9, x, i) && block(array_9x9, [x, y], i)) {
		return true;
	}
	return false;
}

const row = (array_9x9, y, i) => {
	let answer = true;
	for (let X = 0; X < numberCount; X++) {
		if (array_9x9[y][X] === i) {
			answer = false;
		}
	}
	return answer;
}
const column = (array_9x9, x, i) => {
	let answer = true;
	for (let Y = 0; Y < numberCount; Y++) {
		if (array_9x9[Y][x] === i) {
			answer = false;
		}
	}
	return answer;
}
const block = (array_9x9, [x, y], i) => {
	let answer = true;
	const
		xBase = Math.floor(x / 3) * 3,
		yBase = Math.floor(y / 3) * 3
	;
	for (let X = xBase; X < xBase + 3; X++) {
		for (let Y = yBase; Y < yBase + 3; Y++) {
			if (array_9x9[Y][X] === i) {
				answer = false;
			}
		}
	}
	return answer
}



const inputCheck = (array_9x9, [xPosition_unique, yPosition_unique], i) => {
	const dupilicativeNumber = array_9x9[xPosition_unique][yPosition_unique];
	let ok = true;
	(() => { // 一意と判別した数字を行・列から削除
		for (let x = 0; x < numberCount; x++) {
			for (let y = 0; y < numberCount; y++) {
				if (xor(x === xPosition_unique, y === yPosition_unique)) {
					if (dupilicativeNumber === array_9x9[x][y]) {
						ok = false;
					}
				}
			}
		}
	})();
	(() => { // 一意と判別した数字をブロックから削除
		// 当該座標の基準座標を求める
		const
			standardX = getStandard_position(xPosition_unique),
			standardY = getStandard_position(yPosition_unique)
		;
		for (let x = standardX; x < standardX + 3; x++) {
			for (let y = standardY; y < standardY + 3; y++) {
				if (xor(x === xPosition_unique, y === yPosition_unique)) {
					if (dupilicativeNumber === array_9x9[x][y]) {
						ok = false;
					}
				}
			}
		}
	})();
	return ok;
};


const solve_disabled = (array_9x9) => {
	const uniqueNum_array = new Array();

	/* 一意となった整数とその位置を取得 */
	array_9x9.forEach((depth1, x) => { // 外側のループ
		depth1.forEach((depth2, y) => { // 内側のループ
			if (depth2.length === 1) {
				uniqueNum_array.push({
					"number": depth2[0],
					"x": x,
					"y": y
				});
			}
		});
	});

	/* 一意となった整数をその関係部分の可能性から削除 */
	uniqueNum_array.forEach(uniqueOne => {
		const
			dupilicativeNumber = uniqueOne.number,
			xPosition_unique = uniqueOne.x,
			yPosition_unique = uniqueOne.y
		;
		(() => { // 一意と判別した数字を行・列から削除
			for (let x = 0; x < numberCount; x++) {
				for (let y = 0; y < numberCount; y++) {
					if (xor(x === xPosition_unique, y === yPosition_unique)) {
						const numberOfIndex = array_9x9[x][y].indexOf(dupilicativeNumber);
						if (numberOfIndex !== -1) {
							array_9x9[x][y].splice(numberOfIndex, 1); // 当該数字を可能性配列から削除
						}
					}
				}
			}
		})();
		(() => { // 一意と判別した数字をブロックから削除
			// 当該座標の基準座標を求める
			const
				standardX = getStandard_position(xPosition_unique),
				standardY = getStandard_position(yPosition_unique)
			;
			for (let x = standardX; x < standardX + 3; x++) {
				for (let y = standardY; y < standardY + 3; y++) {
					if (xor(x === xPosition_unique, y === yPosition_unique)) {
						const numberOfIndex = array_9x9[x][y].indexOf(dupilicativeNumber);
						console.log(numberOfIndex);
						if (numberOfIndex !== -1) {
							array_9x9[x][y].splice(numberOfIndex, 1); // 当該数字を可能性配列から削除
						}
					}
				}
			}
		})();
	});
};



window.addEventListener("load", () => {
	document.getElementById("button_toSolve").addEventListener("click", main);
});