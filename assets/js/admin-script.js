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
