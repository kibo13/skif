$(document).ready(function () {

  // image-form
  const image_form = document.querySelector('.img-form');


  // if active image-form
  if (image_form != null) {

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
});
