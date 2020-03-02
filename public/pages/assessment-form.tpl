{extends 'layouts/base.tpl'}

{block 'content'}
   {if $subject === "sport"}
      {include "assessmentpages/sportform.tpl"}
   {/if}
   {if $subject === 'assignment'}
      {include "assessmentpages/assignmentform.tpl"}
   {/if}
   {if $subject === 'group'}
      {include "assessmentpages/groupform.tpl"}
   {/if}
{/block}