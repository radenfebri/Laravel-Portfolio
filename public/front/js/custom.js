$(document).ready(function() {

    $('.addToCartBtn').click(function(e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function(response) {
<<<<<<< HEAD
                swal("", response.status, "success");
=======
                // toast(response.status);
                // toast('Data Berhasil Ditambahkan', 'success');
>>>>>>> b6a85d9cf5db9a5854b13ae3f3e6805a5bb38b3e
            }
        });
    });


    $('.increment-btn').click(function(e) {
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });


    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.delete-cart-item').click(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },
<<<<<<< HEAD
            success: function (response) {
                window.location.reload();
                swal("", response.status, "success");
=======
            success: function(response) {
                // swal("", response.status, "success");
                window.location.reload();
                // toast('Data Berhasil Dihapus', 'success')
>>>>>>> b6a85d9cf5db9a5854b13ae3f3e6805a5bb38b3e
            }
        });
    });


    $('.changeQuantity').click(function(e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id': prod_id,
            'prod_qty': qty,
        }
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function(response) {
                window.location.reload();
            }
        });
    });

});