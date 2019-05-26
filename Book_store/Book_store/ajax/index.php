<?php
$pages = 3;
?>
<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Ajax</title>
	<link rel="stylesheet" type="text/css" href="media/css/pure.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="media/css/main.css" media="all"/>
	<script type="text/javascript" src="media/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="media/js/main.js"></script>
</head>
<body>
<div class="container">
	<main class="box-table-ajax">
		<form>
		<p>
			<select name="autorID" id="select-author">
				<option value="">Select Author</option>
			</select>
			<select name="janreID" id="select-janre">
				<option value="">Select Janre</option>
			</select>
			<button type="button" id="btn_search" >Search</button>
		</p>
		</form>

		<table class="table-ajax pure-table pure-table-striped js-table-ajax">
			<thead>
			<tr>
				<td>Id</td>
				<td>Author</td>
				<td>Book</td>
				<td>Price</td>
			</tr>
			</thead>

			<tbody class="js-table-ajax-content">

			</tbody>

		</table>

		<p class="preloader">
			<b>Loading ...</b>
		</p>

		<nav class="nav">
			Page:
			<?php for ($i = 1; $i <= $pages; $i++) { ?>
				<button class="pure-button js-table-ajax-page" type="button"
				        data-page="<?php echo $i; ?>"><?php echo $i; ?></button>
			<?php } ?>
		</nav>
	</main>
</div>
</body>
</html>
