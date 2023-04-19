// test

function sendDataByAjax(currentItem) {
  jQuery(document).ready(function ($) {
    function iteration_array_display_items() {
      $.ajax({
        url: "http://" + window.location.hostname + "/wp-admin/admin-ajax.php",
        type: "POST",
        data: {
          action: "iteration_array_display_items",
          item: "test",
        },
        success: function (data) {
          $(".display-iteration").html(data);
        },
      });
    }

    iteration_array_display_items();
  });
}
