function agregarfavoritos(nombre){
   if ((navigator.appName=="Microsoft Internet Explorer") &&
         (parseInt(navigator.appVersion)>=4)) {
      var url=location.href;
      var titulo="Inmobilia.com - "+nombre;
      window.external.AddFavorite(url,titulo);
    
   } else {
      if(navigator.appName == "Netscape")
      {
        alert("Presione Crtl+D para agregar este sitio en sus Bookmarks");
      }
   }
}