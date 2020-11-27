jQuery(document).ready(function ($) {
    function icon_upload(button_selector) {
      var _custom_media = true,
          _orig_send_attachment = wp.media.editor.send.attachment;
      $('body').on('click', button_selector, function () {
        var button_id = $(this).attr('id');
        wp.media.editor.send.attachment = function (props, icon) {
          if (_custom_media) {
            $('.' + button_id + '_ico').attr('src', icon.url);
            $('.' + button_id + '_uri').val(icon.url);
          } else {
            return _orig_send_attachment.apply($('#' + button_id), [props, icon]);
          }
        }
        wp.media.editor.open($('#' + button_id));
        return false;
      });     
    }
    icon_upload('.js_custom_upload_icon');
    
  });


