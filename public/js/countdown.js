function count_down(countDownDate) {
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        if (!isNaN(minutes) && !isNaN(seconds))
            document.getElementById("clock1").innerHTML =
                minutes + " دقیقه و " + seconds + " ثانیه تا پایان چت باقی مانده ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            $('#finish_chat').click();
            document.getElementById("clock1").innerHTML = "زمان چت به پایان رسید";
        }
    }, 1000);
}
