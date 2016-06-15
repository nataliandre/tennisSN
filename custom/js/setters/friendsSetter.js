/**
 * Created by andrijmoroz on 14.06.16.
 */
$(document).ready(function(){

    var workingFunction = '';
    if(startFunction){
        workingFunction = 'killFriendsRequest';
    }else{
        workingFunction = 'addToFriends';
    }
    $('#addToFriendButton').bind('click',function(){
        if(startFunction){killFriendsRequest(this);}else{addToFriends(this);}
    });

    function addToFriends(obj){
        var addUser = $.ajax({
            method: "POST",
            url:userLink+"addFriend/"+userId,
            data: "hash="+sessionHash
        });
        addUser.done(function(){

            $(obj).bind('click',function(){killFriendsRequest(obj)}).html('Заявка отправлена');
        });
    }
    function killFriendsRequest(obj) {
        var addUser = $.ajax({
            method: "POST",
            url: userLink + "killFriendRequest/" + userId,
            data: "hash=" + sessionHash
        });
        addUser.done(function () {
            $(obj).bind('click', function(){addToFriends(obj)}).html('Добавить в друзья');

        });
    }

    $('#deleteFromFriends').click(function(){
        var deleteUser = $.ajax({
            method: "POST",
            url: userLink + "deleteFriendRel/" + userId,
            data: "hash=" + sessionHash
        });
        deleteUser.done(function(){
            location.reload();
        });
    });
});