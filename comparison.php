<?php
	/*echo "<xmp>";
	print_r($data);
	print_r($chk);
	echo "</xmp>";*/

	$out = "";
	$out .= "<table class='listing_table'>";
	$out .= "<tr>";
	foreach($key as $kk2=>$arr2) {
		$out .= "<th>".$arr2."</th>";
	}
	$out .= "<tr>";
	foreach($data as $kk=>$arr) {
		$out .= "<tr>";
		foreach($key as $kk2=>$arr2) {
			$out .= "<td class='com com_".$arr2."'>".$arr[$arr2]."</td>";
		}
		$out .= "<tr>";
	}
	$out .= "</table>";

	echo $out;
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".com").css("color","none");
		<?php
			foreach($chk as $kkk=>$vvv) {
				if(@!in_array($kkk, array("num", "date"))) {
					if($vvv == "FAIL") {
						echo "$('.com_".$kkk."').css('color', 'red');\r\n";
					}
				}
			}
		?>
	})
</script>