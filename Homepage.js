//SEARCH RESULTS
	function searchq(){
		// alert("lalalalalalalalalala");
		var searchform = document.getElementById("searchform");
		searchform.setAttribute("autocomplete", "off");
		var searchTxt = $("input[name='searchTxt']").val();
			$.post("search.php", {searchVal: searchTxt}, function(output){
				$("#output").html(output);
			});
		var listbox = document.getElementById("output");
		var searchbox = document.getElementById("enrollme");

		if(searchbox.value == "Search"){
			listbox.style.display = 'none';
		}else{
			listbox.style.display = 'block';
		}
	}
	function GetValue(value){
		alert (value);
		// this.style.background = 'blue';
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
   // //GET FIRST AND LAST NAME FROM DATABASE
   // function FirstLastName(){
	  //  	alert("lalalalala");
   // 		// var firstName = <?php Print($someVar); ?>;
   // 		// var profileName = document.getElementById("profilename");
   // 		// alert(firstName);
   // 		// profileName.value = firstName;
   // }