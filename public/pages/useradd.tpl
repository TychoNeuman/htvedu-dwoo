{extends 'layouts/base.tpl'}

{block "content"}
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gebruiker | Toevoegen</h1>
        </div>
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <form method="post">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputUsername">Studentnr./Gebruikersnaam</label>
                            <input type="text" class="form-control" id="inputUsername" placeholder="123456789" name="username">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword1">Wachtwoord</label>
                            <input type="password" class="form-control" id="inputPassword1" placeholder="Wachtwoord" name="password">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword2">Herhaal wachtwoord</label>
                            <input type="password" class="form-control" id="inputPassword2" placeholder="Wachtwoord">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputFirstname">Voornaam</label>
                            <input type="text" class="form-control" id="inputFirstname" placeholder="Jan" name="firstname">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputLastname">Achternaam</label>
                            <input type="text" class="form-control" id="inputLastname" placeholder="de Vries" name="lastname">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDateOfBirth">Geboortedatum</label>
                            <input type="date" class="form-control" id="inputDateOfBirth" name="dateofbirth">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Telefoonnummer:</label>
                        <input type="text" class="form-control" id="inputPhone" placeholder="06123456789" name="phonenumber">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail1">E-mail:</label>
                            <input type="text" class="form-control" id="inputEmail1" placeholder="anoniem@gmail.com" name="email1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail2">E-mail eerste verzorger:</label>
                            <input type="text" class="form-control" id="inputEmail2" placeholder="anoniem@outlook.com" name="email2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Straatnaam + huisnummer</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Straatnaam 123" name="address">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputPostcode">Postcode</label>
                            <input type="text" class="form-control" id="inputPostcode" placeholder="1234AA" name="postcode">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputResidence">Woonplaats</label>
                            <input type="text" class="form-control" id="inputResidence" placeholder="Woonplaats" name="residence">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPermission">Permissie</label>
                            <select id="inputPermission" class="form-control" name="permission">
                                <option selected>Kiezen...</option>
                                <option>Admin</option>
                                <option>Student</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Toevoegen</button>
                </form>
            </div>
        </div>
        <br>
    </div>
{/block}