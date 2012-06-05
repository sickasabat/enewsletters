jQuery.noConflict();
jQuery.fn.center = function () {
  this.css("position","absolute");
  this.css("top", ( jQuery(window).height() - this.height() ) / 2+jQuery(window).scrollTop() + "px");
  this.css("left", ( jQuery(window).width() - this.width() ) / 2+jQuery(window).scrollLeft() + "px");
  return this;
};

jQuery(document).ready(function() {
  //select all the a tag with name equal to modal
  WYSIWYG.attach('text2',custom);
  var clicked = "";
  //Remove online cell if editing
  if(jQuery('.online')){
    jQuery('.online').remove();
  }
  if(jQuery('.unsub')){
    jQuery('.unsub').remove();
  }
  //jQuery('td[name=modal]').css({'border':'1px solid black'});
  jQuery('td[name=modal],a[name=modal]').live('click',function(e) {
    //Cancel the link behavior
    e.preventDefault();
    clicked ='#'+jQuery(this).attr('id');
    WYSIWYG.getEditorWindow('text2').document.body.innerHTML = jQuery(clicked).html();
    WYSIWYG.setName(clicked);
    //Get the A tag
    var id = jQuery(this).attr('href');
    //Get the screen height and width
    var maskHeight = jQuery(document).height();
    var maskWidth = jQuery(window).width();
    //Set height and width to mask to fill up the whole screen
    jQuery('#mask').css({'width':maskWidth,'height':maskHeight});
    //transition effect
    jQuery('#mask').fadeIn(100);
    jQuery('#mask').fadeTo("fast",0.8);
    //Get the window height and width
    var winH = jQuery(window).height();
    var winW = jQuery(window).width();
    //Set the popup window to center
    jQuery(id).css('top',  (winH/2-jQuery(id).height()/2) + (jQuery(window).scrollTop()));
    jQuery(id).css('left', (winW/2-jQuery(id).width()/2) + (jQuery(window).scrollLeft()));
    //transition effect
    jQuery(id).fadeIn(200);
  });

  //Change the colors
  jQuery('#colorchange').click(function(e){
    e.preventDefault();
    var text = jQuery('#selecttextcolor').val();
    text = '#' + text;
    var bg = jQuery('#selectbackgroundcolor').val();
    bg = '#' + bg;
    jQuery('#main').css('color',text);
    jQuery('#main').css('background-color',bg);
    jQuery('#tablecolor').hide();
  });

  //if close button is clicked
  jQuery('.window .close').click(function (e) {
    //Cancel the link behavior
    e.preventDefault();
    jQuery('#mask, .window').hide();
  });

  //if save button is clicked
  jQuery('.save').click(function(e){
    e.preventDefault();
    jQuery(clicked).html(WYSIWYG.getEditorWindow('text2').document.body.innerHTML);
    WYSIWYG.updateTextArea('text2');
    jQuery('#mask, .window').hide();
  });

  //if mask is clicked
  jQuery('#mask').click(function () {
    jQuery(this).hide();
    jQuery('.window').hide();
  });

  jQuery('.add2575').click(function(e){
    e.preventDefault();
    jQuery('.unsub').remove();
    var celln = jQuery('.dashed:last').attr('id');
    var parts = celln.match(/(\D+)(\d+)$/);
    var lastcell = parts[2];
    var newrow  = jQuery('<tr></tr>');
    newrow.html('<td href="#dialog" name="modal" id="cell'+(+lastcell+1)+'" class="dashed" colspan="2">Cell'+(+lastcell+1)+'</td>\n<td href="#dialog" name="modal" id="cell'+(+lastcell+2)+'"  class="dashed" colspan="4" >Cell'+(+lastcell+2)+'</td>');

    newrow.find('td[name=modal]').each(function(index){jQuery(this).text(jQuery(this).attr('id').substring(0,1).toUpperCase()+jQuery(this).attr('id').substring(1))});
    jQuery('#main').append(newrow);
  });

  jQuery('.add5050').click(function(e){
    e.preventDefault();
    jQuery('.unsub').remove();
    var celln = jQuery('.dashed:last').attr('id');
    var parts = celln.match(/(\D+)(\d+)$/);
    var lastcell = parts[2];

    var newrow  = jQuery('<tr></tr>');
    newrow.html('<td href="#dialog" name="modal" id="cell'+(+lastcell+1)+'" class="dashed" colspan="3">Cell'+(+lastcell+1)+'</td>\n<td href="#dialog" name="modal" id="cell'+(+lastcell+2)+'" class="dashed" colspan="3" >Cell'+(+lastcell+2)+'</td>');

    newrow.find('td[name=modal]').each(function(index){jQuery(this).text(jQuery(this).attr('id').substring(0,1).toUpperCase()+jQuery(this).attr('id').substring(1))});
    jQuery('#main').append(newrow);
  });

  jQuery('.add7525').click(function(e){
    e.preventDefault();
    jQuery('.unsub').remove();
    var celln = jQuery('.dashed:last').attr('id');
    var parts = celln.match(/(\D+)(\d+)$/);
    var lastcell = parts[2];

    var newrow  = jQuery('<tr></tr>');
    newrow.html('<td href="#dialog" name="modal" id="cell'+(+lastcell+1)+'" class="dashed" colspan="4">Cell'+(+lastcell+1)+'</td>\n<td href="#dialog" name="modal" id="cell'+(+lastcell+2)+'" class="dashed" colspan="2" >Cell'+(+lastcell+2)+'</td>');

    newrow.find('td[name=modal]').each(function(index){jQuery(this).text(jQuery(this).attr('id').substring(0,1).toUpperCase()+jQuery(this).attr('id').substring(1))});
    jQuery('#main').append(newrow);
  });

  jQuery('.add1000').click(function(e){
    e.preventDefault();
    jQuery('.unsub').remove();
    var celln = jQuery('.dashed:last').attr('id');
    var parts = celln.match(/(\D+)(\d+)$/);
    var lastcell = parts[2];
    var newrow  = jQuery('<tr></tr>');
    newrow.html("<td href=\"#dialog\" name=\"modal\" id=\"cell"+(+lastcell+1)+"\" class=\"dashed\" colspan=\"6\">Cell"+(+lastcell+1)+"</td>");
    newrow.find('td[name=modal]').each(function(index){jQuery(this).text(jQuery(this).attr('id').substring(0,1).toUpperCase()+jQuery(this).attr('id').substring(1))});
    jQuery('#main').append(newrow);
  });

  jQuery('.add3333').click(function(e){
    e.preventDefault();
    jQuery('.unsub').remove();
    var celln = jQuery('.dashed:last').attr('id');
    var parts = celln.match(/(\D+)(\d+)$/);
    var lastcell = parts[2];
    var newrow = jQuery('<tr></tr>');
    newrow.html('<td href="#dialog" name="modal" id="cell'+(+lastcell+1)+'" class="dashed" colspan="2">Cell'+(+lastcell+1)+'</td>\n<td href="#dialog" name="modal" id="cell'+(+lastcell+2)+'" class="dashed" colspan="2" >Cell'+(+lastcell+2)+'</td>\n<td href="#dialog" name="modal" id="cell'+(lastcell+3)+'" class="dashed" colspan="2" >Cell'+(lastcell+3)+'</td>');
    newrow.find('td[name=modal]').each(function(index){jQuery(this).text(jQuery(this).attr('id').substring(0,1).toUpperCase()+jQuery(this).attr('id').substring(1))});
    jQuery('#main').append(newrow);
  });

  jQuery('.write').click(function(e){
    e.preventDefault();
    jQuery('#file').val(jQuery('#filename').val());
    if(jQuery('.unsub').length == 0){
      jQuery('#main > tbody:last').append("<tr class='unsub'><td colspan='6' style='padding:10px 0 0 0;font-size:14px;'><p align=center>To Unsubscribe from these newsletters please click <a href='mailto:adminnewaccountemail@blueorchidmarketing.com?subject=unsubscribe'>here</a> or send an email to adminnewaccountemail@blueorchidmarketing.com with unsubscribe in the subject.</td></tr>");
    }
    jQuery('.remove').remove();	
    var contents = jQuery('#s1').html();
    contents = contents.replace(/<TBODY>/i,"<tbody><tr class=\"online\"><td colspan=\"6\" style=\"font-size:14px\"><p align=center>If this is not displaying correctly view it online <a href='"+jQuery('#filename').val()+"'>here.</a></td></tr>");
    var pagedata = '<html><head><title>E-letter</title></head><body style="text-align:center;margin:50px auto;">'+contents+'</body></html>';

    jQuery('input#pagedata').val(pagedata);
    jQuery('#saveform').submit();
  });

  jQuery('.read').click(function(e){
    e.preventDefault();
    jQuery('#efile').val(jQuery('#efilename').val());
    jQuery('#editform').submit();
  });

});

function confirm_delete(filename){
  var cd = confirm("Are you sure that you want to delete "+filename+"?");
  if (cd == true){
    var result = "odd";
    jQuery.ajax({
      type: 'post',
      url: 'deletefile.php',
      data: {name: filename},
      success: function(msg){
        result = msg;
      }
    });
 jQuery('#files').load('filelist.php');

  }
  else{
  }
}
