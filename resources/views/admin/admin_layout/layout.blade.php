<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
    <style>
        .auth-logo

        {padding-left: 20px ;
            padding-right: 10px;
        }
    </style>
    <title>ContactHealth</title>
    <link rel="icon" href="{{elixir('medipro/logo4.png')}}" type="image/gif" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link id="gull-theme" rel="stylesheet" href="{{elixir('assets/styles/css/themes/lite-purple.min.css')}}">
    <link rel="stylesheet" href="{{elixir('assets/styles/vendor/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{elixir('assets/styles/vendor/datatables.min.css')}}">
    <link rel="stylesheet" href="http://gull-html-laravel.ui-lib.com/assets/styles/vendor/pickadate/classic.css">
    <link rel="stylesheet" href="http://gull-html-laravel.ui-lib.com/assets/styles/vendor/pickadate/classic.date.css">

</head>
{{--<div class="field_wrapper">--}}
{{--    <div>--}}
{{--        <input type="text" name="field_name[]" value=""/>--}}
{{--        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="add-icon.png"/></a>--}}
{{--    </div>--}}
{{--</div>--}}

<body class="text-left">

<!-- Pre Loader Strat  -->
{{--<div class='loadscreen' id="preloader">--}}

{{--    <div class="loader spinner-bubble spinner-bubble-primary">--}}


{{--    </div>--}}
{{--</div>--}}
<!-- Pre Loader end  -->

@yield('admin_content');


<!-- ============ End Customizer ============= -->

<!-- ============ Large Sidebar Layout End ============= -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{elixir('assets/js/common-bundle-script.js')}}"></script>
<script src="{{elixir('assets/js/vendor/echarts.min.js')}}"></script>
<script src="{{elixir('assets/js/es5/echart.options.min.js')}}"></script>
<script src="{{elixir('assets/js/es5/dashboard.v1.script.js')}}"></script>
<script src="{{elixir('assets/js/script.js')}}"></script>
<script src="{{elixir('assets/js/vendor/pickadate/picker.js')}}"></script>
<script src="{{elixir('assets/js/vendor/pickadate/picker.date.js')}}"></script>

<script src="{{elixir('assets/js/sidebar.large.script.js')}}"></script>

<script src="{{elixir('assets/js/form.basic.script.js')}}"></script>

<script src="{{elixir('assets/js/customizer.script.js')}}"></script>
<script src="{{elixir('assets/js/vendor/datatables.min.js')}}"></script>
<script src="{{elixir('assets/js/datatables.script.js')}}"></script>

<script>
    $(document).ready(function() {
        $("#icon").click(function(){
            $("#picker3").click();
            return false;
        });

    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>


<script>
     $(document).ready(function(){
        var i=0;
        var price,qty;
        $(".add").click(function(){
            i++;
            price="price"+i;
            qty="qty"+i


            $("#credit").append('<tr valign="top" id="del'+i+'"><td scope="row"><label class="text-center" for="no">'+i+'</label></td>' +
                '<td> <input type="text" class="form-control " id="product" name="product[]" value="" placeholder="Product" /> </td> ' +
                '<td> <input type="number" class="form-control " id="price'+i+'" name="price[]" value="" placeholder="Unit Price" oninput=total('+price+','+qty+','+i+') /> </td> ' +
                '<td><input type="number" class="form-control r" id="qty'+i+'" name="qty[]" value="" placeholder="Quantity" oninput=total('+price+','+qty+','+i+') /> </td> '+
                '<td><input disabled class="form-control" name="total[]" id="total'+i+'"> </td> '+
                '</tr>');

        });
        // $("#credit").on('click','.del',function(){
        //     alert(1);
        //     $(this).parent().parent().remove();
        // });

         $(".del").click(function(){
             $('#grand_total').val($('#grand_total').val()-$('#total'+i).val());
             $('#del'+i).remove();
             i--;



         });





    });

</script>

<script>
    function total(price,qty,loc) {
        var sum=0;
        document.getElementById('total'+loc).value=price.value * qty.value;
            for(i=1;i<=loc;i++){
                sum=sum+ parseInt(document.getElementById('total'+i).value);
            }

        document.getElementById('grand_total').value=sum;

    }
</script>


</body>

</html>

