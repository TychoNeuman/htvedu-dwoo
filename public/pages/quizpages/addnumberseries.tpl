<form method="post">
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="form-group col-md-1">
                <input type="text" class="form-control" placeholder="1" name="num1">
            </div>
            <div class="form-group col-md-1">
                <input type="text" class="form-control" placeholder="2" name="num2">
            </div>
            <div class="form-group col-md-1">
                <input type="text" class="form-control" placeholder="3" name="num3">
            </div>
            <div class="form-group col-md-1">
                <input type="text" class="form-control" placeholder="4" name="num4">
            </div>
            <div class="form-group col-md-1">
                <input type="text" class="form-control" placeholder="5" name="num5">
            </div>
            <div class="form-group col-md-1">
                <input type="text" class="form-control" placeholder="6" name="num6">
            </div>
            <div class="form-group col-md-1">
                <input type="text" class="form-control" placeholder="??" name="answer">
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-1">
            <input type="text" class="form-control" placeholder="8" name="incorrect_num1">
        </div>
        <div class="form-group col-md-1">
            <input type="text" class="form-control" placeholder="9" name="incorrect_num2">
        </div>
        <div class="form-group col-md-1">
            <input type="text" class="form-control" placeholder="10" name="incorrect_num3">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-1">
            <input type="text" class="form-control" placeholder="100" name="score">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Toevoegen</button>
</form>
<br>
{foreach $questions question}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Vraag {$index++}</h6>
        </div>
        <div class="card-body">
            <p><strong>Opties: </strong> {$question.quizInfo.num1}, {$question.quizInfo.num2}, {$question.quizInfo.num3} {$question.quizInfo.num4}, {$question.quizInfo.num5}, {$question.quizInfo.num6}</p>
            <p><strong>Incorrecte opties: </strong>{$question.quizInfo.incorrect_num1}, {$question.quizInfo.incorrect_num2}, {$question.quizInfo.incorrect_num3}</p>
            <p><strong>Antwoord: </strong> {$question.quizInfo.answer}</p>
            <p><strong>Score: </strong> {$question.quizInfo.score}</p>
        </div>
    </div>
{/foreach}
</div>