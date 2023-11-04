// open delete popup
const popupDeletes = document.querySelectorAll(".confirm-delete-popup");

function confirmDelete() {
  popupDeletes.forEach((popupDelete) => {
     popupDelete.classList.toggle("open-delete-popup")});
};

function closeDeletePopup() {
  popupDeletes.forEach((popupDelete) => { popupDelete.classList.remove("open-delete-popup")});
};

const popupDeleteOutput = document.querySelectorAll(".confirm-delete-output-popup");

function confirmDeleteOutput() {
  popupDeleteOutput.classList.toggle("open-delete-output-popup");
};

function closeDeleteOutput() {
  popupDeleteOutput.classList.remove("open-delete-output-popup");
};