<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Groepsopdracht beoordeling</h1>
    </div>
    <p>{$user.firstname} {$user.lastname}</p>
    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <form method="post">
                <table class="table">
                    <thead>
                        <th style="border-top: none !important;" scope="col">Onderwerp</th>
                        <th style="border-top: none !important;" scope="col">Score</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>Sociaal vaardig</strong>
                                <p>
                                    De student kan zichzelf presenteren, is communicatief vaardig,<br>
                                    heeft een open houding, kan actief luisteren, toont empatisch vermogen,<br>
                                    en kan samenwerken.
                                </p>
                            </td>
                            <td>
                                <select name="grade1" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">Onvoldoende</option>
                                    <option value="2">Voldoende</option>
                                    <option value="3">Goed</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Weerbaar</strong>
                                <p>
                                    De student kom op voor zijn mening, durft te handelen, herstelt<br>
                                    zich na tegenslagen, is moedig, emotioneel stabiel en stressbestending.
                                </p>
                            </td>
                            <td>
                                <select name="grade2" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">Onvoldoende</option>
                                    <option value="2">Voldoende</option>
                                    <option value="3">Goed</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Reflectief denkend en handelend</strong>
                                <p>
                                    De student stelt zich luistered en lerend op, en is in staat<br>
                                    om in zijn uitspraken nuances aan te brengen in plaats van zwart/wit<br>
                                    te denken.
                                </p>
                            </td>
                            <td>
                                <select name="grade3" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">Onvoldoende</option>
                                    <option value="2">Voldoende</option>
                                    <option value="3">Goed</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Zelfregulerend</strong>
                                <p>
                                    De student heeft een ondernemende en proactieve houding, beschikt<br>
                                    over probleemoplossend vermogen en is besluitvaardig.
                                </p>
                            </td>
                            <td>
                                <select name="grade4" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">Onvoldoende</option>
                                    <option value="2">Voldoende</option>
                                    <option value="3">Goed</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>