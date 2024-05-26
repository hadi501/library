$(document).ready(function () {
    $("#lend-book-table").DataTable({
        responsive: true,
    });
    getData();
});

let books = [],
    users = [];

function getData() {
    var url_link = ["get-book", "get-user"];
    for (var i = 0; i < 2; i++) {
        $.ajax({
            url: url_link[i],
            indexValue: i,
            type: "GET",
            dataType: "json",
            success: function (data) {
                if (this.indexValue == 0) {
                    for (var j = 0; j < data.length; j++) {
                        books[j] = data[j];
                    }
                } else {
                    for (var k = 0; k < data.length; k++) {
                        users[k] = data[k];
                    }
                }
            },
        });
    }
}

document.querySelector(".container-fluid").innerHTML = `
<button type="button" id="sidebarCollapse" class="btn btn-primary">
    <i class="fa fa-bars"></i>
    <span class="sr-only">Toggle Menu</span>
</button>
<button type="button" class="btn btn-info"  data-toggle="modal" data-target="#exampleModalCenter">
    <i class="fa fa-plus"> Pinjam</i>
</button>
`;

$("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
});

// function coba() {
//     let tes = 1;

//     if (tes != 0) {
//         alert("NIM/Kode Buku Tidak Sesuai!");
//         return false;
//     }
// }

function userCheck() {
    var user_id = users.map(function (user) {
        return user["id"];
    });

    let nim = parseInt($("input[name=nim]").val());

    if (user_id.includes(nim) == false) {
        Swal.fire("Error!", "NIM " + nim + " tidak terdaftar", "error");
        return false;
    } else {
        let index = user_id.indexOf(nim);
        document.getElementById("borrower").innerHTML = users[index].username;
    }
}

function bookCheck() {
    var book_id = books.map(function (book) {
        return book["id"];
    });

    document.getElementById("book-total").innerHTML =
        $(".idbook").length;

    for (var i = 0; i < $(".idbook").length; i++) {
        
        let id = parseInt(
            document.querySelectorAll(".idbook")[i].value
        );

        if (book_id.includes(id) == false) {
            
            removeDetailLend();
            
            if(isNaN(parseInt(id))) {
                Swal.fire("Error!", "ID buku tidak boleh kosong", "error");
            } else{
                Swal.fire("Error!", "ID buku " + id + " tidak valid", "error");
            }
            
            return false;
        
        } else {
            let index = book_id.indexOf(id);

            var tr = document.createElement("tr");
            tr.setAttribute("id", "tr-" + i);
            document.getElementById("lend-detail").appendChild(tr);

            var td_id = document.createElement("td");
            var td_title = document.createElement("td");

            td_id.setAttribute("id", "id-" + i);
            td_title.setAttribute("id", "title-" + i);

            document.getElementById("tr-" + i).appendChild(td_id);
            document.getElementById("tr-" + i).appendChild(td_title);

            document.getElementById("id-" + i).innerHTML = books[index].id;
            document.getElementById("title-" + i).innerHTML =
                books[index].title;
        }
    }
}

function statusCheck(){

    var book_id = books.map(function (book) {
        return book["id"];
    });

    for (var i = 0; i < $(".idbook").length; i++) {
        let id = parseInt(document.querySelectorAll(".idbook")[i].value);
        let index = book_id.indexOf(id);
        
        if(books[index].type == 0){
            removeDetailLend();
            Swal.fire("Error!", "Buku " + books[index].title + " adalah Tipe R. Tidak dapat dipinjam", "error");
            return false;
        }

        if(books[index].status == 1){
            removeDetailLend();
            Swal.fire("Error!", "Status buku " + books[index].title + " masih dipinjam. Harap selesaikan dahulu peminjaman", "error");
            return false;
        }

        if(books[index].status == 2){
            removeDetailLend();
            Swal.fire("Error!", "Status buku " + books[index].title + " hilang. Jika ada, harap update data dahulu", "error");
            return false;
        }
    }

}


//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

