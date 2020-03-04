<div class="card shadow h-100 py-2">
    <div class="card-body">
        <form method="post">
            <h6 class="m-0 font-weight-bold text-primary">Vraag: </h6>
                <div class="row justify-content-center">
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="...4" name="num1">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="...9" name="num2">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="...14" name="num3">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="...19" name="num4">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="...24" name="num5">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="...29" name="num6">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="...??" name="answer">
                    </div>
                </div>
            <h6 class="m-0 font-weight-bold text-primary">Foutief antwoord 1:</h6>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" placeholder="...31" name="incorrect_num1">
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Foutief antwoord 2:</h6>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" placeholder="...35" name="incorrect_num2">
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Foutief antwoord 3:</h6>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" placeholder="...32" name="incorrect_num3">
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Score:</h6>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" placeholder="...10" name="score">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</div>
<br>
{foreach $questions question}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Vraag {$index++}</h6>
        </div>
        <div class="card-body">
            <p><strong>Opties: </strong> {$question.quizInfo.num1}, {$question.quizInfo.num2}, {$question.quizInfo.num3}, {$question.quizInfo.num4}, {$question.quizInfo.num5}, {$question.quizInfo.num6}, ??</p>
            <p><strong>Incorrecte opties: </strong>{$question.quizInfo.incorrect_num1}, {$question.quizInfo.incorrect_num2}, {$question.quizInfo.incorrect_num3}</p>
            <p><strong>Antwoord: </strong> {$question.quizInfo.answer}</p>
            <p><strong>Score: </strong> {$question.quizInfo.score}</p>
        </div>
    </div>
{/foreach}
</div>