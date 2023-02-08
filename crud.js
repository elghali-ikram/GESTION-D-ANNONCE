const fileInput = document.getElementById("fileInput");
const icon = document.getElementById("icon");
const previewImage = document.getElementById("previewImage");
fileInput.addEventListener("change", function() {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.addEventListener("load", function() {
      previewImage.style.display = "block";
      previewImage.setAttribute("src", this.result);
      icon.style.display = "none";
    });
    reader.readAsDataURL(file);
  } else {
    previewImage.style.display = "none";
    previewImage.setAttribute("src", "#");
    icon.style.display = "block";
  }
});
const fileInputs = document.getElementById("fileInputs");
const icons = document.getElementById("icons");
const previewImages = document.getElementById("previewImages");
fileInputs.addEventListener("change", function() {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.addEventListener("load", function() {
      previewImages.style.display = "block";
      previewImages.setAttribute("src", this.result);
      icons.style.display = "none";
    });
    reader.readAsDataURL(file);
  } else {
    previewImages.style.display = "none";
    previewImages.setAttribute("src", "#");
    icons.style.display = "block";
  }
});
const title = document.querySelector("#titleAdd");
const titleError = document.querySelector("#titleError");
const price = document.querySelector("#priceAdd");
const priceError = document.querySelector("#priceError");
const address = document.querySelector("#addressAdd");
const addressError = document.querySelector("#addressError");
const superficie = document.querySelector("#superficieAdd");
const superficieError = document.querySelector("#superficieError");
const type = document.querySelector("#typeAdd");
const typeError = document.querySelector("#typeError");
const ajouter = document.querySelector("#addBtn");

function isRegexValid(input, regEx, errorMsg) {
  let inputValue = input.value;
  if (regEx.test(inputValue) === true) return true;
  else document.getElementById(errorMsg).style.display = "block";
}

function isFormValid() {
  if (type.value == "Choisir") {
    document.querySelector("#typeError").style.display = "block";
  }
  if (
    isRegexValid(title,/^[a-z A-Z]{2,30}$/,"titleError") &&
    isRegexValid(price,/^(\d*([.,](?=\d{3}))?\d+)+((?!\2)[.,]\d\d)?$/,"priceError") &&
    isRegexValid(address,/[A-Za-z0-9'\.\-\s\,]/,"addressError") &&
    isRegexValid(superficie,/^\d*[1-9]\d*$/,"superficieError")&&
    type.value != "Choisir"
  )
    return true;
  else {
    isRegexValid(title,/^[a-z A-Z]{2,30}$/,"titleError");
    isRegexValid(price,/^(\d*([.,](?=\d{3}))?\d+)+((?!\2)[.,]\d\d)?$/,"priceError");
    isRegexValid(address,/[A-Za-z0-9'\.\-\s\,]/,"addressError");
    isRegexValid(superficie,/^\d*[1-9]\d*$/,"superficieError");
    return false;
  }
}
ajouter.addEventListener("click", function (e) {
  e.preventDefault();
  isFormValid();
  if(isFormValid() === true)
  document.querySelector('#myForm').submit();
});