function next_animation() {

    // userCheck();
    if (userCheck() == false) {
        return;
    }

    if (bookCheck() == false) {
        return;
    }

    if (statusCheck() == false) {
        return;
    }

    // bookCheck();

    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate(
        { opacity: 0 },
        {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = now * 50 + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;

                current_fs.css({
                    transform: "scale(" + scale + ")",
                    position: "absolute",
                });

                setInterval(function () {
                    current_fs.css({
                        transform: "scale(" + scale + ")",
                        position: "relative",
                    });
                }, 500);

                next_fs.css({ left: left, opacity: opacity });
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: "easeInOutBack",
        }
    );
}

function previous_animation() {

    removeDetailLend();

    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li")
        .eq($("fieldset").index(current_fs))
        .removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate(
        { opacity: 0 },
        {
            step: function (now, mx) {
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = (1 - now) * 50 + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({ left: left });
                current_fs.hide();
                previous_fs.css({
                    transform: "scale(" + scale + ")",
                    opacity: opacity,
                });
                setInterval(function () {
                    previous_fs.css({
                        position: "relative",
                    });
                }, 500);
            },
            duration: 800,
            complete: function () {
                // current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: "easeInOutBack",
        }
    );
}

document.getElementById("next").addEventListener("click", next_animation);
document
    .getElementById("previous")
    .addEventListener("click", previous_animation);

// $(".submit").click(function () {
//     Swal.fire("Alhamdulillah :D", "Buku Berhasil Dipinjam!", "success").then(
//         function () {
//             location.reload();
//         }
//     );
// });

function addNew() {
    if ($("#book-div").get(0).childElementCount == 5) {
        Swal.fire("Error!", "Maksimal 5 Buku", "error");
        return false;
    }

    var newContent = document.createElement("input");
    newContent.setAttribute("type", "number");
    newContent.setAttribute("class", "idbook");
    newContent.setAttribute("name", "bookid[]");
    newContent.setAttribute("placeholder", "Book ID");
    newContent.setAttribute("required", "true");

    document.getElementById("book-div").appendChild(newContent);
}

function removeLastElem() {
    if ($("#book-div").get(0).childElementCount == 1) {
        return false;
    }
    document.getElementById("book-div").lastChild.remove();
}

function removeDetailLend() {
    element_length = document.getElementById("lend-detail").childElementCount;

    for (var j = 0; j < element_length; j++) {
        document.getElementById("tr-" + j).remove();
    }
}


function updateData(id){
    const formDelete = document.querySelector('#form-update');

    Swal.fire({
        title: "Are you sure?",
        text: "Tambah durasi peminjaman 1 minggu?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, update it!"
      }).then((result) => {
        if (result.isConfirmed) {
            formDelete.setAttribute('action', `/lend/` + id);
            formDelete.submit();
            return;
        }
      });
};


function finishLend(id){
    const formDelete = document.querySelector('#form-delete');

    // Swal.fire({
    //     title: "Books returned?",
    //     text: "You won't be able to revert this!",
    //     icon: "warning",
    //     // showCancelButton: true,
    //     showDenyButton: true,
    //     confirmButtonColor: "#3085d6",
    //     denyButtonColor: "#d33",
    //     confirmButtonText: "Yes, returned!",
    //     denyButtonText: "Book Lost!"
    //   }).then((result) => {
    //     if (result.isConfirmed) {
    //         formDelete.setAttribute('action', `/lend/` + id);
    //         document.getElementById("status").value = "0";
    //         formDelete.submit();
    //         return;
    //     } else if (result.isDenied){
    //         formDelete.setAttribute('action', `/lend/` + id);
    //         formDelete.submit();
    //         return;
    //     }
    //   });

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-info",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
        title: "Books returned?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Returned!",
        cancelButtonText: "Book lost!",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
            formDelete.setAttribute('action', `/lend/` + id);
            document.getElementById("status").value = "0";
            formDelete.submit();
            return;
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
            formDelete.setAttribute('action', `/lend/` + id);
            formDelete.submit();
            return;
        }
      });
};