<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Mag - Video &amp; Magazine HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    @include("client.layout.style")

</head>

<body>

<!-- ##### Header Area Start ##### -->
@include("client.layout.header")
<!-- ##### Header Area End ##### -->

<!-- ##### Mag Posts Area Start ##### -->
@yield("content")
<!-- ##### Mag Posts Area End ##### -->

<!-- ##### Footer Area Start ##### -->
@include("client.layout.footer")
<!-- ##### Footer Area End ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
@include("client.layout.script")
</body>

</html>
