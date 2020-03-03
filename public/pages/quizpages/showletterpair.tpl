<form action="" method="post">
    {foreach $questions as question}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Vraag {$index++}</h6>
        </div>
        <div class="card-body">
            <p class="text-center"><span class="text-primary">{$question.quizInfo.pair1a} {$question.quizInfo.pair1b}</span> - <span class="text-primary">{$question.quizInfo.pair2a} {$question.quizInfo.pair2b}</span> - <span class="text-primary">{$question.quizInfo.pair3a} {$question.quizInfo.pair3b}</span> - <span class="font-weight-bold text-danger">? ?</span></p>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="{$question.quizInfo.id}-1" name="{$question.quizInfo.id}" value="{$question.shuffled[0]}">
                <label class="custom-control-label" for="{$question.quizInfo.id}-1">{$question.shuffled[0]}</label>
            </div>

            <!-- Group of default radios - option 2 -->
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="{$question.quizInfo.id}-2" name="{$question.quizInfo.id}" value="{$question.shuffled[1]}">
                <label class="custom-control-label" for="{$question.quizInfo.id}-2">{$question.shuffled[1]}</label>
            </div>

            <!-- Group of default radios - option 3 -->
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="{$question.quizInfo.id}-3"  name="{$question.quizInfo.id}" value="{$question.shuffled[2]}">
                <label class="custom-control-label" for="{$question.quizInfo.id}-3">{$question.shuffled[2]}</label>
            </div>

            <!-- Group of default radios - option 4 -->
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="{$question.quizInfo.id}-4"  name="{$question.quizInfo.id}" value="{$question.shuffled[3]}">
                <label class="custom-control-label" for="{$question.quizInfo.id}-4">{$question.shuffled[3]}</label>
            </div>
        </div>
    </div>
    {/foreach}
    <button type="submit" class="btn btn-primary" id="submit-button" name="submit">Verzenden</button>
</form>