var startX,
    startY,
    dist,
    threshold = 150, //required min distance traveled to be considered swipe
    allowedTime = 200, // maximum time allowed to travel that distance
    elapsedTime,
    startTime,
    left,
    right;
window.addEventListener('touchstart', function(e) {
    //touchsurface.innerHTML = ''
    var touchobj = e.changedTouches[0]
    dist = 0
    startX = touchobj.pageX
    startY = touchobj.pageY
    startTime = new Date().getTime() // record time when finger first makes contact with surface
}, false)

window.addEventListener('touchend', function(e) {
    var touchobj = e.changedTouches[0]
    dist = touchobj.pageX - startX // get total dist traveled by finger while in contact with surface
    elapsedTime = new Date().getTime() - startTime // get time elapsed
    // check that elapsed time is within specified, horizontal dist traveled >= threshold, and vertical dist traveled <= 100
    var swiperightBol = (elapsedTime <= allowedTime && Math.abs(dist) >= threshold && Math.abs(touchobj.pageY - startY) <= 100)

    var dir_str = "none";
    var dir_int = 0;
    if (swiperightBol) {
        if (dist > 0) {
            if (right) {
                right();
            }
            console.log('swiperight')
            dir_str = "right";
            dir_int = 1;
        } else {
            if (left) {
                left();
            }
            console.log('swipeleft')
            dir_str = "left";
            dir_int = 2;
        }
    }
}, false)

function SetLeft(action){
    console.log(action)
    left = action;
}

function SetRight(action){
    console.log(action)
    right = action;
}

module.exports = {
    SetRight:SetRight,
    SetLeft:SetLeft
}