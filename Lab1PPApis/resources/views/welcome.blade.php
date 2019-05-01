<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->
        <!-- Fonts -->
        <link rel="stylesheet" href="css/app.css">
        <!--link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                padding:15px;
            }
            
            .font-italic{
                font-size:9pt;
                margin: -14px 0px 0px 7px;
                
            }
            .align-self-center{
                font-size:15pt;   
            }
            form{
                margin-top:30px;
            }
        </style>
    </head>
    <body>
    <form>
    <label>Число прописью:</label>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class=" form-control"  autocomplete="off" id="numtoword" placeholder="your number"> 
            </div>
            <div class="form-group col-md-4">
                <a class="btn btn-outline-dark" id="href1" href="#" style="width:70px" role="button">Go</a>
            </div>    
        </div>
    <p id="href_display_1" class="font-italic"></p>
    </form>
    <form id="eqform"> 
        <label for="inputCity">Уравнение :</label> 
            <div class="d-flex flex-row"> 
            <div class="p-0 align-self-center" style="width: 60px;"> 
        <input type="text" class="form-control" autocomplete="off" id="eq_a" placeholder="a"> 
        </div> 
        <div class="align-self-center">X</div> 
        <div class="align-self-center">&sup2;</div> 
        <div class="align-self-center">+</div> 
        <div class="p-0 align-self-center" style="width: 60px;"> 
            <input type="text" class=" form-control" autocomplete="off" id="eq_b" placeholder="b"> 
        </div> 
        <div class="align-self-center">X+</div> 
        <div class="p-0 align-self-center" style="width: 60px;"> 
            <input type="text" class=" form-control" autocomplete="off" id="eq_c" placeholder="b"> 
        </div> 
        <div class="p-3 align-self-start" style="width: 60px;"> 
            <a class="btn btn-outline-dark" id="href2" href="#" style="width:70px" role="button">Go</a> 
        </div> 
        </div> 
        <p id="href_display_2" class="font-italic"></p> 
    </form>
    <form>
    <label>Дата:</label>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="date" class=" form-control"  autocomplete="off" id="datePicker" placeholder="date"> 
            </div>
            <div class="form-group col-md-4">
                <a class="btn btn-outline-dark" id="href3" href="#" style="width:70px" role="button">Go</a>
            </div>    
        </div>
    <p id="href_display_3" class="font-italic"></p>
    </form>
    <form>
    <label>Число Фибоначчи по номеру:</label>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class=" form-control"  autocomplete="off" id="fibonaci" placeholder="number"> 
            </div>
            <div class="form-group col-md-4">
                <a class="btn btn-outline-dark" id="href4" href="#" style="width:70px" role="button">Go</a>
            </div>    
        </div>
    <p id="href_display_4" class="font-italic"></p>
    </form>
    <form>
    <label>Регион по коду:</label>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class=" form-control"  autocomplete="off" id="region" placeholder="region code"> 
            </div>
            <div class="form-group col-md-4">
                <a class="btn btn-outline-dark" id="href5" href="#" style="width:70px" role="button">Go</a>
            </div>    
        </div>
    <p id="href_display_5" class="font-italic"></p>
    </form>        
    <script>
        var href = [
             "{{URL::route('numToWords',[$number = ""])}}",
             "{{URL::route('quad')}}",
             "{{URL::route('date')}}",
             "{{URL::route('fibonacci',[$n = ""])}}",
             "{{URL::route('regions',[$code = ""])}}"   
            ];
        var delta_href = [
            href[0],
            href[1],
            href[2],
            href[3],
            href[4]
        ];
        var handlers = [
        function () {
            delta_href[0]=  href[0] + ($("#numtoword" ).val() == "" ? "" : "/" + $("#numtoword" ).val());
            $("#href_display_1").text(delta_href[0]);
            $("#href1").attr("href", delta_href[0]); 
        }, 
        function () { 
            var a = isEmpty($("#eq_a" ).val()) ? "" :$("#eq_a" ).val(); 
            var b = isEmpty($("#eq_b" ).val()) ? "" :$("#eq_b" ).val(); 
            var c = isEmpty($("#eq_c" ).val()) ? "" :$("#eq_c" ).val(); 
            delta_href[1] = href[1] + `?a=${a}&b=${b}&c=${c}`; 
            $("#href_display_2").text(delta_href[1]); 
            $("#href2").attr("href", delta_href[1]); 
        },
        function () {
            delta_href[2]=  href[2] + ($("#datePicker" ).val() == "" ? "" : "?date=" + $("#datePicker" ).val());
            $("#href_display_3").text(delta_href[2]);
            $("#href3").attr("href", delta_href[2]); 
        },
        function () {
            delta_href[3]=  href[3] + ($("#fibonaci" ).val() == "" ? "" : "/" + $("#fibonaci" ).val());
            $("#href_display_4").text(delta_href[3]);
            $("#href4").attr("href", delta_href[3]); 
        },
        function () {
            delta_href[4]=  href[4] + ($("#region" ).val() == "" ? "" : "/" + $("#region" ).val());
            $("#href_display_5").text(delta_href[4]);
            $("#href5").attr("href", delta_href[4]); 
        },
        ];

        $( document ).ready(changeHrefs);   
        $( "#numtoword" ).on('propertychange input',handlers[0]);
        $( "#eqform :input" ).on('propertychange input',handlers[1]);
        $( "#datePicker" ).on('propertychange input',handlers[2]);
        $( "#fibonaci" ).on('propertychange input',handlers[3]);
        $( "#region" ).on('propertychange input',handlers[4]);

        function isEmpty(variable){ 
        if (variable === undefined || variable === null) 
            return true; 
        else 
            return false; 
        }
        function changeHrefs(){
            for(i=0; i < handlers.length; i++)
                handlers[i]();
        }
    </script>
    </body>
</html>
