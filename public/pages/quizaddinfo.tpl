{extends 'layouts/base.tpl'}

{block "content"}
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Toets toevoegen</h1>
        </div>
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <form method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputQuizName">Naam toets:</label>
                            <input type="text" class="form-control" id="input-quiz-name" placeholder="Bijv. cijferreeks..." name="quiz-name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputType">Type:</label>
                            <select id="inputType" class="form-control" name="quiz-type">
                                <option selected>Soort toets:...</option>
                                <option value="1">Cijferreeks</option>
                                <option value="2">Woordpaar</option>
                                <option value="3">Letterpaar</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputTime">Tijd:</label>
                            <div class="input-group-prepend">
                                <input type="text" class="form-control" id="inputTime" placeholder="10" name="time">
                                <div class="input-group-text">Minuten</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputScore">Score:</label>
                            <input type="text" class="form-control" id="inputScore" placeholder="100" name="score">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Volgende</button>
                </form>
            </div>
        </div>
    </div>
{/block}