$(document).ready(function () {

  const category_form = document.getElementById('category-form')

  if (category_form) {

    /* VALIDATION */
    const category = document.getElementById('name')

    category.oninput = e => {
      e.target.value = e.target.value.replace(/[^а-яё]/ig, '')
    }

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
