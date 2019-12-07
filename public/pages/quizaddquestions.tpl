{extends 'layouts/base.tpl'}

{block "content"}
    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Toetsen | Toevoegen</h1>
    </div>
    {if $type == 1}
        {include "quizpages/addnumberseries.tpl"}
    {/if}
    </div>
{/block}