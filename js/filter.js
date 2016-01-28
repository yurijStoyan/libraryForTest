var paramFiltr1 = /\d/;    							//digits
var paramFiltrA = /[A-ZА-Я]/i;   					//letters
var paramFiltrA1 = /[A-ZА-Я\d]/i;   				//letters and digits
var paramFiltrA1s = /[A-ZА-Я\d\s]/i;   				//digits, letters and space
var paramFiltrA1Sbs = /[A-ZА-Я\d\s\:\`\'\-\?\!\.\,]/i;   //digits, letters and [ space : - " ? ! . , ]
    

  function filter_input(e,regexp)
{
  e=e || window.event;
  var target=e.target || e.srcElement;
  var isIE=document.all;

  if (target.tagName.toUpperCase()=='INPUT')
  {
    var code=isIE ? e.keyCode : e.which;
    if (code<32 || e.ctrlKey || e.altKey) return true;

    var char=String.fromCharCode(code);
    if (!regexp.test(char)) return false;
  }
  return true;
}

/*
<p>digits example</p>
<input type="text" onkeypress="return filter_input(event,paramFiltr1)" pattern="[0-9]{4}">
<br>
<p>digits and letters example</p>
<input type="text" onkeypress="return filter_input(event,paramFiltrA)">
<br>
<p>digits, letters example</p>
<input type="text" onkeypress="return filter_input(event,paramFiltrA1)">
<br>
<p>digits, letters and [ : - " ? ! . , ] example</p>
<input type="text" onkeypress="return filter_input(event,paramFiltrA1S)">
*/