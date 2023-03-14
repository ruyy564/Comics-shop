
<?php 
	require 'query/query.php';
	$title="Комиксы";
	$comics=get_comicses_by_categori(1);
	include 'layouts/categoties.php';

?>