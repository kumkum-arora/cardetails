<html>

<head>
  
    <title>Create an Account</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Overpass+Mono" rel="stylesheet">

    <div id="wrapper">
        <div class="main-content">
            <div class="header">
                <img src="carwale.png"  height="80px"/>
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
            <form action='register-submit' method="post">
                @csrf
                <div class="l-part">
                    <input type="text" placeholder="Email" class="input-1" name="email" />
                    <input type="text" placeholder="Full Name" class="input-1" name="fullname" />
                    <input type="text" placeholder="Username" class="input-1" name="username" />
                    <div class="overlap-text">
                        <input type="password" placeholder="Password" class="input-2" name="password" />
                    </div>
                    <input type="submit" value="Sign up" class="btn" />
                </div>
            </form>
        </div>
        <div class="sub-content">
            <div class="s-part">
                Have An Account? <a href="login">Log in</a>
            </div>
        </div>
</body>

</html>
