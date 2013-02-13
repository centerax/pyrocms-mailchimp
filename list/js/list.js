(function($) {
  var inputname = '';
  function newListen(elem) {
    $(elem).on('click', '.add', addItem);
    $(elem).on('click', '.remove', removeItem);
    $(elem).on('keypress', 'textarea', textareaListen);
  }
  function removeItem() {
    $(this).parent().remove();
  }
  function addItem(elem) {
    var count = $('#list_field').find('li').length;
    // is it a button add or enter key from textarea
    var textarea = ($.isWindow(this)) ? elem : $(this).siblings('textarea');
    console.log($(textarea));
    if ($(textarea).val() !== '') {
      var str = '<li><textarea type="text" name="'+inputname+'['+count+']" class="item_input"></textarea><div class="btn gray add">+</div><div class="btn gray remove">-</div></li>';
      $('#list_field').append(str);
      newListen($('#list_field').find('li').last());
    } else {
      alert('No value.');
    }
  }
  function textareaListen(e) {
    var code = (e.keyCode ? e.keyCode : e.which);
    if(code === 13) {
      e.preventDefault();
      if ($(this).val() !== '') {
        addItem(this);
        $('#list_field').find('li').last().find('textarea').focus();
      } else {
        alert('No value.');
      }
      return false;
    }
  }
  function listeners() {
    $('#list_field').find('li').on('click', '.add', addItem);
    $('#list_field').find('li').on('click', '.remove', removeItem);
    $('#list_field').find('li').on('keypress', 'textarea', textareaListen);
  }
  $(function(){
    // we need to know the input name
    inputname = $($('#list_field').find('textarea')[0]).attr('name').slice(0, -3);
    listeners();
  });
})(jQuery);