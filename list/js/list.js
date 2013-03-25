(function($){
  $.fn.extend( {
    listfield: function( options ) {
      this.defaults = {};
      var settings = $.extend( {}, this.defaults, options );
      function makeTemplate(name) {
        return '<li><textarea type="text" name="'+name+'" class="item_input"></textarea><div class="btn gray add">+</div><div class="btn gray remove">-</div></li>';
      }
      function removeItem() {
        var $parent = $(this).parent().parent();
        if ($parent.children('li').length > 1) {
          // remove the li item
          $(this).parent().remove();
        }
      }
      function addItem(callback) {
        var $parent = $(this).parent().parent();
        var count = $parent.children('li').length;
        var newname = $parent.attr('id')+'['+count+']';
        var $previousTextarea = $(this).siblings('textarea');
        if ($previousTextarea.val() !== '') {
          var str = makeTemplate(newname);
          $parent.append(str);
        } else {
          alert('No Value');
          return false;
        }
      }
      function textareaEnter($parent, callback) {
        var count = $parent.children('li').length;
        var newname = $parent.attr('id')+'['+count+']';
        var str = makeTemplate(newname);
        $parent.append(str);
        if (callback && typeof(callback) === "function") {
          callback(newname);
        }
      }
      function textareaHandle(e) {
        var $parent = $(this).parent().parent();
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code === 13) {
          e.preventDefault();
          if ($(this).val() !== '') {
            var parent = $(this).parent().parent();
            textareaEnter(parent, function(name) {
              $('textarea[name="'+name+'"]')[0].focus();
            });
          } else {
            alert('No value.');
            return false;
          }
          return false;
        }
      }
      return this.each( function() {
        var $this = $(this);
        $this.on('click', '.add', addItem);
        $this.on('click', '.remove', removeItem);
        $this.on('keypress', 'textarea', textareaHandle);
      });
    }
  });
  $(function() {
    $('.list_field').listfield();
  });
})( jQuery );