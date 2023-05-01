// test

// function sendDataByAjax(currentItem) {
//   jQuery(document).ready(function ($) {
//     function iteration_array_display_items() {
//       $.ajax({
//         url: "http://" + window.location.hostname + "/wp-admin/admin-ajax.php",
//         type: "POST",
//         data: {
//           action: "iteration_array_display_items",
//           item: "test",
//         },
//         success: function (data) {
//           $(".display-iteration").html(data);
//         },
//       });
//     }
//
//     iteration_array_display_items();
//   });
// }

addEventListener("DOMContentLoaded", function (){
const tipButtons = document.querySelectorAll(".nfe_newsletter_form_tip");
  tipButtons.forEach(tipBtn=>{
    tipBtn.addEventListener("click", (tipButton=>{
      tipBtn.closest(".nfe_newsletter_form__item").classList.toggle("nfe_newsletter_form__item--tip");
    }));
  });

});
