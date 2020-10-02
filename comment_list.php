<?php

include 'db.php';

$result = mysqli_query($conn,"SELECT * FROM comments ORDER BY id DESC");

if(mysqli_num_rows($result)>0) {

	while($row=mysqli_fetch_object($result)) {
		?>
		<div class="comment-row">
			<div class="user-name"><?php echo $row->name;?></div>
			<div class="user-email"><?php echo $row->email;?></div>
			<div class="user-comment"><?php echo $row->comment;?></div>
		</div>
		<?php
	}

}

mysqli_free_result($result);
mysqli_close($conn);

?>