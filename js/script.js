
console.log(button);


var button=document.querySelector(".btn-comments");
	///class for div from single-post page
var commentInfo=document.querySelector(".comment-info");
//var inicVred="Show comments";

var inicValue = button.innerHTML;

button.addEventListener("click", function(){


	
	
	if(inicValue === "Hide comments"){
		commentInfo.style.display = 'none';
		button.innerHTML = 'Show Comments';
		inicValue ='Show Comments';
	}else {
		commentInfo.style.display = 'inline';
		button.innerHTML = 'Hide comments';
		  inicValue = 'Hide comments';
	}


    
});


console.log(commentInfo);
console.log(button);

