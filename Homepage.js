//SEARCH RESULTS
	function searchq(){
		var searchform = document.getElementById("searchform");
		searchform.setAttribute("autocomplete", "off");
		var searchTxt = $("input[name='searchTxt']").val();
			$.post("search.php", {searchVal: searchTxt}, function(searchResult){
				$("#searchbardiv").html(searchResult);
			});
		var listbox = document.getElementById("searchbardiv");
		var searchbox = document.getElementById("enrollme");

		if(searchbox.value == "Search"){
			listbox.style.display = 'none';
		}else{
			listbox.style.display = 'block';
		}
	}
	
	//HIDE SEARCH RESULTS
	function Hide(){
		var listbox = document.getElementById("output");
		listbox.style.display = 'none';
	}
	//SHOW SEARCH RESULTS
	function Show(){
		var listbox = document.getElementById("output");
		listbox.style.display = 'block';
	}
	//TOGGLE DIV VISIBILITY
	function toggle_visibility(id) {
		// alert ("LABAS!");
       var e = document.getElementById(id);
       if(e.style.display == 'block'){
          e.style.display = 'none';
      }else{
          e.style.display = 'block';
      }
   }
   