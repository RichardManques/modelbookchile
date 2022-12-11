function countChars(obj){
  var maxLength = 120;
  var strLength = obj.value.length;
  
  if(strLength > maxLength){
      document.getElementById("charNum").innerHTML = '<span style="color: red;">'+strLength+' / '+maxLength+' caracteres</span>';
  }else{
      document.getElementById("charNum").innerHTML = strLength+' / '+maxLength+' caracteres';
  }
}