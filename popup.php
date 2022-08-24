<script type="text/javascript">
	function test() {
		//$(opener.document).find("input[name='sdate']").val("test");
		$("input[name='sdate']").val("test");
		//$("input[name='sdate']", opener.document).val("test");
		//$("input[name=sdate]", parent.document.body).val("test");
		//$("input[name=sdate]", opener.document).val("aa");
		//window.parent.$("input[name='sdate']").val("test");
		//opener.document.$("input[name='sdate']").val("test");
		//location.reload();
	}
</script>
<input type="text" name="sdate" value="">
<input type="button" value="hi" onclick="javascript:test();">