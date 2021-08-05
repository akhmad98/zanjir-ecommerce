
$(function(){
  $(".footer").load("./included/footer.html");
});


document.getElementsById("button").addEventListener("click", function(){
 var e =document.getElementsByClassName("overlay");

        e[0].style.display = 'block';

})	;
document.getElementById("close").addEventListener("click", function(){
   var e =document.getElementsByClassName("overlay");
 e[0].style.display= 'none';
});

var productArray = document.getElementsById("Products");
for(var i = 0; i < productArray.length; i++){
	var self = productArray[i];
	self.addEventListener("click", function(event){
		window.location.replace("./product.html");
	});
};
