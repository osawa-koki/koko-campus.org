"use strict";

const mkElm = ([n, ...r]) => (n !== undefined)
	? [document.createElement(n), ...mkElm(r)] : [];
const getElm = ([n, ...r]) => (n !== undefined)
	? [document.getElementById(n), ...getElm(r)] : [];
const getCls = n => document.getElementsByClassName(n)[0];
const ers = doc => {
	while(doc.firstChild){
		doc.removeChild(doc.firstChild);
	}
}
const ersForward = obj => {
	while(obj.nextElementSibling){
		obj.nextElementSibling.remove();
	}
}
const obj2qstr = obj => Object.keys(obj).map(k => encodeURIComponent(k) + "=" + encodeURIComponent(obj[k])).join("&");

