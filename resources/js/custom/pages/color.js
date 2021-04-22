$(document).ready(function () {

  const color_form = document.getElementById('color-form')

  if (color_form) {

    /* DISPLAY UPLOAD FILE */
    const image = document.getElementById('image')
    const upload_file = document.getElementById('upload-file')

    image.onchange = e => {
      let i;

      if (e.target.value.lastIndexOf('\\')) {
        i = e.target.value.lastIndexOf('\\') + 1;
      }
      else {
        i = e.target.value.lastIndexOf('/') + 1;
      }

      upload_file.value = e.target.value.slice(i);

    }
  }
})