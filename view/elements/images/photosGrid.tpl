<div class="userPhotosGrid">
    {foreach from=$images item=$image}
        <div class="{$imageClass}">
            <img src="{$photosPath|cat:$image->path}">
        </div>
    {/foreach}
</div>