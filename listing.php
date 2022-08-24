<?php
	/*echo "<xmp>";
	print_r($row);
	echo "</xmp>";*/
?>
<style type="text/css">
	.listing_table th {border:1px solid black;width:20%}
	.listing_table td {border:1px solid black}
	.sort {cursor:pointer;}
</style>
<div>
	<div id="aa">
	</div>
	<table class="listing_table">
		<input type="hidden" name="sort_name" value="<?=$sort_name?>">
		<input type="hidden" name="sort_type" value="<?=$sort_type?>">
		<tr>
			<th></th>
			<?php
				$title_arr = array("num", "price", "deposit", "date");
				foreach($title_arr as $key) {
					$show_sort = "";
					if($sort_name == $key) {
						$show_sort = ($sort_type == "asc") ? "▲" : "▼";
					}

					$sort = ($show_sort == "▼") ? "asc" : "desc";

					/*
					$sort = ($show_sort == "▲") ? "desc" : "asc";

					if($key == "num" && $sort_type == "") {
						$sort = "desc";
					}*/
			?>
			<th class="sort" onclick="javascript:etc.sort_click('<?=$key?>', '<?=$sort?>');">
				<?=$key?>
				<span class="<?=$key?>_sort"><?=$show_sort?></span>
			</th>
			<?php
				}
			?>
		</tr>
		<?php
			if(count($row) > 0) {
				foreach($row as $key=>$arr) {
		?>
		<tr class="trbg tr_<?=$arr["num"]?>" onclick="javascript:comparison_check('<?=$arr['num']?>')" style="cursor:pointer">
			<td style="text-align:center;">
				<span class="comp" id="comp_<?=$arr["num"]?>"></span>
				<input type="hidden" name="num[]" id="num_<?=$arr["num"]?>" class="<?=$arr["num"]?>" value="" onclick="">
			</td>
			<td><?=$arr["num"]?></td>
			<td class="price price_<?=$arr["num"]?>"><?=$arr["price"]?></td>
			<td class="deposit deposit_<?=$arr["num"]?>"><?=$arr["deposit"]?></td>
			<td><?=$arr["date"]?></td>
		</tr>
		<?php
				}
			} else {  //
		?>
		<tr>
			<td colspan="4">none data</td>
		</tr>
		<?php
			} 
		?>
	</table>
</div>

	
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="/ci/public/test/js/common.js"></script>
<script type="text/javascript">
	function comparison_check(num) {
		var eq = 0;
		var cnt = 0;
		var chk = "";
		$("input[name='num[]']").each(function(){
			if($("input[name='num[]']").eq(eq).val() == "Y") {
				cnt += 1;
				chk = $("input[name='num[]']").eq(eq).attr("class");
				$("input[name='num[]']").eq(eq).parent("tr").css("background-color", "yellow");

				//console.log($("input[name='num[]']").eq(eq).attr("class"));
			}
			eq += 1;
		});
		if(cnt >= 2) {
			$(".comp").html("");
			$("input[name='num[]']").val("");
			$(".trbg").css("background-color", "");
			$(".price").css("color", "");
			$(".deposit").css("color", "");
			$("#aa").html("");
			chk = "";
		}
		$("#comp_"+num).html("✓");
		$("#num_"+num).val("Y");
		$(".tr_"+num).css("background-color", "yellow");

		if(cnt == 1) {
			$.ajax({
				url : "/CI/Page/comparison/"+chk+"/"+num,
				success : function(e) {
					//console.log(e);
					$("#aa").html(e);

				}
			})
		}
	}
	$(".sort").click(function(){
		console.log($(this).find("span").attr("class"));


		//이거 ajax로 던지는게 아니라 php단에서 찢어줘야함
		if($(this).find("span").html() == "" || $(this).find("span").html() == "▲") {
			$(this).find("span").html("▼")
		} else {
			$(this).find("span").html("▲")
		}
	})
	
</script>