{extends 'layouts/base.tpl'}

{block 'content'}
    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Toetsen | Toevoegen</h1>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs text-primary mb-1">Naam Toets:  <span style="color: black;"><strong>{$quizname}</strong></span></div>
                <div class="text-xs text-primary mb-1">Soort:  <span style="color: black;"><strong>{$quiztype}</strong></span></div>
                <div class="text-xs text-primary mb-1">Tijd:  <span style="color: black;"><strong>{$quiztime} minuten</strong></span></div>
                <div class="text-xs text-primary mb-1">Score:  <span style="color: black;"><strong>{$quizscore}</strong></span></div>
            </div>
        </div>
    </div>
    {if $type == 1}
        {include 'quizpages/shownumberseries.tpl'}
    {/if}

{/block}