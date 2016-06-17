/** APP: Ajax Image uploader with progress bar
    Website:packetcode.com
    Author: Krishna TEja G S
    Date: 29th April 2014
***/

$(function(){
	 
	 // function from the jquery form plugin
	 $('#myForm').ajaxForm({
	 	beforeSubmit:function(formData, jqForm, options){
	 		//check the source if its image before uploading
	 		$(".progress").show()
	 		var n = formData[0].value.name;
	 		var ext = n.substr(n.lastIndexOf('.') + 1);
	 		var et = ext.toUpperCase();
	 		var array = ['PNG','JPG','JPEG','GIF'];
	 		var there = $.inArray(et, array);
	 		if(there == -1)
	 		{
	 			//update the alert message and show it
	 			$("#alert-message").html("<b>Помилка!</b> будь-ласка завантажте зображення валідного формату");
	 			

	 			//setting a time out function to auto hide the alert after 3sec
	 			setTimeout(function() { $(".alert").hide(); }, 3000);
	 			//hide the progress bar
	 			$(".progress").hide()
	 			return false;
	 		}	
	 		else{
	 			return true;
	 		}	
	 	},
	 	uploadProgress:function(event,position,total,percentComplete){
	 		$(".progress-bar").width(percentComplete+'%'); //dynamicaly change the progress bar width
	 		$(".sr-only").html(percentComplete+'%'); // show the percentage number
	 	},
	 	success:function(){
	 		$(".progress").hide(); //hide progress bar on success of upload
	 	},
	 	complete:function(response){
	 		//display error if response is 0
	 		if(response.responseText=='0'){
	 			//change the alert message and show it
	 			$("#alert-message").html("<b>Помилка</b> в завантаженні");
	 			
	 		} 
	 		else{
	 			//update the image container,then update alert message and show it
	 			$(".image").html('<img src="'+response.responseText+'" />');
	 			$("#alert-message").html("<strong>Завантажено!</strong>");
	 			$(".image img").attr("src", response.responseText + '?timestamp=' + new Date().getTime());
	 		}
	 		//setting a time out function to auto hide the alert after 3sec
	 		setTimeout(function() { $("#alert-message").hide(); }, 4000);
	 			
	 	}
	 });
	 
	 //set the progress bar to be hidden on loading
	 $(".progress").hide();
});