 <div class="container-fluid">
     <form action="" method="post">
    {foreach $questions question}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Vraag {$index++}</h6>
            </div>
            <div class="card-body">
                <p class="text-center">{$question.num1} - {$question.num2} - {$question.num3} - {$question.num4} - {$question.num5} - {$question.num6}</p>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="{$question.id}-1" name="{$question.id}" value="{$question.incorrect_num1}">
                    <label class="custom-control-label" for="{$question.id}-1">{$question.incorrect_num1}</label>
                </div>

                <!-- Group of default radios - option 2 -->
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="{$question.id}-2" name="{$question.id}" value="{$question.incorrect_num2}">
                    <label class="custom-control-label" for="{$question.id}-2">{$question.incorrect_num2}</label>
                </div>

                <!-- Group of default radios - option 3 -->
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="{$question.id}-3"  name="{$question.id}" value="{$question.incorrect_num3}">
                    <label class="custom-control-label" for="{$question.id}-3">{$question.incorrect_num3}</label>
                </div>

                <!-- Group of default radios - option 4 -->
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="{$question.id}-4"  name="{$question.id}" value="{$question.answer}">
                    <label class="custom-control-label" for="{$question.id}-4">{$question.answer}</label>
                </div>
            </div>
        </div>
    {/foreach}
     <button type="submit" class="btn btn-primary" name="submit">Verzenden</button>
     </form>
    </div>

