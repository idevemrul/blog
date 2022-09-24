<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container" style="padding: 100px;">
        <form class="form-horizontal">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="product" id="product">
                        <option value=""> Select a Product</option>
                        <option value="oil">Oil</option>
                        <option value="milk">Milk</option>
                        <option value="onion">Onion</option>
                        <option value="cococola">Cococola</option>
                        <option value="sprite">Sprite</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="product_type" id="product_type">
                        <option value=""> Select Product Type</option>
                        <option value="grocary">Grocary</option>
                        <option value="drinks">Drinks</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3" style="margin-top: 30px;">
                <div class="col-md-3">
                    <input type="text" name="vat" id="vat" class="form-control" placeholder="Vat">
                </div>

                <div class="col-md-3">
                    <input type="text" name="total_price" id="total_price" class="form-control" placeholder="Total Price">
                </div>

                <div class="col-md-3">
                    <input type="text" name="paid_amount" id="paid_amount" class="form-control" placeholder="Paid Amount">
                </div>

                <div class="col-md-3">
                    <input type="text" name="return_amount" id="return_amount" class="form-control" placeholder="Return amount">
                </div>
            </div>



            <div class="row" style="margin-top:30px;">
                <div class="col-md-4">
                    <span id="add_item" class="btn btn-info">Add New Item</span>
                </div>
            </div>
            <div class="row" style="margin-top:50px;">
                <table class="table tbl-stripe">
                    <thead>
                        <tr class="bg-primary">
                            <td>SN</td>
                            <td>Product Name</td>
                            <td class="text-right"> Price</td>
                            <td>product type</td>
                            <td class="text-right">vat</td>
                            <td class="text-right">total price</td>
                            <td class="text-right"> action</td>
                        </tr>
                    </thead>
                    <tbody id="item-list">
                    </tbody>
                    <tfoot class="bg-primary">
                        <td colspan="5" class="text-right">Grand Total </td>
                        <td id="grand-total" class="text-right">0.00</td>
                        <td></td>
                    </tfoot>
                </table>
            </div>

            <div class="row" style="margin-top:30px;">
                <div class="col-md-4">
                    <button type="submit" id="sale_now" class="btn btn-default" disabled>Sale Now</button>
                </div>
            </div>

        </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#product_type,#paid_amount').on('change', function() {
                let product = $('#product').val();
                let price = $('#price').val();
                let product_type = $('#product_type').val();

                // console.log(product);
                // console.log(price);
                // console.log(product_type);

                let vat = 0;
                if (product_type == 'grocary') {
                    vat = parseFloat((price * 5) / 100);
                } else if (product_type == 'drinks') {
                    vat = parseFloat((price * 10) / 100);
                }

                $('#vat').val(vat);

                let total_price = 0;
                total_price = parseFloat(parseFloat(price) + parseFloat(vat)).toFixed(2);
                // console.log(total_price);
                $('#total_price').val(total_price);
                // console.log(total_price);

                let paid_amount = $('#paid_amount').val();

                let return_amount = 0;
                return_amount = parseFloat(paid_amount) - parseFloat(total_price);
                // console.log(return_amount);

                if (return_amount <= 0) {
                    $('#return_amount').val(0);
                    if (paid_amount > 0 && return_amount == 0) {
                        $('#sale_now').removeAttr('disabled', 'disabled');
                    } else {
                        $('#sale_now').attr('disabled', 'disabled');
                    }
                } else if (return_amount > 0) {
                    $('#return_amount').val(return_amount);
                    $('#sale_now').removeAttr('disabled', 'disabled');
                }
            });

            // ----add item to item list-----------
            $('#add_item').on('click', function() {
                console.log('add item');
                var item = "";
                let product = $('#product').val();
                let price = $('#price').val();
                let product_type = $('#product_type').val();
                let vat = $('#vat').val();
                let total_price = $('#total_price').val();
                var tr = parseInt($('#item-list tr').length) + 1;

                item = "<tr>" +
                    "<td>" + tr + "</td>" +
                    "<td> " + product + "</td>" +
                    "<td class='text-right'> " + price + "</td>" +
                    "<td> " + product_type + " </td>" +
                    "<td class='text-right'> " + vat + " </td>" +
                    "<td class='text-right'>" + total_price + "</td>" +
                    "<td class='text-right'> <span class='btn btn-danger delete-item'>Delete</span></td>" +
                    "</tr>";
                $('#item-list').append(item);
                item = "";
            });

            // ---delete item from list --------
            $('#item-list').on('click', '.delete-item', function() {
                $(this).closest('tr').remove();
                console.log('deleted');
            });

        });
    </script>

</body>

</html>