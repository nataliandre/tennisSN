<form method="POST" enctype="multipart/form-data" id="querySearchFriendsForm" action="{$searchAction}">
    <input type="text" class="form-control input-sm {$class}" id="querySearchFriendsInput" placeholder="{Language::friendsSearchPlaceholder($LANGUAGE)}" name="query" value="{$value}"/>
    {literal}
        <script>
            $('#querySearchFriendsInput').on('blur',function(){
                $('#querySearchFriendsForm').submit();
            });
        </script>
    {/literal}
</form>