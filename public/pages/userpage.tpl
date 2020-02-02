{extends 'layouts/base.tpl'}

{block "content"}
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content Row -->


        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Profiel</h6>
                    </div>
                    <div class="card-body">
                        <p><span class="font-weight-bold">Gebruikersnaam</span>: <span>{$user.username} </span></p>
                        <p><span class="font-weight-bold">Volledige naam:</span>: <span>{$user.firstname} {$user.lastname}</span></p>
                        <p><span class="font-weight-bold">Geboortedatum</span>: <span>{$user.dateOfBirth} </span></p>
                        <p><span class="font-weight-bold">Adres</span>: <span>{$user.address}, {$user.postcode} </span></p>
                        <p><span class="font-weight-bold">Woonplaats</span>: <span>{$user.residence} </span></>
                        <p><span class="font-weight-bold">Telefoonnummer</span>: <span>{$user.phoneNumber} </span></p>
                        <p><span class="font-weight-bold">Eerste e-mail</span>: <span>{$user.firstEmail} </span></p>
                        <p><span class="font-weight-bold">Tweede e-mail</span>: <span>{$user.secondEmail} </span></p>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Toets Toewijzen</h6>
                    </div>
                    <div class="card-body">
                        <em>Hier kun je straks toetsen toewijzen</em>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Toetsuitslagen</h6>
                    </div>
                    <div class="card-body">
                        {if empty($results)}
                            <em>Geen resultaten gevonden...</em>
                            {else}
                            <table class="table table-hover">
                                <thead>
                                    <th style="border-top: none !important;" scope="col">Naam Toets</th>
                                    <th style="border-top: none !important;" scope="col">Vragen</th>
                                    <th style="border-top: none !important;" scope="col">Percentage</th>
                                    <th style="border-top: none !important;" scope="col">Uitslag</th>
                                </thead>
                                <tbody>
                            {foreach $results as result}
                                <tr>
                                    <td>{$result.name}</td>
                                    <td>{$result.result.amountOfCorrectAnswers}/{$result.result.amountOfCorrectAnswers + $result.result.amountOfIncorrectAnswers}</td>
                                    <td>{$result.result.resultPercentage}%</td>
                                    <td>
                                        {$result.result.hasPassed}
                                    </td>
                                    <td><a href="index.php?p=quizresults&id={$result.id}&user={$user.id}"><button type="button" class="btn btn-outline-primary btn-sm">Bekijk</button></a></td>
                                </tr>
                            {/foreach}
                                </tbody>
                            </table>
                        {/if}
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Beoordelingen</h6>
                    </div>
                    <div class="card-body">
                        {if empty($assignment) && empty($group) && empty($sport)}
                            <em>Nog niet beoordeeld...</em>
                        {else}

                        {/if}
                    </div>
                </div>

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Bijlagen</h6>
                    </div>
                    <div class="card-body">
                        <em>Geen bijlagen gevonden...</em>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- End of Main Content -->

{/block}