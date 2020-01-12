{extends 'layouts/base.tpl'}

{block "content"}

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gebruikers</h1>
        </div>
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                {if empty($resultinfo)}
                    <em>Geen resultaten gevonden...</em>
                {/if}
                {foreach $resultinfo as result}
                    {$result.user.username}
                    -
                    {foreach $result.quiz as quiz}
                        {$quiz.name} - {if $quiz.result.hasPassed}<span style="color: green">Passed!</span>{/if}
                    {/foreach}
                    <br>
                {/foreach}
            </div>
        </div>
    </div>
{/block}