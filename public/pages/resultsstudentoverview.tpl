{extends 'layouts/base.tpl'}

{block "content"}

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Alle resultaten</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download als .CSV</a>
        </div>
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                {if empty($resultinfo)}
                    <em>Geen resultaten gevonden...</em>
                {else}
                {foreach $resultinfo as result}
                <div class="border">
                    <div class="d-flex flex-column">
                        <div class="p-2 border"><span class="font-weight-bold">{$result.user.username} {$result.user.firstname} {$result.user.lastname}</span></div>
                        <div class="d-flex flex-row">
                        {foreach $result.quiz as quiz}
                            <div class="p-2 border d-flex flex-column">
                                <span class="font-weight-bold">{$quiz.name}</span>
                                <span>Juist beantwoord: <span class="font-weight-bold">{$quiz.result.amountOfCorrectAnswers}/{$quiz.result.amountOfCorrectAnswers + $quiz.result.amountOfIncorrectAnswers}</span></span>
                                <span>Score: <span class="font-weight-bold">{$quiz.result.resultScore}/{$quiz.result.totalScore}</span></span>
                                <span>Percentage: <span class="font-weight-bold">{$quiz.result.resultPercentage}%</span></span>
                                <span>Uitslag: <span class="font-weight-bold">{$quiz.result.hasPassed}</span>
                            </div>
                        {/foreach}
                        </div>
                        <div class="p-2 border">Totale uitslag: <span class="font-weight-bold">PLACEHOLDER</span></div>
                    </div>
                </div>
                {/if}
            </div>
        </div>
    </div>
{/block}