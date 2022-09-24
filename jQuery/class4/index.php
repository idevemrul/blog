<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            background-color: white;
        }
    </style>

    <head>
        <style>
            .descendants * {
                display: block;
                border: 2px solid lightgrey;
                color: lightgrey;
                padding: 5px;
                margin: 15px;
            }
        </style>
    </head>

<body>

    <div class="descendants" style="width:500px;">div (current element)
        <p class="first">p (child)
            <span>span (grandchild)</span>
        </p>
        <p class="second">p (child)
            <span>span (grandchild)</span>
        </p>



    </div>

    <ul>
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li id="li5">5</li>
        <li>6</li>
        <li>7</li>
        <li>8</li>
        <li>9</li>
        <li>10</li>
    </ul>



    <!-- ----javascript start -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#para').hide();

            $('#btn-1').click(function() {
                $(this).parentsUntil('#baseDiv').hide();
            });

            $('#btn-2').click(function() {
                $('#btn-1').parent().show();
            });


            // $('#ul1').find('span').css({
            //     'color': 'red',
            // });



            $("div").find('span').css({
                "color": "red",
                "border": "2px solid red"
            });
            setTimeout(function() {
                $("div").find('span').hide(1000);
            }, 2000)


            $('#li5').prevUntil('li:nth-child(2)').css({
                'color': 'blue',
                'border-bottom': '5px solid red',
                'font-weight': 'bold'
            })



        });
    </script>
</body>

</html>