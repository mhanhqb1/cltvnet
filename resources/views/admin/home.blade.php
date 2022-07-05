<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <tr>
                        <td>
                            {{ Auth::guard('admin')->user()->name }}
                        </td>
                        <td>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('js-logoutForm').submit();">Logout</a>
                            <form action="{{ route('admin.logout') }}" method="POST" id="js-logoutForm">@csrf</form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
