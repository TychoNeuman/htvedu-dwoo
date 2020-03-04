<div class="card shadow h-100 py-2">
    <div class="card-body">
        <form method="post">
            <h6 class="m-0 font-weight-bold text-primary">Vraag: </h6>
            <div class="form-row justify-content-center">
                <div class="form-group col-md-1">
                    <input type="text" name="pair1a" class="form-control" placeholder="...d">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" name="pair1b" class="form-control" placeholder="...f">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" value="-" class="form-control text-center" disabled>
                </div>
                <div class="form-group col-md-1">
                    <input type="text" name="pair2a" class="form-control" placeholder="...j">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" name="pair2b" class="form-control" placeholder="...l">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" value="-" class="form-control text-center" disabled>
                </div>
                <div class="form-group col-md-1">
                    <input type="text" name="pair3a" class="form-control" placeholder="...p">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" name="pair3b" class="form-control" placeholder="...r">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" value="-" class="form-control text-center" disabled>
                </div>
                <div class="form-group col-md-1">
                    <input type="text" name="answer1" class="form-control" placeholder="...?">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" name="answer2" class="form-control" placeholder="...?">
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Foutief antwoord 1:</h6>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <input type="text" name="incorrect-answer1" class="form-control" placeholder="...z">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" name="incorrect-answer2" class="form-control" placeholder="...y">
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Foutief antwoord 2:</h6>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <input type="text" name="incorrect-answer3" class="form-control" placeholder="...x">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" name="incorrect-answer4" class="form-control" placeholder="...v">
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Foutief antwoord 3:</h6>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <input type="text" name="incorrect-answer5" class="form-control" placeholder="...x">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" name="incorrect-answer6" class="form-control" placeholder="...z">
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Score:</h6>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <input type="text" name="score" class="form-control" placeholder="...10">
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Toevoegen">
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
            <p><strong>Vraag: </strong> {$question.quizInfo.pair1a} {$question.quizInfo.pair1b} - {$question.quizInfo.pair2a} {$question.quizInfo.pair2b} - {$question.quizInfo.pair3a} {$question.quizInfo.pair3b} - ? ?</p>
            <p><strong>Incorrecte opties: </strong> {$question.quizInfo.incorrect_answer1} {$question.quizInfo.incorrect_answer2} - {$question.quizInfo.incorrect_answer3} {$question.quizInfo.incorrect_answer4} - {$question.quizInfo.incorrect_answer5} {$question.quizInfo.incorrect_answer6}</p>
            <p><strong>Antwoord: </strong> {$question.quizInfo.answer1} {$question.quizInfo.answer2}</p>
            <p><strong>Score: </strong> {$question.quizInfo.score}</p>
        </div>
    </div>
{/foreach}