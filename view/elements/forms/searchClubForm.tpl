<form method="POST" enctype="multipart/form-data" id="querySearchClubForm" action="{$searchAction}">
    <input type="text" class="form-control input-sm" id="querySearchClubInput" placeholder="{Language::clubSearchPlaceholder($LANGUAGE)}" name="query" value="{$value}"/>
    {literal}
        <script>
            $('#querySearchClubInput').on('blur',function(){
                $('#querySearchClubForm').submit();
            });
        </script>
    {/literal}
</form>