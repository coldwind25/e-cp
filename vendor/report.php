<?php
include_once "../assets/config.php";
session_start();
if (!isset($_SESSION['vendor'])):
    header("location: ../vendor_login.php");
endif;
echo "<script>console.log('Debug Objects: " . $_SESSION['vendor'] . "' );</script>";
?><!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>FoodStuff | online Dairy products available Here</title>
        <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
        <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
        <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
          <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
        <link  href="../css/datepicker.css" rel="stylesheet">
        <script src="../js/datepicker.js"></script>
        <style>
            .root {
                width: 100%;
            }
            select {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                display: block;
                padding: .5em;
                padding-right: 1.5em;
                width: auto;
                min-width: 200px;
                outline: none;
                font-family: sans-serif;
                font-size: 12pt;
                font-weight: 400;
                text-indent: 0.01px;
                text-overflow: '';
                border: 1px solid rgba(255,255,255,.7);
                border-radius: 2px;
                color: rgba(0,0,0,.7);
                background-color: rgba(255,255,255,.5);
                background-repeat: no-repeat;
                background-position: calc(100% - .5em) 50%;
                background-size: 12px;
                transition: all .2s ease-in-out;
                box-shadow: rgba(0,0,0,.15) 0 1px 0;

                color: rgba(255,255,255,.7);
                border-color: rgba(0,0,0,.7);
                background-color: rgba(0,0,0,.5);
                background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNiAxNiI+PHBvbHlnb24gZmlsbD0id2hpdGUiIG9wYWNpdHk9Ii43IiBwb2ludHM9IjAsNCAxNiw0IDgsMTIiLz48L3N2Zz4=');/* light arrow */

            }
            select::-ms-expand {
                display: none;
            }
            select:focus {
                border-color: orange;
                box-shadow: #fc0 0 0 3px;
            }

            .wrapper {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 24px;
            }

            .grid {
                width: 100%;
                display: grid;
                grid-template-columns: auto auto;
                grid-row-gap: 8px;
                margin-top: 24px;
            }

            .col {
                border: 1px solid #CCCCCC;
                padding: 10px;
            }

            .datepicker {
                width: 100%;
                height: 24px;
                border: 1px solid #C4C4C4;
                border-radius: 4px;
                padding: 6px 32px 6px 12px;
                font-size: 14px;
            }

            .bold {
                font-weight: 800;
                color: red;
            }

            .datepicker:focus {
                outline: none;
                box-shadow: none;
            }

            .datepicker:disabled {
                background: #EAEAEA;
                color: #808080;
            }

            .datepicker::placeholder {
                color: #C4C4C4;
            }
            .box-filter{
                display:flex;
                align-items:center;
                width: 100%;
            }
            .box-filter>div{
                flex:1;
            }
            .box-filter>div:first-child{
                text-align:left;
            }
            .input-select-date>input{
                display:none;
            }
            .input-select-date>input.active{
                display:initial;
            }
        </style>
        <script>
            var getEmail = "<?php echo $_SESSION['vendor']; ?>"

            $(document).ready(function () {
                $('[data-toggle="datepicker-day"]').datepicker({format: 'dd/MM/yyyy', autoHide: true});
                $('[data-toggle="datepicker-day"]').datepicker('setDate', new Date());
                $('[data-toggle="datepicker-month"]').datepicker({format: 'MM/yyyy', autoHide: true});
                $('[data-toggle="datepicker-month"]').datepicker('setDate', new Date());
                $('[data-toggle="datepicker-year"]').datepicker({format: 'yyyy', autoHide: true});
                $('[data-toggle="datepicker-year"]').datepicker('setDate', new Date());
                getData({email: getEmail, type: $("#select-type").val(), value: $(`[data-toggle="datepicker-${$("#select-type").val()}"]`).val()})
                $(".datepicker").on('change', (e) => {
                    getData({email: getEmail, type: $("#select-type").val(), value: e.target.value})

                })
                $("#select-type").on('change', (e) => {
                    getData({email: getEmail, type: $("#select-type").val(), value: $(`[data-toggle="datepicker-${$("#select-type").val()}"]`).val()})
                    if (e.target.value === 'year') {
                        $("#date-year").addClass('active')
                        $("#date-month").removeClass('active')
                        $("#date-day").removeClass('active')
                        $("#show-type").html("ปี")

                    }
                    if (e.target.value === 'month') {
                        $("#date-year").removeClass('active')
                        $("#date-month").addClass('active')
                        $("#date-day").removeClass('active')
                        $("#show-type").html("เดือน/ปี")

                    }
                    if (e.target.value === 'day') {
                        $("#date-year").removeClass('active')
                        $("#date-month").removeClass('active')
                        $("#date-day").addClass('active')
                        $("#show-type").html("วัน/เดือน/ปี")

                    }
                })
            });
            function getData( {email, value, type}) {
//                alert('get_data ' + email + ' ' + value + ' ' + type);
                let url = 'report_data.php';
                let data = {email: email, value: value, type: type};

                $.ajax({
                    type: 'POST',
                    url: url,
                    cache: false,
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response['sale_total'] != null) {
                            $("#total").html(response['sale_total'] + ' บาท');
                        } else {
                            $("#total").html('0' + ' บาท');
                        }

                    },
                }
                );
            }

        </script>
    </head>

    <body>
        <?php include"header.php" ?>

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3">
                    <?php include"include/side.php" ?>
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-8">
                            <blockquote class="blockquote"><h2 class="font-weight-bold h5 my-4">Manage products </h2></blockquote>
                        </div>
                    </div>

                    <div class='root'>
                        <div class='wrapper'>
                            <div class="box-filter">
                                <div class="select-type">
                                    <select id="select-type">
                                        <option value="year">ปี</option>
                                        <option value="month">เดือน/ปี</option>
                                        <option value="day">วัน/เดือน/ปี</option>

                                    </select>
                                </div>
                                <div class="input-select-date">
                                <!-- <input id="date-day" data-toggle="datepicker" class="datepicker"> -->
                                    <input id="date-day" data-toggle="datepicker-day" class="datepicker">
                                    <input id="date-month" data-toggle="datepicker-month" class="datepicker">
                                    <input id="date-year" data-toggle="datepicker-year" class="datepicker active">
                                </div>
                            </div>


                            <div class='grid'>
                                <div class='col' id="show-type">ปี</div>
                                <div class='col'>ยอดขาย</div>
                                <div class='col'>รวมยอดขาย</div>
                                <div class='col bold' id="total">0 บาท</div>
                                <!-- <div class='col'>{ moment(date).format('DD/MM/YYYY') }</div> -->
                                <!-- <div class='col'>20,000 บาท</div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <h1>
 รายงานแยกตามวัน
 <button class="btn btn-primary" onclick="window.print();">พิมพ์รายงาน</button>
  </h1>
    </body>
</html>
