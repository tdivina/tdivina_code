<?php

function nav_main($dbc, $pageid) {
	
	$query = "SELECT * FROM pages";
	$result = mysqli_query($dbc, $query);
	
	while($nav = mysqli_fetch_assoc($result)) {	//echo '<li><a heref="?page='.$nav['id'].'">'.$nav['title'].'</a></li>'; ?>

	<li<?php if($pageid == $nav['id']) {echo ' class="active"'; } ?>><a href="?page=<?php echo $nav['id']; ?>"><?php echo $nav['label']; ?></a></li>	

	<?php }
	
}


?>