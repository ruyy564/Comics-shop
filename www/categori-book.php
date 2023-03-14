
<?php 
	require 'query/query.php';
	$title="Книги";
	$comics=get_comicses_by_categori(4);
	include 'layouts/categoties.php';

?>