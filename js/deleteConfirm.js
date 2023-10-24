// open delete popup
const popupDeletes = document.querySelector(".confirm-delete-popup");

function confirmDelete() {
  popupDeletes.classList.toggle("open-delete-popup");
};

function closeDeletePopup() {
  popupDeletes.classList.remove("open-delete-popup");
};

const popupDeleteOutput = document.querySelector(".confirm-delete-output-popup");

function confirmDeleteOutput() {
  popupDeleteOutput.classList.toggle("open-delete-output-popup");
};

function closeDeleteOutput() {
  popupDeleteOutput.classList.remove("open-delete-output-popup");
};