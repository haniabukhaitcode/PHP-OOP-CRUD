<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="ajaxCall.js">

    </script>
    <script>
        $(document).ready(function() {
            $("#userName").keyup(function() {
                let name = $("#userName").val();
                //post takes 3 parameters path/state/data,status
                $.post("suggestions.php", {
                    suggestion: name
                }, function(data, status) {
                    $("#test").html(data);
                    console.log("name: " + status);
                });
            });
        });
    </script>
</head>

<body>
    <input id="userName" type="text" name="name">
    <p id="test"></p>

</body>

</html>