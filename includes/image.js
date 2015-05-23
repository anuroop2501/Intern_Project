function change() {
    var rotator = document.getElementById('rotator');  // change to match image ID
    var imageDir = '';                          // change to match images folder
    var delayInSeconds = 5;
                                // set number of seconds delay
    // list image names
   var images = ['army/image2.jpg', 'army/image3.jpg', 'army/image4.jpg', 'army/image1.jpg'];
      $('img.x').each(function(index){

    // don't change below this line
    var num = 0;
    var changeImage = function change() {
        var len = images.length;
        rotator.src = imageDir + images[num++];
        if (num == len) {
            num = 0;
        }

    //}
    };
    setInterval(changeImage, delayInSeconds * 1000);
})();