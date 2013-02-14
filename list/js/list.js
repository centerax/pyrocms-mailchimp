(function($) {
  function newListen(elem) {
    $(elem).on('click', '.add', addItem);
    $(elem).on('click', '.remove', removeItem);
    $(elem).on('keypress', 'textarea', textareaListen);
  }
  function removeItem() {
    $(this).parent().remove();
  }
  function addItem(elem) {
    var parent = $(this).parents('.list_field');
    var count = $(parent).find('li').length;
    // is it a button add or enter key from textarea
    var textarea = ($.isWindow(this)) ? elem : $(this).siblings('textarea');
    if ($(textarea).val() !== '') {
      var str = '<li><textarea type="text" name="'+$(parent).attr('id')+'['+count+']" class="item_input"></textarea><div class="btn gray add">+</div><div class="btn gray remove">-</div></li>';
      $(parent).append(str);
      newListen($(parent).find('li').last());
    } else {
      alert('No value.');
    }
  }
  function textareaListen(e) {
    var code = (e.keyCode ? e.keyCode : e.which);
    var parent = $(this).parents('.list_field');
    if(code === 13) {
      e.preventDefault();
      if ($(this).val() !== '') {
        addItem(this);
        $(parent).find('li').last().find('textarea').focus();
      } else {
        alert('No value.');
      }
      return false;
    }
  }
  function listeners() {
    $('.list_field').each(function() {
      $(this).find('li').on('click', '.add', addItem);
      $(this).find('li').on('click', '.remove', removeItem);
      $(this).find('li').on('keypress', 'textarea', textareaListen);
   });
  }
  $(function(){
    // we need to know the input name
    listeners();
  });
})(jQuery);