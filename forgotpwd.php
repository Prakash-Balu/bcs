<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Login Panel</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="logincss/style.css">
    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body>
    <section class="container">
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div class="forgotpwd">
            <form method="post" action="changepwd.php">
                <div class="row">
                    <div class="col-sm-6">
                        <label>New Password</label>
                        <div class="form-group pass_show">
                            <input type="password" name="new_pwd" value="" class="form-control" placeholder="New Password">
                        </div>
                        <label>Confirm Password</label>
                        <div class="form-group pass_show">
                            <input type="password" value="" class="form-control" name="cnfrm_pwd" placeholder="Confirm Password">
                        </div>
                        <div class="form-group pass_show">
                            <input type="submit" name="commit" value="Change Password" style="cursor:pointer">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>