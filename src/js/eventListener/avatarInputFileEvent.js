const avatarInputFileEvent = () => {
  document
    .getElementById("avatarUpload")
    .addEventListener("change", function (event) {
      const avatarPreview = document.getElementById("avatarPreview");
      const file = event.target.files[0];

      if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
          avatarPreview.src = e.target.result;
        };

        reader.readAsDataURL(file);
      }
    });
};
export default avatarInputFileEvent;
