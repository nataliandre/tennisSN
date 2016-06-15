/**
 * Created by andrijmoroz on 14.06.16.
 */

$(document).ready(function(){
   $('.confirmUserAdd').click(function(){

         var confirmUserAdd = $.ajax({
            method: "POST",
            url:userLink+"confirmUserAdd/"+$(this).attr('data-user'),
            data: "hash="+sessionHash
         });
         confirmUserAdd.done(function(){
            location.reload();
         });

   });
    
});
