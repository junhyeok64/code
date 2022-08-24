<?php
	$out = "";
	$out .= "<a href=\"".$url."1".$url_tail."\"> ◀ </a> ";
	$out .= "<a href=\"".$url.($prev).$url_tail."\"> ◁ </a> ";

	for($p=($start)+1; $p<=$end; $p++) {
		$out .= "<a href=\"".$url.$p.$url_tail."\" >".$p."</a>&nbsp;";
	}

	$out .= "<a href=\"".$url.($next).$url_tail."\"> ▷ </a> ";
	$out .= "<a href=\"".$url.($total_page).$url_tail."\"> ▶ </a> ";

	echo $out;
?>