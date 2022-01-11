/*if(screen.width < 768) {
  $("#wave").attr("src","assets/images/R.png");
  $("#footer").attr("style","background-image: url('assets/images/rodape.webp')"); 
  $(".fundo").attr("src","assets/images/Caixa de fala da cegonha.webp");
 } else if(screen.width > 768) {
   $("#footer").attr("style","background-image: url('assets/images/Rectangle 220.webp')"); 
 }
 
 document.getElementById("azulMobile").addEventListener("click", function() {
   if(document.getElementById("azulMobile").classList.contains("activeBlue") == false) {
     document.getElementById("azulMobile").classList.add("activeBlue");
     document.getElementById("rosaMobile").classList.remove("activeRosa");
     document.getElementById("verdeMobile").classList.remove("activeVerde");
   }
 });
 
 document.getElementById("verdeMobile").addEventListener("click", function() {
   if(document.getElementById("verdeMobile").classList.contains("activeVerde") == false) {
     document.getElementById("verdeMobile").classList.add("activeVerde");
     document.getElementById("rosaMobile").classList.remove("activeRosa");
     document.getElementById("azulMobile").classList.remove("activeBlue");
   }
 });
 
 document.getElementById("rosaMobile").addEventListener("click", function() {
   if(document.getElementById("rosaMobile").classList.contains("activeRosa") == false) {
     document.getElementById("rosaMobile").classList.add("activeRosa");
     document.getElementById("azulMobile").classList.remove("activeBlue");
     document.getElementById("verdeMobile").classList.remove("activeVerde");
   }
 });*/

 //avulso
$(".avulso").on("mouseover", function() {
  $("#avulso").attr("src","assets/image/boxL-avulso.webp");
});
$(".avulso").on("mouseout", function() {
  $("#avulso").attr("src","assets/image/box-avulso.webp");
});

//completo
$(".completo").on("mouseover", function() {
  $("#completo").attr("src","assets/image/boxL-completo.webp");
});
$(".completo").on("mouseout", function() {
  $("#completo").attr("src","assets/image/box-completo.webp");
});

//semestral 
$(".semestral").on("mouseover", function() {
  $("#semestral").attr("src","assets/image/boxL-semestral.webp");
});
$(".semestral").on("mouseout", function() {
  $("#semestral").attr("src","assets/image/box-semestral.webp");
});

if(screen.width < 768) {
  $("#avulso").attr("src","assets/image/box-avulso-mob.webp");
  $("#completo").attr("src","assets/image/box-completo-mob.webp"); 
  $("#semestral").attr("src","assets/image/box-semestral-mob.webp");
  $("#footer").attr("style","background-image: url('assets/image/footer-mob.webp')"); 
 } 