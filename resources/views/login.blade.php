<html>

<head>
    <title>Create an Account</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Overpass+Mono" rel="stylesheet">

    <div id="wrapper">
        <div class="main-content">
            <div class="header">
                <img src="carwale.png" height="80px" />
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action='login-submit' method="post">
                @csrf
                <div class="l-part">
                    <input type="text" placeholder="Username" class="input-1" name="email"; />
                    <div class="overlap-text">
                        <input type="password" placeholder="Password" class="input-2" name="password" />
                        <a href="#">Forgot?</a>
                    </div>
                    <input type="submit" value="Log in" class="btn" />
                </div>
            </form>
        </div>
        <div class="sub-content">
            <div class="s-part">
                Do not have an account? <a href="register">Sign up</a>
            </div>
        </div>
</body>

</html>
