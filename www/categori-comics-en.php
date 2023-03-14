
<?php 
	require 'query/query.php';
	$title="Комиксы на английском";
	$comics=get_comicses_by_categori(3);
	include 'layouts/categoties.php';

?>