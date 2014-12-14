$('#enrollme').keyup(function()
{
	var searchterm = $('#search').val();

	if(searchterm!=''){
		$.post('search.php', {searchTxt:searchTxt},
		function(data)	
		{
			$('#searchresults').html(data);
		});
	}else{
		$('#searchresults').html('');
	}
});