/*
 *
 *Selectron v.1.0
 *
 * SSSSS     EEEEE     L        EEEEE     CCC  TTTTTTT    RRRR     OO      NN   N
 *SS         E         L        E        C        T       R  R    O   O    N N  N
 *SSSS       EEEE      L        EEEE    C         T       RRR    O    O    N  N N
 *    SS     E         L        E        C        T       R  R    O  O     N   NN  
 *SSSSS      EEEEE     LLLLL    EEEEE     CCC     T       R   R    OO      N    N   V.1
 *
 *This plugin is the short plugin for friendly-selector usage produced by Andrii Moroz
 *====================================
 *= MY CONTACTS                      =
 *= vk.com/peaced8love               =
 *= MAIL                             = 
 *= moroz97andre@mail.ua             = 
 *====================================
 *function spSearch(a) is not used in this version, but comming soon
 *
 *
 *
 */






(function( $ ) {
  $.fn.selectron = function() {
  
  
  var $actionElement = this.find('select'),
  $selectronForm = this,
  levels = 1;
  
  $actionElement.each(function(){  
        var check = parseInt($(this).attr('data-level'));
        if (check > levels) {
          levels = check;
        }
  });
  
  
  
  
  
  
  $actionElement.change(function(){
    var level = parseInt($(this).attr('data-level')),val = $(this).find('option:selected').val(),start = 0;
    level++;
    if (val !== 'none') {
          start = level + 1;
          $selectronForm.find('select[data-level="'+level+'"]').addClass('hidden').removeAttr('name');
          var name1 = $selectronForm.find('select[data-level="'+level+'"][data-open="'+val+'"]').attr('data-name');
          $selectronForm.find('select[data-level="'+level+'"][data-open="'+val+'"]').removeClass('hidden').attr('name',name1).prop('selectedIndex',0);
          
    }else{
          start = level;
    }
      var end = levels + 1; 
      for(start;start<end;start++){
          
          $selectronForm.find('select[data-level="'+start+'"]').addClass('hidden').removeAttr('name');
            
      } 
  });
  
   
   
   
   
   
   
   
   function spSearch(a){
    for(var i=0;i<a.length;i++){
      if (a[i].length == 0) {
          return false;
      }else if(a[i].length == 1 && a[i].slice(0,1) == ' ') {
          return false;
      }
    }
    return true;
   }
   
   
   
   
   
   
  };
})(jQuery);