<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div id="container">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Title</th>
					<th scope="col">Body</th>
				</tr>
			</thead>
		<?php if (!empty($Data) && is_array($Data) && count($Data) > 0) {?>
			<tbody>
				<?php foreach ($Data as $key => $value) {?>
					<tr>
						<td><?= !empty($value['userId']) ? $value['userId'] : '-'  ?></td>
						<td><?= !empty($value['title']) ? $value['title'] : '-'  ?></td>
						<td><?= !empty($value['body']) ? $value['body'] : '-'  ?></td>
					</tr>
				<?php } ?>
			</tbody>
		<?php }else{ ?>
			<tbody>
				<tr>
					<td colspan="3">No Record Found</td>
				</tr>
			</tbody>
		<?php } ?>
		</table>
</div>

</body>
</html>