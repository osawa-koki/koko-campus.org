'use strict';





$(document).ready(function () {
     console.log("プログラム名=>code-cuter_ver1");
     console.log("プログラムシリーズ名=>code-cuter");
     console.log("プログラムバージョン=>version1");
     console.log("作成日=>2021年8月30日");
     console.log("作成者=>koko");
     console.log("url=>https://koko-campus.com");
     console.log("<問題点・改善点>\n\noverflowが適切に働かなかった。\nver2で達成すべきは自動でwidthを調整させること!\nおそらくtableを使うべきとの感想を抱いた。\n読み込み元に影響されないように!");
     console.log("<褒めるべき点>\n\n保守性のあるプログラムを作れた。\n純粋関数の作成はかなり上出来!\nモジュール独立性を高くできた!(強強度・疎結合がやはり大切!)");
     console.log("<次回に向けて>\n\n第一にol>liからの脱却かな?\ntableを使うべきか、divでdisplay:flexを使うべきか、、、\n単純にdomとしてjsで操作することを考えればtableがベストかな?");
     console.log("<今回の発見>\n\n発見というか備忘録として、、、\nreplaceメソッドは戻り値を取得しないとダメだよ～\nhtmlcollectionは普通の配列とは異なるからね♪\n");
     console.log("copyright to me");
     console.log("free use is ok under copyleft");
     console.log("おつかれさま♪♪♪");
})






// cssの読み込み
$(document).ready(function () {
     let link = document.createElement("link");
     link.rel = "stylesheet";
     link.href = "./code-cuter/ver1.css";
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


const checker_html = {};
checker_html["html"] = "#FF3300";
checker_html["head"] = "#FF0000";
checker_html["meta"] = "#003366";
checker_html["h1"] = "#FFFF00";
checker_html["h2"] = "#FFFF11";
checker_html["h3"] = "#FFFF22";
checker_html["h4"] = "#FFFF33";
checker_html["h5"] = "#FFFF44";
checker_html["h6"] = "#FFFF55";
checker_html["p"] = "#FF00FF";
checker_html["a"] = "#00FF00";
checker_html["table"] = "";
checker_html["tr"] = "";
checker_html["th"] = "";
checker_html["td"] = "";
checker_html["img"] = "";
checker_html["ul"] = "";
checker_html["ol"] = "";
checker_html["li"] = "";
checker_html["form"] = "#FF0066";
checker_html["input"] = "#FF0099";
checker_html["div"] = "#3300FF";


const checker_jq = {};
checker_jq["document"] = "#FF3300";
checker_jq["get"] = "#FF0000";



const checker_js = {};
checker_js["document"] = "#FF3300";
checker_js["get"] = "#FF0000";







$(document).ready(function () {
     get_html_and_sanitize_it();
})


// 非純粋関数=>各codeに「色付け・li_split」されたhtmlを挿入
// 引数なし(準引数として各codeタグのinner_htmlを取得)
// 戻り値なし(準戻り値として各codeタグに処理されたinner_htmlを挿入)
function get_html_and_sanitize_it() {
     let code = document.getElementsByTagName("code");

     for (let i = 0; i < code.length; i++) {
          let html = code[i].innerHTML;
          let cls = code[i].className;
          html = html.replace(/</g, "&lt;").replace(/>/g, "&gt;");
          let code_colored = coloring_code(html, cls);
          cls = "";
          let code_splitted = code_splitter(code_colored);
          code[i].innerHTML = "<div class = 'wrap_code'><ol>" + code_splitted + "</ol></div>";
     }
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
     for (let i = 0; i < line.length; i++) {
          if (line[i] == "") {
               continue;
          }
     let list_added = "<li>" + line[i] + "</li>";
     html_splitted += list_added;
     }
     return html_splitted;
}



















