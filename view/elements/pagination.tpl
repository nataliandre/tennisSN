
{if $languages}
<ul class="pagination upper ">

{foreach from=$languages  item=lang}
  <li class="{if $lang.title eq $cur_lang} active {/if}"><a href="{$lang.link}">{$lang.title}</a></li>
{/foreach}
 </ul>
 {/if}
