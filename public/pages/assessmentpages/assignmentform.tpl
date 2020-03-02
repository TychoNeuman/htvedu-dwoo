<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Werkstuk beoordeling</h1>
    </div>
    <p>{$user.firstname} {$user.lastname}</p>
    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <form method="post">
                <table class="table">
                    <thead>
                        <th style="border-top: none !important;" scope="col">Onderwerp</th>
                        <th style="border-top: none !important;" scope="col">Maximale Score</th>
                        <th style="border-top: none !important;" scope="col">Score</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tenminste twee, ten hoogste vijf A4</td>
                            <td>10</td>
                            <td>
                                <select name="grade1" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">5</option>
                                    <option value="4">6</option>
                                    <option value="4">7</option>
                                    <option value="4">8</option>
                                    <option value="4">9</option>
                                    <option value="4">10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Toekomstige beroepen HTV en politie</td>
                            <td>10</td>
                            <td>
                                <select name="grade2" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">5</option>
                                    <option value="4">6</option>
                                    <option value="4">7</option>
                                    <option value="4">8</option>
                                    <option value="4">9</option>
                                    <option value="4">10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Leg uit wat de termen inhouden en motiveer waarom deze belangrijk zijn:<br>
                                <ul>
                                    <li>Reflecterend denken en handelen</li>
                                    <li>Sociale vaardigheden</li>
                                    <li>Zelfregulerend</li>
                                    <li>Beroepsbewust</li>
                                </ul>
                            </td>
                            <td>15</td>
                            <td>
                                <select name="grade3" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">5</option>
                                    <option value="4">6</option>
                                    <option value="4">7</option>
                                    <option value="4">8</option>
                                    <option value="4">9</option>
                                    <option value="4">10</option>
                                    <option value="4">11</option>
                                    <option value="4">12</option>
                                    <option value="4">13</option>
                                    <option value="4">14</option>
                                    <option value="4">15</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Benoem mooie kanten van het beroep</td>
                            <td>10</td>
                            <td>
                                <select name="grade4" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">5</option>
                                    <option value="4">6</option>
                                    <option value="4">7</option>
                                    <option value="4">8</option>
                                    <option value="4">9</option>
                                    <option value="4">10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Benoem minder mooie kanten van het beroep</td>
                            <td>10</td>
                            <td>
                                <select name="grade5" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">5</option>
                                    <option value="4">6</option>
                                    <option value="4">7</option>
                                    <option value="4">8</option>
                                    <option value="4">9</option>
                                    <option value="4">10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Motiveer waarom jij geschikt bent voor dit beroep</td>
                            <td>10</td>
                            <td>
                                <select name="grade6" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">5</option>
                                    <option value="4">6</option>
                                    <option value="4">7</option>
                                    <option value="4">8</option>
                                    <option value="4">9</option>
                                    <option value="4">10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Wat zijn jouw sterke kanten</td>
                            <td>15</td>
                            <td>
                                <select name="grade7" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">5</option>
                                    <option value="4">6</option>
                                    <option value="4">7</option>
                                    <option value="4">8</option>
                                    <option value="4">9</option>
                                    <option value="4">10</option>
                                    <option value="4">11</option>
                                    <option value="4">12</option>
                                    <option value="4">13</option>
                                    <option value="4">14</option>
                                    <option value="4">15</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <em>Voor studenten die ook bij de Politie willen:</em>
                                <p>150 woorden met motivatie voor de Politie.</p>
                            </td>
                            <td>20</td>
                            <td>
                                <select name="grade8" class="form-control">
                                    <option value="kiezen" disabled selected>Kiezen...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">5</option>
                                    <option value="4">6</option>
                                    <option value="4">7</option>
                                    <option value="4">8</option>
                                    <option value="4">9</option>
                                    <option value="4">10</option>
                                    <option value="4">11</option>
                                    <option value="4">12</option>
                                    <option value="4">13</option>
                                    <option value="4">14</option>
                                    <option value="4">15</option>
                                    <option value="4">16</option>
                                    <option value="4">17</option>
                                    <option value="4">18</option>
                                    <option value="4">19</option>
                                    <option value="4">20</option>
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