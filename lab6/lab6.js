window.onload = function () {
    var pictureStrings = ["5855774224.jpg", "5856697109.jpg", "6119130918.jpg", "8711645510.jpg", "9504449928.jpg"];
    var pictureNames = ["Battle", "Luneburg", "Bermuda", "Athens", "Florence"];
    var thumbnailsDiv = document.getElementById("thumbnails");

    var figure = document.getElementById("featured");
    var largePic = document.getElementById("featured").children[0];
    var figcaption = document.getElementById("featured").children[1];

    for (let i = 0; i < 5; i++) {
        (function (j) {
            thumbnailsDiv.children[j].onclick = function changePic() {
                largePic.src = "images/medium/" + pictureStrings[j];
                figcaption.innerHTML = pictureNames[j];
            }
        })(i);
    }

    var timer = null;


    largePic.onmouseover = function () {
        startAnimation();
    };

    largePic.onmouseout = function () {
        endAnimation();
    };

    var current = 0;

    function startAnimation() {
        clearInterval(timer);
        timer = setInterval(function () {

            if (current == 0.8) {
                clearInterval(timer);
            } else {
                current = current + 0.008;
                figcaption.style.opacity = current;
            }
        }, 10)
    }

    function endAnimation() {
        clearInterval(timer);
        timer = setInterval(function () {

            if (current == 0) {
                clearInterval(timer);
            } else {
                current = current - 0.008;
                figcaption.style.opacity = current;
            }
        }, 10)
    }



};

