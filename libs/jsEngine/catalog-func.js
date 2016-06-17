$(function(){
	
	
	$('.btn-show-pr').click(function(){
		
		var level  = parseInt($(this).data('show'));
		$('.app-elements[data-visible-level='+level+']').toggleClass('hidden');
		level++;
		$(this).data('show',level);
		if(!$('li').is('[data-visible-level='+level+']')){
			$(this).toggleClass('hidden');
		}
				
	});
	
	
	$('.btn-price-pr').click(function () {
        var mylist = $('.catalog-list');
        var view = $(this).data('viewCount');
        var visible = $('.catalog-list li.hidden').length;
        mylist.children('li').removeClass('hidden');
        var listitems = mylist.children('li').get();
        listitems.sort(function(a, b) {
			   var compA = parseInt($(a).data('price'));
			   var compB = parseInt($(b).data('price'));
			   return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
        })
		$.each(listitems, function(idx, itm) { mylist.append(itm); });
		var count = 0;
		mylist.clildren('li').each(function(){
			count++;
			if(count>visible){
				$(this).addClass('hidden');	
			}
			
			$(this).data('visible-level',Math.ceil(count/view));
			
		});
	
       



});
	
	
	
	
	
	

 

  
 	
});








