function letDataAnominous() {
  const allDataInputs = document.querySelectorAll(
    "#subscriber-data .inside input[type=text], #subscriber-data .inside input[type=tel]"
  );
  const mailDataInputs = document.querySelectorAll(
    "#subscriber-data .inside input[type=email]"
  );

  allDataInputs.forEach((input) => {
    input.value = "anonim";
  });
  mailDataInputs.forEach((input) => {
    input.value = "anonim@anonim.com";
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const exportButtonShowLink = document.querySelectorAll(
    ".nfes-export-button-show-link"
  );
  exportButtonShowLink.forEach((exportBtn) => {
    exportBtn.addEventListener("click", () => {
      exportBtn
        .closest(".nfes__admin-row")
        .classList.toggle("nfes__admin-row--show-links");
    });
  });
});
