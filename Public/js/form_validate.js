function checknull(){
    var el=$("input.select");
    var len=el.length;
    var result=0;
    for (var i=0;i<len;i++)
    {
      if ( (el[i].type=="checkbox") )
      {
        result = result + el[i].checked;
      }
    }
    if(result==0){
      alert("请选择至少一条记录！");
      return true;
    }
    else return false;
  }

  function mysubmit(formid,url){
    var myform = document.getElementById(formid);
    if(!checknull()){
      myform.action = url;
      myform.submit();
    }
  }

  function checkall_func(){
    var el=$("input.select");
    var len=el.length;
    for (var i=0;i<len;i++)
    {
      if ( (el[i].type=="checkbox") )
      {
        el[i].checked=true;
      }
    }
  };

  function clearall_func(){
    var el=$("input.select");
    var len=el.length;
    for (var i=0;i<len;i++)
    {
      if ( (el[i].type=="checkbox") )
      {
        el[i].checked=false;
      }
    }
  };

  function createRequest(){

  var xmlhttp;
  if (window.XMLHttpRequest){
  // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }
  else{  
  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200){
      //alert(xmlhttp.responseText);
    }
    };
    return xmlhttp;
   };