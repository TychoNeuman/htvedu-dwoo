<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Sport beoordeling</h1>
    </div>
    <p>{$user.firstname} {$user.lastname}</p>
    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <form method="post">
                <table class="table">
                    <thead>
                        <th style="border-top: none !important;" scope="col">Onderdeel</th>
                        <th style="border-top: none !important;" scope="col">Tijd/Aantal</th>
                        <th style="border-top: none !important;" scope="col">Cijfer</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>3 Km</td>
                        <td><input type="text" name="km-time" class="form-control"></td>
                        <td><input type="text" name="km-grade" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Push-Ups</td>
                        <td><input type="text" name="push-up-time" class="form-control"></td>
                        <td><input type="text" name="push-up-grade" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Sit-Ups</td>
                        <td><input type="text" name="sit-up-time" class="form-control"></td>
                        <td><input type="text" name="sit-up-grade" class="form-control"></td>
                    </tr>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
        <div class="card-body">
            <p class="font-weight-bold">Toelichting:</p>
            <ul>
                <li>3km harlopen op tijd.</li>
                <li>In twee minuten zoveel mogelijk correcte sit-ups maken.</li>
                <li>Zoveel mogelijk correcte push-ups maken tot falen.</li>
            </ul>
            <p class="font-weight-bold">Cijfer:</p>
            <ul>
                <li>A = Cijfer hardlopen</li>
                <li>B = Cijfer sit-ups + cijfer push-ups / 2</li>
                <li>C = Eindcijfer A + B / 2</li>
            </ul>
        </div>
    </div>
</div>