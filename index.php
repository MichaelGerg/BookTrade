<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>
function ajaxCall() {
    $.ajax({
        url: "data.php",
        success: (function (result) {
            $("#div1").html(result);
        })
    })
};
ajaxCall(); // To output when the page loads
setInterval(ajaxCall, (2 * 1000)); // x * 1000 to get it in seconds
</script>

</head>
<body>

<div id="div1">hey</div>
<form>
<input name="name" type="text" placeholder="hello">
<input type="submit" value="Send Message" onsubmit="ajaxCall()">
</form>

</body>
</div>

</body>
</html>
