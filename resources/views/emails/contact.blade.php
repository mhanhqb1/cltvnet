<!DOCTYPE html>
<html>
<head>
    <title>Vytech.com.vn</title>
</head>
<body>
    <h1>Thông tin liên hệ</h1>
    <p>
        Tên: {{ $mailData['name'] }}
    </p>
    <p>
        Email: {{ $mailData['email'] }}
    </p>
    <p>
        Số điện thoại: {{ $mailData['phone'] }}
    </p>
    <p>
        Lời nhắn: {{ $mailData['message'] }}
    </p>
</body>
</html>
