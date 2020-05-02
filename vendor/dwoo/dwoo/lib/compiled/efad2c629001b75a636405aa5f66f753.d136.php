<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><form action="" method="post">
<?php 
$_fh0_data = (isset($this->scope["questions"]) ? $this->scope["questions"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['as']=>$this->scope['question'])
	{
/* -- foreach start output */
?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Vraag <?php echo ($this->scope["index"]++);?></h6>
        </div>
        <div class="card-body">
            <p class="text-center"><?php echo $this->scope["question"]["quizInfo"]["num1"];?> - <?php echo $this->scope["question"]["quizInfo"]["num2"];?> - <?php echo $this->scope["question"]["quizInfo"]["num3"];?> - <?php echo $this->scope["question"]["quizInfo"]["num4"];?> - <?php echo $this->scope["question"]["quizInfo"]["num5"];?> - <?php echo $this->scope["question"]["quizInfo"]["num6"];?> - <span class="font-weight-bold text-danger">&quest;</span></p>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="<?php echo $this->scope["question"]["quizInfo"]["id"];?>-1" name="<?php echo $this->scope["question"]["quizInfo"]["id"];?>" value="<?php echo $this->scope["question"]["shuffled"]["0"];?>">
                <label class="custom-control-label" for="<?php echo $this->scope["question"]["quizInfo"]["id"];?>-1"><?php echo $this->scope["question"]["shuffled"]["0"];?></label>
            </div>

            <!-- Group of default radios - option 2 -->
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="<?php echo $this->scope["question"]["quizInfo"]["id"];?>-2" name="<?php echo $this->scope["question"]["quizInfo"]["id"];?>" value="<?php echo $this->scope["question"]["shuffled"]["1"];?>">
                <label class="custom-control-label" for="<?php echo $this->scope["question"]["quizInfo"]["id"];?>-2"><?php echo $this->scope["question"]["shuffled"]["1"];?></label>
            </div>

            <!-- Group of default radios - option 3 -->
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="<?php echo $this->scope["question"]["quizInfo"]["id"];?>-3"  name="<?php echo $this->scope["question"]["quizInfo"]["id"];?>" value="<?php echo $this->scope["question"]["shuffled"]["2"];?>">
                <label class="custom-control-label" for="<?php echo $this->scope["question"]["quizInfo"]["id"];?>-3"><?php echo $this->scope["question"]["shuffled"]["2"];?></label>
            </div>

            <!-- Group of default radios - option 4 -->
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="<?php echo $this->scope["question"]["quizInfo"]["id"];?>-4"  name="<?php echo $this->scope["question"]["quizInfo"]["id"];?>" value="<?php echo $this->scope["question"]["shuffled"]["3"];?>">
                <label class="custom-control-label" for="<?php echo $this->scope["question"]["quizInfo"]["id"];?>-4"><?php echo $this->scope["question"]["shuffled"]["3"];?></label>
            </div>
        </div>
    </div>
<?php 
/* -- foreach end output */
	}
}?>
 <button type="submit" class="btn btn-primary" id="submit-button" name="submit">Verzenden</button>
</form>


<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>