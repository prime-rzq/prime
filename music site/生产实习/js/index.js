window.onload = function(){
    var piaofu = document.getElementById('piaofu');
    var flo = document.getElementById('float');
    
    flo.onmouseover = function(){
        piaofu.stop();
    }
    flo.onmouseout = function(){
        piaofu.start();
    }

}