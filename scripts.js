//refernce: https://forum.jquery.com/topic/jquery-moving-text
$(function() {
	//when the document starts, the text t animates left
 	 $("#t").animate({ 
        top: "+=80%",
        left: "+=40",
        marginLeft: "0.7in", opcaity: 0.9 },1500); //moves the text to the left by 0.7
      
	//when the document starts, the text t1 animates right
 	$("#t1").animate({ 
        top: "+=80%",
        right: "+=40",
        marginRight: "3.7in", opcaity: 0.9 },1500); //moves the text to the right by 3.7

 	$("#submit").click(function() {
 		alert("We are sorry, you cannot create an account for now, this page is under construction");
 	});
 
});