<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="/">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- build:css(client) app/vendor.css -->
    <!-- bower:css -->
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css({.tmp,client}) app/app.css -->
    <link rel="stylesheet" href="app/app.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.1/css/bootstrap-material-design.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/paper/bootstrap.min.css">
    <!-- injector:css -->
    <!-- endinjector -->
    <!-- endbuild -->
</head>
<body ng-app="resourcesApp">
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<div ui-view=""></div>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID -->


<!--[if lt IE 9]>
<script src="bower_components/es5-shim/es5-shim.js"></script>
<script src="bower_components/json3/lib/json3.min.js"></script>
<![endif]-->
<!-- build:js({client,node_modules}) app/vendor.js -->
<!-- bower:js -->
<!-- endbower -->
<!-- endbuild -->

<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/angular/angular.js"></script>
<script src="bower_components/angular-resource/angular-resource.js"></script>
<script src="bower_components/angular-cookies/angular-cookies.js"></script>
<script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
<script src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<script src="bower_components/lodash/dist/lodash.compat.js"></script>
<script src="bower_components/angular-ui-router/release/angular-ui-router.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="bower_components/bootbox.js/bootbox.js"></script>

<!-- endbower -->

<!-- endbuild -->


<!-- build:js({.tmp,client}) app/app.js -->
<script src="app.js"></script>

<!-- injector:js -->
<script src="app/user/user.js"></script>
<script src="app/user/user.controller.js"></script>
<script src="app/account/login/login.controller.js"></script>
<script src="app/account/settings/settings.controller.js"></script>
<script src="app/account/signup/signup.controller.js"></script>
<script src="app/admin/admin.controller.js"></script>
<script src="app/admin/admin.js"></script>

<script src="app/main/main.controller.js"></script>
<script src="app/main/main.js"></script>

<script src="components/auth/auth.service.js"></script>
<script src="components/auth/user.service.js"></script>
<script src="components/modal/modal.service.js"></script>
<script src="components/mongoose-error/mongoose-error.directive.js"></script>
<script src="components/navbar/navbar.controller.js"></script>
<script src="components/services.js"></script>
<!-- build:js({.tmp,client}) app/app.js -->
<script>
    base_url = '{{url('/')}}';
</script>

<!-- injector:js -->
<!-- endinjector -->
<!-- endbuild -->
</body>
</html>
