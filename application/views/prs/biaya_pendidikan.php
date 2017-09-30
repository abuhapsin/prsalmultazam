<?php
foreach ($prs_info as $pi) {
	echo "<ul class='list-group'>
	  	<li class='list-group-item list-group-item-success'>".strtoupper($pi->judul_info)."</li>
		<li class='list-group-item list-group-item-light'>$pi->isi_info</li>
	</ul>";
}
?>

	