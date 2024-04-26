$('.btn').on('click', function(e) {
    if ($(this).hasClass('disable')) {
        e.preventDefault();
    }
});
// var node = document.getElementsByClassName('book-title')[0],

// str = node.textContent;
// // textContent = "Some sample text."
// if(str.length > 21) str = str.substring(0,21);

// console.log(str + "...");

// node.textContent = str + "...";