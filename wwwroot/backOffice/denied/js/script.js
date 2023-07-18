(() => {
	const [s, b] = getElm(["select", "B"]);
	s.addEventListener("change", function() {
		Array.from(document.getElementsByClassName("show")).forEach(e => {
			e.classList.remove("show");
		});
		document.getElementById(this.value).classList.add("show");
	});
})();