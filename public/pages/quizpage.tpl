{extends 'layouts/base.tpl'}

{block 'content'}
    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs text-primary mb-1">Naam Toets:  <span style="color: black;"><strong>{$quizname}</strong></span></div>
                <div class="text-xs text-primary mb-1">Soort:  <span style="color: black;"><strong>{$quiztype}</strong></span></div>
                <div class="text-xs text-primary mb-1">Tijd:  <span style="color: black;"><strong><span id="quiztime">{$quiztime}</span> minuten</strong></span></div>
                <div class="text-xs text-primary mb-1">Score:  <span style="color: black;"><strong>{$quizscore}</strong></span></div>
            </div>
        </div>
    </div>
    {if $type === 1}
        {include 'quizpages/shownumberseries.tpl'}
    {/if}
    {if $type === 2}
        {include 'quizpages/showwordpair.tpl'}
    {/if}
    {if $type === 3}
        {include 'quizpages/showletterpair.tpl'}
    {/if}

{/block}