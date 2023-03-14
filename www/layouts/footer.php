		<footer class="footer">
				<div class="web-info">2021 © Магазин комиксов</div>
				<div class="web-info">Klimkin K.S 8413</div>
		</footer>
		<script src="../template/js/jquery.js"></script>
		<script>
			$(document).ready(function(){
				$(".good-button-buy").click(function(){
					var id = $(this).attr("data-id");
					$.get("../card-processing.php?id="+id,{},function(data){
						$(".count-card").html(data);
					});
					return false;
				});
				$(".icon-plus").click(function(){
					var id = $(this).attr("data-id");
					$.get("../card-processing.php?id="+id,{},function(data){
						$(".count-card").html(data);
						var count =$(`.${id}`).text();
						var price = Number.parseInt($(`.price_${id}`).text());
						//location.reload();
						var total_price_in_card=Number.parseInt($(`.total-price-in-card`).text())+price;
						$(`.total-price-in-card`).html(total_price_in_card);
						count = Number.parseInt(count)+1;
						var total_price =count*price;
						$(`.${id}`).html(count);
						$(`.p${id}`).html(count);
						$(`.cost_${id}`).html(total_price);
					});

					return false;
				});
				$(".icon-minus").click(function(){
					var id = $(this).attr("data-id");
					$.get("../card-sub.php?id="+id,{},function(data){
						var count =Number.parseInt($(`.${id}`).text());
						$(".count-card").html(data);
						var price = Number.parseInt($(`.price_${id}`).text());
						count --;
						if(count==0){
							count=1;
							var total_price_in_card=Number.parseInt($(`.total-price-in-card`).text());
						}else{
							var total_price_in_card=Number.parseInt($(`.total-price-in-card`).text())-price;
						}
						var total_price =count*price;
						$(`.total-price-in-card`).html(total_price_in_card);
						$(`.${id}`).html(count);
						$(`.p${id}`).html(count);
						$(`.cost_${id}`).html(total_price);
					});

					return false;
				});
				$(".icon-delete").click(function(){
					var id = $(this).attr("data-id");
					$.get("../card-del.php?id="+id,{},function(data){
						$(".count-card").html(data);
						location.reload();
					});

					return false;
				});
				$(".change-profil").click(function(){
					$(".edit").css({'display':'block'});
					$(".person").css({'display':'none'});
					$(".change-profil").css({'display':'none'});
					return false;
				});
				$(".back").click(function(){
					$(".edit").css({'display':'none'});
					$(".person").css({'display':'flex'});
					$(".change-profil").css({'display':'block'});
					return false;
				});
			});
		</script>
