'use strict';

$(document).ready(function () {
     console.log("プログラム名=>code-cuter_ver2");
     console.log("プログラムシリーズ名=>code-cuter");
     console.log("プログラムバージョン=>version2");
     console.log("作成日=>2021年8月31日");
     console.log("作成者=>koko");
     console.log("url=>https://koko-campus.com");
     console.log("preタグ>codeタグでコードを囲む\ncodeタグのクラス名に言語を設定")
     console.log("<問題点・改善点>\n\nタブとスペースの処理。\nver3で達成すべきはタブを自動で調整すること。\n正規表現で先頭のタブ数の最小値を求めて、そのpre-code内の全てのtdからその文を引く!");
     console.log("<褒めるべき点>\n\nパス指定を保守性を考慮してthis_dirから行った。\n前回に続いて純粋関数の作成はかなり上出来!\nモジュール独立性を高くできた!(強強度・疎結合がやはり大切!)");
     console.log("<次回に向けて>\n\n第三者に公開するならテーマをつけるべきかな?\nあとはコピーした際に添え字の1.2.3が入ってしまうのは許容しがたい、、、\nコピーボタンで対応するのもありかな?\nsticky属性を使えたのはいいんだけど、スクロール時に若干背景が透けちゃうんだよね、、、\nパラメーターを渡したらその行(区間)を協調できるようにしたいな♪\nあとはかなり難易度が高いけれど、括弧をタッチすればその対になっている括弧を強調して、スコープ作成識別子(function forなど)をタッチすればそのスコープをspanで囲んで下線を引けたらかなり良くなるハズ。\n脱jqueryにも挑戦してみようかな???");
     console.log("<今回の発見>\n\n発見というか備忘録として、、、\njsonファイルの最後のセットの後ろにカンマはつけちゃダメだよ～\n変数はかぶらないようにね、、、(再三)\n");
     console.log("copyright to me");
     console.log("free use is ok under copyleft");
     console.log("おつかれさま♪♪♪");
})



let this_path;
(function(){
    let root;
    let scripts = document.getElementsByTagName("script");
    for (let i = 0; i < scripts.length; i++) {
        let match = scripts[i].src.match(/(^|.*\/)ver2\.js$/);
        if (match) {
            root = match[1];
        }
    }
    this_path = root;
})();




// cssの読み込み
$(document).ready(function () {
     let path = location.pathname;
     let link = document.createElement("link");
     link.rel = "stylesheet";
     link.href = this_path + "ver2.css";
     link.type = "text/css";
     let head = document.getElementsByTagName("head")[0];
     head.appendChild(link);
})


/* これでもok!
$(function() {
     let link_stylesheet = $("<link>").attr({"rel": "stylesheet", "href": "code-ver1.css"});
     $("body").append(link_stylesheet);
     console.log(link_stylesheet);
})
*/

let checker_html = new Object();
$.getJSON(this_path + "html.json", (data) => {
     checker_html = data;
})
.fail(function(jqXHR, textStatus, errorThrown) {
     console.log(textStatus);
     console.log(jqXHR.responseText);
})


let checker_jq = new Object();
$.getJSON(this_path + "jq.json", (data) => {
     checker_jq = data;
})
.fail(function(jqXHR, textStatus, errorThrown) {
     console.log(textStatus);
     console.log(jqXHR.responseText);
})


let checker_js = new Object();
$.getJSON(this_path + "js.json", (data) => {
     checker_js = data;
})
.fail(function(jqXHR, textStatus, errorThrown) {
     console.log(textStatus);
     console.log(jqXHR.responseText);
})


$(document).ready(function () {
     koko_code();
})

// 非純粋関数=>各codeに「色付け・li_split」されたhtmlを挿入
// 引数なし(準引数として各codeタグのinner_htmlを取得)
// 戻り値なし(準戻り値として各codeタグに処理されたinner_htmlを挿入)
function koko_code() {
     let code = document.getElementsByTagName("code");

     for (let i = 0; i < code.length; i++) {
          let html = code[i].innerHTML;
          let cls = code[i].className;
          html = escaping(html);
          let code_colored = coloring_code(html, cls);
          let code_splitted = code_splitter(code_colored);
          let caption = get_caption(cls);
          code[i].innerHTML = "<div class = 'code_div'><table class = 'code_table'>" + caption + "<tbody>" + code_splitted + "</tbody></table><div>";
     }
}

function escaping(content) {
     content = content
     .replace(/</g, "&lt;").replace(/>/g, "&gt;")
     .replace(/\$/g, "&dollar;");
     return content;
}


// 純粋関数
// 引数=>各precode内のhtml
// 戻り値=>指定要素のstyle:colorをspanタグで囲まれたhtml
function coloring_code(html, cls) {
     if (cls == "html") {
          for (let key in checker_html) {
               let target = new RegExp("&lt;" + key + "&gt;", "g");
               let changed = "&lt;<span style = 'color: " + checker_html[key] + "''>" + key + "</span>&gt;";
               html = html.replace(target, changed);
               target = new RegExp("&lt;/" + key + "&gt;", "g");
               changed = "&lt;/<span style = 'color: " + checker_html[key] + "''>" + key + "</span>&gt;";
               html = html.replace(target, changed);
          }
     } else if (cls == "jq") {
          for (let key in checker_jq) {
               let target = new RegExp(key, "g");
               let changed = "<span style = 'color: " + checker_jq[key] + "''>" + key + "</span>";
               html = html.replace(target, changed);
          }          
     } else if (cls == "js") {
          for (let key in checker_js) {
               let target = new RegExp(key, "g");
               let changed = "<span style = 'color: " + checker_js[key] + "''>" + key + "</span>";
               html = html.replace(target, changed);   
          }     
     }
     return html;
}

// 純粋関数
// 引数=>各precode内のhtml
// 戻り値=>各行がliタグで囲まれたhtml
function code_splitter(html) {
     let line = html.split("\n");
     let html_splitted = new String();
     let count = 0;
     for (let i = 0; i < line.length; i++) {
          if (line[i] == "") {
               continue;
          }
          count += 1;
     let list_added = "<tr><th>" + count + "</th><td>" + line[i] + "</td></tr>";
     html_splitted += list_added;
     }
     return html_splitted;
}



function get_caption(cls) {
     switch(cls) {
          case "html":
          return "<caption>html</caption>";
          case "js":
          return "<caption>javascript</caption>";
          case "jq":
          return "<caption>jquery</caption>";
     }   
}



