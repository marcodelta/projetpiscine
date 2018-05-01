function changeImage(element)
{
	var x = document.getElementById("image0");
  var v = x.getAttribute("src");
  if(v== "accueil.png")
   { v= "accueil2.png";}
  else
  { v = "accueil.png";}

x.setAttribute("src", v);
}
