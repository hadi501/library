$(".btn").on("click", function (e) {
    if ($(this).hasClass("disable")) {
        e.preventDefault();
    }
});

function deleteData(id, url){
    const formDelete = document.querySelector('#form-delete');

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            formDelete.setAttribute('action', `/` + url + `/` + id);
            formDelete.submit();
            return;
        }
      });
};