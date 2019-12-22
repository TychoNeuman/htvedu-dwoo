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
            <h6 class="m-0 font-weight-bold text-primary">Vraag [1]</h6>
        </div>
        <div class="card-body">
            <p><strong>Opties: </strong> {$question.num1}, {$question.num2}, {$question.num3} {$question.num4}, {$question.num5}, {$question.num6}</p>
            <p><strong>Incorrecte opties: </strong>{$question.incorrect_num1}, {$question.incorrect_num2}, {$question.incorrect_num3}</p>
            <p><strong>Antwoord: </strong> {$question.answer}</p>
            <p><strong>Score: </strong> {$question.score}</p>
        </div>
    </div>
{/foreach}
</div>