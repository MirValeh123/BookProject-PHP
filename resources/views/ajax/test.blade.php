<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <input name="ad" type="text" id="name" placeholder="Adiniz">
    <button type="submit" id="gonder" >Gonder</button>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#gonder').click(function () { 
            $.ajax({
                type: "POST",
                url: "{{route('ajax.post')}}",
                headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
                // data: "data",
                // dataType: "dataType",
                success: function (response) {
                    console.log(response);
                }
            });
        });
    })
</script>
</html>