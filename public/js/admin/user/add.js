function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
        const size =  (fileInput.files[0].size / 1024 / 1024).toFixed(2);
         
        if (size > 1) {
            Swal.fire("Ups!", "Ukuran gambar tidak boleh lebih dari 1 Mb", "info");
        } else {
            reader.onload = function(e) {
                selectedImage.src = e.target.result;
            };
    
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

const form = document.getElementById("form-add-user");
form.addEventListener('invalid', function(e) {
    if (e.target.name == 'picture'){
        Swal.fire("Error!", "Gambar tidak boleh kosong!", "error");
    }
}, true);