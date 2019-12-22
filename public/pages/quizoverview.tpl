{extends 'layouts/base.tpl'}

{block "content"}
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Toetsen | Overzicht</h1>
    </div>
        {if empty($quizes)}
            <em>Nog geen toetsen aangemaakt...</em>
            {else}
    <div class="row">
            {foreach $quizes quiz}
                <div class="col-sm-4" style="padding-bottom: 10px">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{$quiz.name}</h5>
                            <p class="card-text"><em>{$quiz.typeName}</em></p>
                            <p class="card-text"><strong>{$quiz.score}</strong> punten - <strong>{$quiz.time}</strong> minuten</p>
                            <a href="index.php?p=quizpage&id={$quiz.id}" class="btn btn-primary">Bekijk</a>
                        </div>
                    </div>
                </div>
            {/foreach}
    </div>
        {/if}
</div>

{/block}