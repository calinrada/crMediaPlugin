$(document).ready(function(){
  $("a[rel^='prettyPhoto']").prettyPhoto();
})

/*** Media content methods ***/
var setMediaType = function(type){
  if(type=='video'||type=='audio')
  {
    $('.sf_admin_form_field_resize_size').hide();
  }
  else
  {
    $('.sf_admin_form_field_resize_size').show();
  }
}