  var am = temporaryJson.length;   
  var iStart = 0;  
  var amPage = 10; //number items per page
  var output = document.getElementById('output');
  var prev = document.getElementById('prev');
  var id_knop = document.getElementById('id_knop');
  var next = document.getElementById('next');

function createElements() {
	
document.getElementById('vivod').innerHTML = '';
	
var k = amPage;  var i = iStart;
  while(k>0) {
    if (am < k) { k=am} ;
	
for (; k>0; k--) {

var imPic = document.createElement('img');
	imPic.src = '../img/' + temporaryJson[i]['image_path'];
	imPic.setAttribute('class', 'img-main30');
	
var titleBook = document.createElement('h2');
var	titleBookText = document.createTextNode(temporaryJson[i]['title']);
	titleBook.appendChild(titleBookText);
	titleBook.setAttribute('class', 'blog-post-title');
	
var yearBook = document.createElement('h3');
var	yearBookText = document.createTextNode(temporaryJson[i]['year']);
	yearBook.appendChild(yearBookText);
	yearBook.setAttribute('class', 'blog-post-year');
	
var categoryBook = document.createElement('h3');
var	categoryBookText = document.createTextNode(temporaryJson[i]['cat_title']);
	categoryBook.appendChild(categoryBookText);
	categoryBook.setAttribute('class', 'blog-post-cat');
	
var divEvry = document.createElement('div');
	divEvry.setAttribute('class', 'blog-post');

var evryBook = document.getElementById('vivod');
	
	evryBook.appendChild(divEvry);
	divEvry.appendChild(imPic);
	divEvry.appendChild(titleBook);
	divEvry.appendChild(yearBook);
	divEvry.appendChild(categoryBook);
	
	if (admin) {
		
		/* button for redact */
	var formAdmin = document.createElement('form');
	formAdmin.setAttribute('action', 'redactBook.php');
	formAdmin.setAttribute('method', 'post');
		
	var inputAdminText = document.createElement('input');
	inputAdminText.setAttribute('type', 'text');
	inputAdminText.setAttribute('name', 'adminValue');
	inputAdminText.setAttribute('display', 'none');
	inputAdminText.setAttribute('value', temporaryJson[i]['id']);
	
	var inputAdmin = document.createElement('input');
	inputAdmin.setAttribute('class', 'topP4');
	inputAdmin.setAttribute('value', 'Redact');
	inputAdmin.setAttribute('type', 'submit');
				
	divEvry.appendChild(formAdmin);
	formAdmin.appendChild(inputAdminText).hidden = true;;
	formAdmin.appendChild(inputAdmin);

	} /* ----end if (admin)----*/
i++;
} /* ----end for (; k>0; k--) -----*/
} /* ------- end while (k>0) ---------- */
	
	if(am<=amPage) {next.style.display = 'none';}
	if(am>amPage) {next.style.display ='';}
	if(iStart<amPage) {prev.style.display = 'none';}
	if(iStart>=amPage) {prev.style.display ='';}

	prev.onclick = function() {
		am+=amPage;
		iStart-=amPage;
		createElements();
	  } /*end __function prev__*/

	next.onclick = function() {
		am-=amPage;
		iStart+=amPage;
		createElements();
	  } /*end __function next__*/
	
} /* ------end function createElements()----------*/