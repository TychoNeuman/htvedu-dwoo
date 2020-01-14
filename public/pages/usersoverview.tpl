{extends 'layouts/base.tpl'}

{block "content"}
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Gebruikers</h1>
        <input type="text" class="d-none d-sm-inline-block form-control col-md-2" placeholder="Zoek op voornaam..." id="user-search">
    </div>
    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th style="border-top: none !important;" scope="col">Gebruikersnaam</th>
                    <th style="border-top: none !important;" scope="col">Voornaam</th>
                    <th style="border-top: none !important;" scope="col">Achternaam</th>
                    <th style="border-top: none !important;" scope="col">Permissie</th>
                </thead>
                <tbody>
                {if empty($users)}
                    <tr>
                        <td><em>Geen gebruikers gevonden...</em></td>
                    </tr>
                {else}
                    {foreach $users as user}
                        <tr>
                            <td>{$user.username}</td>
                            <td>{$user.firstname}</td>
                            <td>{$user.lastname}</td>
                            <td>{$user.role}</td>
                            <td><a href="index.php?p=userpage&id={$user.id}"><button type="button" class="btn btn-outline-primary btn-sm">Bekijk</button></a></td>
                            <td><i class="fas fa-trash"></i></td>
                        </tr>
                    {/foreach}
                {/if}
                </tbody>
            </table>
        </div>
    </div>
</div>

{/block}
