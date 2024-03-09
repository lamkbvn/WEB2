<?php
require_once("View/layout/header-admin.php");
?>

<!-- View/admin/list.php -->
<tr>
	<td><?php echo $user['fullname']; ?></td>
	<td><?php echo $user['email']; ?></td>
	<td>
		<a href="#" class="edit_user" data-id="<?php echo $user['id']; ?>">Edit</a>
		<a href="#" class="delete_user" data-id="<?php echo $user['id']; ?>">Delete</a>
	</td>
</tr>