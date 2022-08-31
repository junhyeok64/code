<style type="text/css">
	.cboard {border:1px solid black;text-align:center;}
	.cboard td {padding:0 30px;border:1px solid red;}
</style>

<table class="cboard">
	<tr>
		<th>대분류</th>
		<th>확인</th>
		<th>중분류</th>
		<th>확인</th>
		<th>소분류</th>
		<th>비고</th>
	</tr>
<?php
	$out = "";

	foreach($data as $key=>$arr) {
		$out .= "<tr class='btr_".$arr["big_code"]."' cnt='".($arr["cnt"])."'>";
		$out .= "<td class='big_".$arr["big_code"]."'>".$arr["big_code"]." - ".$arr["title"]."</td>";
		$out .= "<td class='big_".$arr["big_code"]."'><input type='button' onclick=\"low_check('big_code', '".$arr["big_code"]."', '', '')\" value='하위확인'/></td>";

		/*$out .= "<td></td>";
		$out .= "<td></td>";
		$out .= "<td></td>";
		$out .= "<td></td>";*/

		/*$out .= "<td class='btr_".$arr["big_code"]."_dummy'></td>";	//추가되면 지울 더미(틀잡기용) cnt 만큼 돌려놓고, append할때 지우기
		$out .= "<td class='btr_".$arr["big_code"]."_dummy'></td>";
		$out .= "<td class='btr_".$arr["big_code"]."_dummy'></td>";
		$out .= "<td class='btr_".$arr["big_code"]."_dummy'></td>";*/
		
		$out .= "</tr>";

		
	}
	echo $out;
?>
</table>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
	function low_check(type, big, mid, small) {
		var cnt = 0;
		switch(type) {
			case "big_code":
				var tr = "btr_";
				var code = big;
				var tr_sub = "big";
			break;
			case "middle_code":
				var tr = "mtr_";
				var code = mid;
				var tr_sub = "mid";
			break;
			case "small_code":
				var tr = "str_";
				var code = small;
				var tr_sub = "small";
			break;

		}
		$.ajax({
			type : "POST",
			data : {"type":type, "big_code":big, "middle_code":mid, "small_code":small},
			url : "/CI/Listing/Code_sub",
			success : function(e) {
				var cla = "."+tr+code;
				if(!$(cla).hasClass("on")) {
					$(cla).addClass("on");


					if(type == "middle_code") {
						var cnt = $(".big_"+$(cla).attr("big")).attr("rowspan");
						$(".big_"+$(cla).attr("big")).attr("rowspan", (Number(cnt)+Number($(cla).attr("cnt"))-1));
					}
					$("."+tr_sub+"_"+code).attr("rowspan", $(cla).attr("cnt"));

					$(cla).after(e);
					$(cla+"_dummy").remove();
				} else {
					if(type == "middle_code") {
						var cnt = $(".big_"+$(cla).attr("big")).attr("rowspan");
						$(".big_"+$(cla).attr("big")).attr("rowspan",Number(cnt)-Number($(cla).attr("cnt"))+1);
					}

					$("."+tr_sub+"_"+code).attr("rowspan", "");

					$(cla).removeClass("on");
					$(cla+"_chlid").remove();
					for(var i=0; i<$(cla).attr("cnt"); i++) {
						//$(cla).after("<tr class='"+cla.replace(".","")+"_dummy'></tr>");
					}
				}
			}
		})
		
	}
</script>

<?php
	exit;
?>
<table class="cboard">
	<tr>
		<th>대분류</th>
		<th>확인</th>
		<th>중분류</th>
		<th>확인</th>
		<th>소분류</th>
		<th>비고</th>
	</tr>
	<?php
		echo "<xmp>";
		print_r($data);
		echo "</xmp>";
		


		/*foreach($data["big_code"] as $key=>$arr) {
			//print_r($arr);
			$out .= "<tr>";
			$rows = ($arr["cnt"] > 0) ? " rowspan='".$arr["cnt"]."'" : "";
			$out .= "<td".$rows.">".$arr["big_code"]."-".$arr["title"]."</td>";

			if($arr["cnt"] > 0) {
				$out .= "<td".$rows."> <input type='button' onclick=\"low_check()\" value='하위확인'/></td>";
				for($i=0; $i<count($data["middle_code"][$arr["big_code"]]); $i++) {
					$mid = $data["middle_code"][$arr["big_code"]];

					$rows = ($mid[$i]["cnt"] > 0) ? " rowspan='".$mid[$i]["cnt"]."'" : "";

					$out .= "<td".$rows.">".$mid[$i]["middle_code"]." - ".$mid[$i]["title"]."</td>";
					
					if($mid[$i]["cnt"] > 0) {

						for($j=0; $j<$mid[$i]["cnt"]; $j++) {
							$small = $data["small_code"][$arr["big_code"]][$mid[$i]["middle_code"]][$j];
							$out .= "<td>".$small["middle_code"]."</td>";
						}

					} else {
						$out .= "<td><input type='button' onclick=\"low_check()\" value='하위확인'/></td>";
						$out .= "</tr>";
					}
				}
			} else {
				$out .= "<td><input type='button' onclick=\"low_check()\" value='하위확인'/></td>";
				$out .= "</tr>";
			}
			
		}
		echo $out;*/
	?>
</table>




<table class="cboard">
	<tr>
		<th>대분류</th>
		<th>확인</th>
		<th>중분류</th>
		<th>확인</th>
		<th>소분류</th>
		<th>비고</th>
	</tr>
	<tr>
		<td>100-기본정보</td>
		<td>확인</td>

		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>200-상품정보</td>
		<td>확인</td>

		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>


<table class="cboard">
	<tr>
		<th>대분류</th>
		<th>확인</th>
		<th>중분류</th>
		<th>확인</th>
		<th>소분류</th>
		<th>비고</th>
	</tr>
	<tr>
		<td colspan="4">100-기본정보</td>
		<td>확인</td>

		<td>100-입고사유</td>
		<td>확인</td>
		<td></td>
	</tr>
	<tr>
		<td>200-출고사유</td>
		<td>확인</td>
		<td></td>
	</tr>
	<tr>
		<td>200-출고사유</td>
		<td>확인</td>
		<td></td>
	</tr>

	<tr>
		<td>200-상품정보</td>
		<td>확인</td>

		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>