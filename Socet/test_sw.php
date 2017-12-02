<!DOCTYPE html>
<html style="height: 100%">
<head>
    <meta charset="utf-8" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div id="text" onclick="cd()">
    DDDDDDDDDDDD
</div>

<script>

    ws.onopen = function() {

    };

    ws.onmessage = function(e) {
        $("#text").text(e.data);
    };

    function cd() {
        var d = "get";
        ws.send(d);
    }

</script>
</body>
</html>

