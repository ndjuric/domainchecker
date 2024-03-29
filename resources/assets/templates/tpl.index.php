<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Domain Checker</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
</head>

<body>

<div class="container">

    <form class="form-domaincheck">
        <h2 class="form-domaincheck-heading">Domain Checker</h2>
        <label for="domainName" class="sr-only">Domain name</label>
        <input type="text" id="domainName" class="form-control" placeholder="Domain Name (i.e. google.com)" required autofocus>

        <button class="btn btn-lg btn-primary btn-block" id="check" type="submit">Check Domain Availability</button>
        </div>
    </form>

    <div id="results"></div>

</div> <!-- /container -->

</body>
<script src="assets/js/check.js"></script>
</html>