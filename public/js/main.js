let quizTimeSpan = $("span#quiztime")[0];
let quizTime = quizTimeSpan.innerText;
quizTimeSpan.innerText = quizTime + ":00";

//Timer
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            $("#submit-button").click();
        }
    }, 1000);
}

jQuery(function ($) {
    var amountOfMinutes = 60 * quizTime,
        display = $('#quiztime');
    startTimer(amountOfMinutes, display);
});