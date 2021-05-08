<!DOCTYPE HTML>
<html>

<head>
    <title>{{ env('APP_NAME') }}</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- Stylesheets -->
    <link href="{{ asset('login_asset/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('login_asset/css/style.css') }}" rel='stylesheet' type='text/css' />
    <!--// Stylesheets -->
    <!--fonts-->
    <link
        href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <!--//fonts-->
    <style>
        .text-danger{
            color: red
        }
    </style>
</head>

<body>
    <h1>Sistem Informasi<br>Pengolahan Tabungan<br>SDN 1 Penjangka</h1>

     <!-- Validation Errors -->
     <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
    <div class="w3ls-login box box--big">
        <!-- form starts here -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="agile-field-txt">
                <label><i class="fa fa-user" aria-hidden="true"></i> Username </label>
                <input type="text" name="username" placeholder="Enter User Name" required />
            </div>
            <div class="agile-field-txt">
                <label><i class="fa fa-unlock-alt" aria-hidden="true"></i> password </label>
                <input type="password" name="password" placeholder="Enter Password" required id="myInput" />
                <div class="agile_label">
                    <input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
                    <label class="check" for="check3">Show password</label>
                </div>
            </div>
            <!-- script for show password -->
            <script>
                function myFunction() {
					var x = document.getElementById("myInput");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
            </script>
            <!-- //end script -->
            <input type="submit" value="LOGIN">
        </form>
    </div>
    <!-- //form ends here -->
    <!--copyright-->
    <div class="copy-wthree">
        <p>© {{ date('Y') }} Spin Login Form . All Rights Reserved | Design by
            <a href="http://w3layouts.com/" target="_blank">W3layouts</a>
        </p>
    </div>
    <!--//copyright-->
</body>

</html>
