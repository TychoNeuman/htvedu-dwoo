<div class="card shadow h-100 py-2">
    <div class="card-body">
        <form method="post">
            <h6 class="m-0 font-weight-bold text-primary">Vraag: </h6>
            <div class="form-row justify-content-center">
                <div class="form-group col-md-2">
                    <input type="text" name="answer1" id="answer1" class="form-control" placeholder="...??">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" value="staat tot" class="form-control" disabled>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="word1" class="form-control" placeholder="...Diner">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" value="zoals" class="form-control" disabled>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="word2" class="form-control" placeholder="...Ochtend">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" value="staat tot" class="form-control" disabled>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="answer2" class="form-control" placeholder="...??">
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Foutief antwoord 1:</h6>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="text" name="incorrect_answer1-1" class="form-control" placeholder="...Middag">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="incorrect_answer1-2" class="form-control" placeholder="...Lunch">
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Foutief antwoord 2:</h6>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="text" name="incorrect_answer2-1" class="form-control" placeholder="...Ochtend">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="incorrect_answer2-2" class="form-control" placeholder="...Koffie">
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Foutief antwoord 3:</h6>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="text" name="incorrect_answer3-1" class="form-control" placeholder="...Dagsoep">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="incorrect_answer3-2" class="form-control" placeholder="...Tijdstip">
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Foutief antwoord 4:</h6>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="text" name="incorrect_answer4-1" class="form-control" placeholder="...S'nachts">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="incorrect_answer4-2" class="form-control" placeholder="...Water">
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
            <p><strong>Vraag: </strong> ?? staat tot <span class="text-danger">{$question.quizInfo.word1}</span>, zoals <span class="text-primary">{$question.quizInfo.word2}</span> staat tot ??</p>
            <p><strong>Incorrecte opties: </strong>{$question.quizInfo.incorrect_answer1} - {$question.quizInfo.incorrect_answer2} - {$question.quizInfo.incorrect_answer3} - {$question.quizInfo.incorrect_answer4}</p>
            <p><strong>Antwoord: </strong> {$question.quizInfo.answer1} {$question.quizInfo.answer2}</p>
            <p><strong>Score: </strong> {$question.quizInfo.score}</p>
        </div>
    </div>
{/foreach}

