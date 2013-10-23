$("td.ref:not(:empty)").parent("tr").hover(
	function(){
		id = $(this).children(".ref").html();
		$("tr[data-id="+id+"]").addClass("hover");
	},
	function(){
		id = $(this).children(".ref").html();
		$("tr[data-id="+id+"]").removeClass("hover");
	}	
);