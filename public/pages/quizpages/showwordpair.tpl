<div class="container-fluid">
    <form action="" method="post">
        {foreach $questions question}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Vraag {$index++}</h6>
                </div>
                <div class="card-body">
                    <p class="text-center"> ?? staat tot <span class="text-danger">{$question.word1}</span>, zoals <span class="text-primary">{$question.word2}</span> staat tot ??</p>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{$question.id}-1" name="{$question.id}" value="{$question.incorrect_answer1}">
                        <label class="custom-control-label" for="{$question.id}-1">{$question.incorrect_answer1}</label>
                    </div>

                    <!-- Group of default radios - option 2 -->
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{$question.id}-2" name="{$question.id}" value="{$question.incorrect_answer2}">
                        <label class="custom-control-label" for="{$question.id}-2">{$question.incorrect_answer2}</label>
                    </div>

                    <!-- Group of default radios - option 3 -->
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{$question.id}-3"  name="{$question.id}" value="{$question.incorrect_answer3}">
                        <label class="custom-control-label" for="{$question.id}-3">{$question.incorrect_answer3}</label>
                    </div>

                    <!-- Group of default radios - option 4 -->
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{$question.id}-4"  name="{$question.id}" value="{$question.answer1} {$question.answer2}">
                        <label class="custom-control-label" for="{$question.id}-4">{$question.answer1} {$question.answer2}</label>
                    </div>
                </div>
            </div>
        {/foreach}
        <button type="submit" class="btn btn-primary" name="submit">Verzenden</button>
    </form>
</div>

{*{$question.num1}*}