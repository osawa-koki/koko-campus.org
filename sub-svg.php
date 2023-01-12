<?php
function put_sub_svg ($title, $font_size) {
	?>
	<svg
		width="300"
		height="50"
		viewBox="0 0 300 50"
		version="1.1"
		xmlns="http://www.w3.org/2000/svg"
		xmlns:svg="http://www.w3.org/2000/svg">
		<rect
			width="300"
			height="50"
			x="0"
			y="0" />
		<text
			style="font-size:<?php echo $font_size; ?>px;"
			transform="rotate(-19.744806,132.71505,-26.080782)">
			<tspan
				x="0"
				y="0"><?php echo $title; ?>
			  </tspan>
		 </text>
		<circle
			cx="150"
			cy="25"
			r="7"
			class="bg-img-circle0"/>
		<circle
			cx="180"
			cy="25"
			r="7"
			class="bg-img-circle1"/>
		<circle
			cx="210"
			cy="25"
			r="7"
			class="bg-img-circle2"/>
	</svg>
	<?php
}
?>