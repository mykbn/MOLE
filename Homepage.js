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

		if(searchbox.value == ""){
			listbox.style.display = 'none';
		}else{
			listbox.style.display = 'block';
		}
	}
	
	//HIDE DIV
	function Hide(x){
		// var listbox = document.getElementById("output");
		x.style.display = 'none';
	}
	//SHOW DIV
	function Show(x){
		x.style.display = 'block';
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
   function toggle_visible(idd) {
		// alert ("LABAS!");
		// alert(idd);
       var e = document.getElementById(idd);
       if(e.style.display == 'inline-block'){
          e.style.display = 'none';
      }else{
          e.style.display = 'inline-block';
      }
   }


   