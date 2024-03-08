<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

</head>

<body>
	<?php
	require_once("View/layout/header-admin.php");
	?>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var navigationLinks = document.querySelectorAll(".navigation a");
			navigationLinks.forEach(function(link) {
				link.addEventListener("click", function(event) {
					event.preventDefault();
					var url = this.getAttribute("href");
					window.location.href = url;
				});
			});
		});
	</script>
</body>

</html>