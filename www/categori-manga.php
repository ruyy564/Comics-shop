
<?php 
	require 'query/query.php';
	$title="Манга";
	$comics=get_comicses_by_categori(2);
	include 'layouts/categoties.php';

?>