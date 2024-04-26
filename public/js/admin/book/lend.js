$("#lend-book-table").DataTable({
    responsive: true,
});

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

function coba(){
    let tes = 0;

    if(tes != 0){
        alert("NIM/Kode Buku Tidak Sesuai!");
        return false;
    }
}

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

function next_animation() {

    if(coba() == false){
        return false;
    }
    
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
                // previous_fs.css({
                //     'position': 'absolute'
                // });
                //as the opacity of current_fs reduces to 0 - stored in "now"
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

// $("#next").click(function () {
//     next_animation;
// });
// $("#previous").click(function () {
//     previous_animation;
// });

document.getElementById("next").addEventListener("click", next_animation);
document.getElementById("previous").addEventListener("click", previous_animation);


$(".submit").click(function () {
    Swal.fire(
        'Alhamdulillah :D',
        'Buku Berhasil Dipinjam!',
        'success'
    ).then(function(){ 
        location.reload();
        }
    );
});

function addNew() {
    if($('#book-div').get(0).childElementCount == 5){
        // alert("Batas peminjaman dalam seminggu adalah 5 Buku");
        Swal.fire(
            'Error!',
            'Maksimal 5 Buku',
            'error'
          )
        return false;
    }

    var newContent = document.createElement('input');
    newContent.setAttribute('type', 'number');
    newContent.setAttribute('name', 'bookid');
    newContent.setAttribute('placeholder', 'Book ID');
    
    document.getElementById('book-div').appendChild(newContent);
}
  
function removeLastElem() {
    if($('#book-div').get(0).childElementCount == 1){
        return false;
    }
    document.getElementById('book-div').lastChild.remove();
}
