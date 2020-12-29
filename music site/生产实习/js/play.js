    $(document).ready(function() {
        var musicList = document.getElementById('musicList');
        var li = musicList.getElementsByTagName('li');
        var voice = document.getElementById('voice'); //获取到audio元素

        for(var i = 0;i < li.length;i++){
            $(li[i]).click(function() { //点击文字事件
                if (voice.paused) { //判断音乐是否在播放中，暂停状态
                    voice.play(); //音乐播放
                }
            });
        }
    }); 

//wrong!
    // $(function(){
    //     var lis = musicList.getElementsByTagName('li');
    //     lis.onclick = function(){
    //         for(var i = 0;i < lis.length;i++){
    //             console.log(lis[i]);
    //             lis[i].html.audio = '../music copy/' + i + '.mp3';
    //         }
    //     }
    // });
 
//wrong!
    // $(document).ready(function() {
    //     var voice = document.getElementById('voice'); //获取到audio元素
    //     $('.but').click(function() { //点击文字事件
    //         if (voice.paused) { //判断音乐是否在播放中，暂停状态
    //             voice.play(); //音乐播放
    //         }
    //     });
    // });

