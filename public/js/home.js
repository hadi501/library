var page = 0;
var loading = false;
var url;
var value = document.getElementById("search").value;

function loadMoreData() {
    if (!loading) {
        loading = true;
        page++;

        if(value){
            url = "/?page=" + page + "&search=" + value;
        }else{
            url = "/?page=" + page;
        }

        $.ajax({
            url: url,
            method: "get",
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    data.forEach(function (item) {
                        // Buat elemen div dengan atribut yang sesuai
                        var content = $(
                            `
                            <div class="col-12 col-md-5 d-block border-bottom border-3">
                                
                                <div class="row mb-2">
                                    <div class="col col-xl-5 text-center col-image">
                                    <div class="position-relative">
                                        <img alt="book cover" class="img-fluid mx-auto book-cover" src="storage/public/book/${item.cover}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                                    </div>
                                    </div>
                                    <div class="col col-xl-7 pt-2 d-flex flex-column col-book">
                                    <div class="col">
                                        
                                        <h5 class="book-title detail" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom" data-cover="${item.cover}" data-id="${item.id}" data-title="${item.title}" data-author="${item.author}" data-editor="${item.editor}" data-publisher="${item.publisher}" data-category="${item.category}" data-year="${item.year}" data-type="${item.type}" data-status="${item.status}">${item.title}</h5>
                                        
                                        <h5 class="book-author">${item.author}</h5>
                                        <p class="book-year">${item.year}</p>
                                    </div>
                                    <div class="col d-flex align-items-end">
                                        <div>
                                        <p class="fw-bold mb-0">Kategori</p>
                                        <p class="category">${item.category}</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            `
                        );
                        // Tambahkan elemen ke kontainer
                        $("#main-content").append(content);
                    });
                    loading = false;
                } else {
                    $("#load-more").hide(); // Sembunyikan tombol jika tidak ada data lagi
                }
            },
        });
    }
}

$(document).ready(function () {
    loadMoreData();

    $("#load-more").click(function () {
        loadMoreData();
    });

    // Deteksi scroll ke akhir halaman dan muat data tambahan
    $(window).scroll(function () {
        if (
            $(window).scrollTop() + $(window).height() >=
            $(document).height() - 100
        ) {
            loadMoreData();
        }
    });
});
