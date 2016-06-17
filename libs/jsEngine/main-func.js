$(function(){

 

  
  
  
  
  
  	$(".control").click(function(){
		
		var obj    = $(this).attr('data-control'); 
		$("#"+obj).toggleClass("visible");
		$("#fade").show();
		return false;
	

	});
	
	
	




$(".opener-h").click(function(){
	var open = $(this).attr('data-open');
	var $obj = $("#"+open);
	var h    = $(this).attr('data-height');
	if($obj.attr('data-atach') === undefined || $obj.attr('data-atach').length === 0){
		$obj.attr('data-atach','use');
		$obj.animate({ "height": h },400);
		return false;
	}
	else if($obj.attr('data-atach') === 'use'){
		$obj.attr('data-atach','');
		$obj.animate({ "height":"0px"},400);
		return false;
		
	}
});


$(".window-opener").click(function(){
	var window = $(this).attr('data-open');
	$('.window').addClass('window-back');
	$('#'+window).removeClass('window-back');
});

$(".return").click(function(e){
	e.preventDefault();
	$('.window').addClass('window-back');
	$('.window[data-role="primary-window"]').removeClass('window-back');
});







$(".opener-w").click(function(){
	var open = $(this).attr('data-open');
	var $obj = $("#"+open);
	var h    = $(this).attr('data-width');
	if($obj.attr('data-atach') === undefined || $obj.attr('data-atach').length === 0){
		$obj.attr('data-atach','use');
		$obj.animate({ "width": h },400);
		return false;
	}
	else if($obj.attr('data-atach') === 'use'){
		$obj.attr('data-atach','');
		$obj.animate({ "width": "0px" },400);
		return false;
		
	}
});
	
	
	
	
	$(".popup-right h6").click(function(){
		$(".popup-right").each(function(){
		if($(this).hasClass("visible")){
				$(this).removeClass("visible");
				$("#fade").hide();
				return false;
			}
		
		});
	});
	
	
	$("#fade").click(function(){
		$(".popup-right").each(function(){
		if($(this).hasClass("visible")){
		        $(this).removeClass("visible");
				$("#fade").hide();
				return false;
			}
		});
		
	});
	
	
$('[data-control="radio"]').click(function(){
     var same = $(this).attr("name");
	 $('[name='+same+']').attr("data-var","");
	 var val = $(this).attr("data-var-change");
	 $(this).attr("data-var",val);
});




	

  
  
  $('.cookie-submit').click(function(){
	$('.coockie-master').css('display','none');
	})
  

  
  
  
  
  
  
  
  
    $('.btn-mailer-submit').click(function(e){
    e.preventDefault();
    
      $.ajax( {
		type: "POST",
		url: $('#mailer-form').attr('action'),
		data: $('#mailer-form').serialize(),
		success: function(data) {
			$('.result').html(data);
			$('.result').css({'visibility':'visible','opacity':'1'});
        }
    });
    });
	
	
	
$('.map-tab').hover(function(){
    var  region = $(this).attr('data-region');
    $('.map-region').each(function(){
      if($(this).attr('data-region') == region){
        $(this).toggleClass('back');
        $(this).toggleClass('front');
        $(this).toggleClass('pullUp');
      }
      
      });
    
    
});


setInterval(function(){
  $('.new-map').toggleClass('pullDown');
  },3000);



	
	$('.option-change').on('change',function(){
		var name = $(this).attr('data-option-num');
		var val = $(this).val();
		var value   = 'id='+$('[data-var=id]').val()+'&option='+val;
		
		 $.ajax( {
			type: "POST",
			url: 'http://harmony.rv.ua/refresher/options',
			data: value,
			success: function(data) {
			
			  var output = data.split(',');
			  $('p[data-option-num='+name+']').removeClass('hidden').html(output[0]);
			  if (output[1]=='1') {
				$('label[data-option-num='+name+']').removeClass('label').removeClass('label-success');
			  }
			  else if (output[1]=='2') {
				$('label[data-option-num='+name+']').addClass('label').addClass('label-success');
				$('select[data-option-num='+name+'] option:first-child').val(val);
			  }
			  
			  
			  setTimeout(function(){
					$('p[data-option-num='+name+']').addClass('hidden')			},1000)
			}
		});
		
		
	});
	


	
	
	
	
$('.btn-controll-editor').click(function(e){
	
    e.preventDefault();

    var route = $(this).attr('data-action');
	var action  = 'http://harmony.rv.ua/refresher'+route;
	var routes  = $(this).attr('data-routes').split(',');
	var num     = parseInt($(this).attr('data-place'));
		var reload = $(this).attr('data-reload');
	var varible = $(this).attr('data-vars').split(',');
	var value   = varible[0]+'='+$('[data-var='+varible[0]+']').val(); 
	for(var i=1;i<varible.length;i++){
		
		value  += '&'+varible[i]+'='+$('[data-var='+varible[i]+']').val(); 
	}

    $.ajax( {
      type: "POST",
      url: action,
      data: value,
      success: function(data) {
		
		var output = data.split(',');
		
		if (num === 1 ) {
			$('.'+routes).html(output);
			
		}
		else if(num === 3){
			
			
			if (reload !== undefined) {
				
				$('.'+reload).toggleClass('hidden');
			}
			
			for(var j=0;j<count(routes);j++){
			
		    $('#'+routes[j]).val(output[j]);
			}
		}else if(num === 4){
			$('.'+reload).toggleClass('hidden');
			
		}else{
		for(var j=0;j<count(routes);j++){
			
			$('.'+routes[j]).html(output[j]);
			
		}}
	    
      }
      });
});




$('.btn-controll-visible').click(function(e){
	
    e.preventDefault();

    var route = $(this).attr('data-action');
	var action  = 'http://harmony.rv.ua/refresher'+route;

	var varible = $(this).attr('data-vars').split(',');
	var value   = varible[0]+'='+$('[data-var='+varible[0]+']').val(); 
	for(var i=1;i<varible.length;i++){
		
		value  += '&'+varible[i]+'='+$('[data-var='+varible[i]+']').val(); 
	}

    $.ajax( {
      type: "POST",
      url: action,
      data: value,
      success: function(data) {
				$('#view-toogle').html(data);
			    route = $(this).attr('data-action');
				$(this).attr('data-action',$(this).attr('data-toggle'));
				$(this).attr('data-toggle',route)
      }
      });
});








//add to like list this product

$('.btn-to-like-list').click(function(e){
    e.preventDefault();
  
	var action  = 'http://harmony.rv.ua/refresher/add_like';
	var $elem  = $(this);
	var catchO  = $(this).attr('data-id-product');   
	var value   ='id='+$(this).attr('data-id-product')+'&user='+$('#data-user-id').val(); 
    $.ajax( {
      type: "POST",
      url: action,
      data: value,
      success: function(data) {
						$elem.removeClass('liked-list-no').addClass('liked-list').html('в списку Ваших бажань');
						
			
			}
      });
});




$(".down-scroll-action").on("click", function() {
    $("html, body"). animate({"scrollTop": $($(this).attr('data-scroll')).offset().top - 100}, 500);
    return false;
});




$('.open-modal').click(function(){
	
	$($(this).attr('data-modal')).modal('show'); 
	return false;
});







$('.btn-send-store').click(function(e){
	
    e.preventDefault();

   
	var action  = 'http://harmony.rv.ua/refresher/send_new_store_info';
	
	var reloader = $(this).attr('data-reload');
	
	var varible = $(this).attr('data-vars').split(',') , value, check = true;
	if($('input[data-var='+varible[0]+']').val() == '' || $('input[data-var='+varible[0]+']').val() == ' '){
		$('p[data-var='+varible[0]+']').html($('input[data-var='+varible[0]+']').attr('data-error'));
		check = false;
	}else{
	   value   = varible[0]+'='+$('input[data-var='+varible[0]+']').val();
	   $('p[data-var='+varible[0]+']').html('');
	   
	}
	
	
	
	
	for(var i=1;i<varible.length;i++){
		if($('input[data-var='+varible[i]+']').val() == '' || $('input[data-var='+varible[i]+']').val() == ' '){
		$('p[data-var='+varible[i]+']').html($('input[data-var='+varible[i]+']').attr('data-error'));
		 check = false;
		}else{
		   value   += '&' + varible[i]+'='+$('input[data-var='+varible[i]+']').val();
		   $('p[data-var='+varible[i]+']').html('');
		  
		}
		
	}

if (check) {

    $.ajax( {
      type: "POST",
      url: action,
      data: value,
      success: function(data) {
		
	
			$(reloader).toggleClass('hidden');
			
			
			}
	
      
      });
	
}
	
});





$('.btn-hide-element').click(function(e){
	
	e.preventDefault();
	var hide = $(this).attr('data-hide');
	$('#'+hide).fadeOut();
	
});







$('.btn-load-instock').click(function(e){
	
    e.preventDefault();
    $(this).toggleClass('hidden');
   
	var action  = 'http://harmony.rv.ua/refresher/load_instock';
	
	var reloader = $(this).attr('data-reload');
	
	var varible = $(this).attr('data-vars').split(',') , value, check = true;
	if($('.form-control[data-var='+varible[0]+']').val() == '' || $('.form-control[data-var='+varible[0]+']').val() == ' '){
		$('p[data-var='+varible[0]+']').html($('.form-control[data-var='+varible[0]+']').attr('data-error'));
		check = false;
	}else{
	   value   = varible[0]+'='+$('.form-control[data-var='+varible[0]+']').val();
	   $('p[data-var='+varible[0]+']').html('');
	   
	}
	
	
	
	
	for(var i=1;i<varible.length;i++){
		if($('.form-control[data-var='+varible[i]+']').val() == '' || $('.form-control[data-var='+varible[i]+']').val() == ' '){
		$('p[data-var='+varible[i]+']').html($('.form-control[data-var='+varible[i]+']').attr('data-error'));
		 check = false;
		}else{
		   value   += '&' + varible[i]+'='+$('.form-control[data-var='+varible[i]+']').val();
		   $('p[data-var='+varible[i]+']').html('');
		  
		}
		
	}

if (check) {

    $.ajax( {
      type: "POST",
      url: action,
      data: value,
      success: function(data) {
		
	
			$(reloader).toggleClass('hidden');
			
			
			}
	
      
      });
	
}
	
});


$('.reset-forms').click(function(){
	var reChange =  $(this).attr('reset-forms');
	$('.'+reChange).toggleClass('hidden');
});

	
	


	
	
	
});








//print function for all web resource  //

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'check-order', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Гармонія | Меблевий салон</title>');
        mywindow.document.write('<link rel="stylesheet" type="text/css" href="http://harmony.rv.ua/styles/bootstrap.css">');
        mywindow.document.write('<link rel="stylesheet" type="text/css" href="http://harmony.rv.ua/styles/style.css">');
 
        mywindow.document.write('</head><body>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
	
	
	
	
	 function count(obj) {

          var count = 0;

          for(var prs in obj)
          {
                   if(obj.hasOwnProperty(prs)) count++;
          }
          return count;
       }



