{extends 'layouts/base.tpl'}

{block "content"}
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Sport beoordelen</h1>
        </div>
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <p>Kies een student om te beoordelen:</p>
                <div class="d-flex flex-column">
                    {if empty($users)}
                        <em>Alle studenten zijn beoordeeld.</em>
                    {else}
                        {foreach $users as user}
                            <div class="border p-2 m-2">
                                <span class="font-weight-bold">{$user.username}</span>
                                <span>{$user.firstname} {$user.lastname}</span>
                                <a href="#"><button type="button" class="btn btn-outline-primary btn-sm float-right">Beoordeel</button></a>
                            </div>
                        {/foreach}
                    {/if}
                </div>
            </div>
        </div>
    </div>

{/block}
