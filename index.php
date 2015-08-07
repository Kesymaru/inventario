<?php

echo '<!DOCTYPE html>
<html>
<head>
	<title>Inventario</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
<body>
';

require_once('ItemsClass.php');

// instace of the items
$items = new Items();

// get all items on the database
$myItems= $items->all();

// print the table
echo '<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Created</th>
				<th>Updated</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>

';

foreach ($myItems as $key => $item) {
	echo '<tr id="'.$item['id'].'">
			<td>
				'.$item['id'].'
			</td>
			<td>
				<input 
				id="name-'.$item['id'].'" 
				value="'.$item['name'].'"
				onchange="app.update(\''.$item['id'].'\')"
				>
			</td>
			<td>'
				.$item['created'].
			'</td>
			<td>'
				.$item['updated'].
			'</td>
			<td>
				<button onclick="app.delete(\''.$item['id'].'\')">
					Delete
				</button>
			</td>
		  </tr>';
}

echo '</tbody>
	<tfoot>
		<tr>
			<td>New</td>
			<td colspan="2">
				<input id="new-name" placeholder="New Item">
			</td>
			<td></td>
			<td>
				<button onclick="app.new()">
					Create
				</button>
			</td>
		</tr>
	</tfoot>
</table>';

?>

	<script type="text/javascript" src="main.js"></script>

</body>
</html>