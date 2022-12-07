(function($) {

    $('.item-quantity').on('change', function(e) {

        $.ajax({
            url: "/cart/" + $(this).data('id'), //data-id
            method: 'put',
            data: {
                quantity: $(this).val(),
                _token: csrf_token
            }
        });
    });

    $('.remove-item').on('click', function(e) {

        let id = $(this).data('id');
        $.ajax({
            url: "/cart/" + id, //data-id
            method: 'delete',
            data: {
                _token: csrf_token
            },
            success: response => {
                $(`#${id}`).remove();
            }
        });
    });

    $('.add-to-cart').on('click', function(e) {

        $.ajax({
            url: "/cart",
            method: 'post',
            data: {
                product_id: $(this).data('id'),
                quantity: $(this).data('quantity'),
                _token: csrf_token
            },
            success: response => {
                alert('product added')
            }
        });
    });

})(jQuery);


// (function($) {
//     $('.item-quantity').on('change', funciton(e) {
//         $.ajax({
//             url: "/cart/"+$(this).data('id'),
//               method: 'PUT',
//             data: {
//                  quantity: $(this).val(),
//                  _token: csrf_token
//              }
//         })
//     });
// })(jQuery); // self invokaiton function (define and invoke)


// document.querySelector('.item-quantity').addEventListener('change', loadQuantity);
// var data_id = document.querySelector(".item-quantity").getAttribute('data-id');
// function loadQuantity() {
//     var xhr = new XMLHttpRequest();
//     xhr.open("PUT", '/cart/'+data_id, true);
//     xhr.onreadystatechange() = function () {
//         if(this.readyState == 4 && this.status == 200 ) {

//         }
//     }
//     xhr.send(loadQuantity);
// }
