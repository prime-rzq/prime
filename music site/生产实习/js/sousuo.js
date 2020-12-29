function keyLight(id, key, bgColor){
    var oDiv = document.getElementById(id),
       sText = oDiv.innerHTML,
       bgColor = bgColor || "orange",    
       sKey = "<span style='background-color: "+bgColor+";'>"+key+"</span>",
       num = -1,
       rStr = new RegExp(key, "g"),
       rHtml = new RegExp("\<.*?\>","ig"), //匹配html元素
       aHtml = sText.match(rHtml); //存放html元素的数组

       sText = sText.replace(rHtml, '{~}');  //替换html标签
       sText = sText.replace(rStr,sKey); //替换key
       sText = sText.replace(/{~}/g,function(){  //恢复html标签
       num++;
       return aHtml[num];
  }); 
    oDiv.innerHTML = sText;
}

// var serchKey = document.getElementById('serchKey').value;
// var key1 = keyLight('result', 'serchKey')

var sousuo = document.getElementById('serchKey');
sousuo.focus = function(){
  sousuo.value = '';
}
sousuo.onblur = function(){
  var val = sousuo.value;
  alert(val);
  var key1 = keyLight('result', 'val','green')
}
