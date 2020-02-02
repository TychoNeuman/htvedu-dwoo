{extends 'layouts/base.tpl'}

{block 'content'}
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Resultaten</h1>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">

            </div>
        </div>
    </div>
        {foreach $quizresults as result}
        <div style="background-color: {if $result.is_correct} lightgreen {else} orange{/if}">
            <p>Id: {$result.question_id}</p>
            <p>Juiste antwoord: {$result.correct_answer}</p>
            <p>Ingevuld antwoord: {$result.submitted_answer}</p>
        </div>
        {/foreach}
</div>

{/block}