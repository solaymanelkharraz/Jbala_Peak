<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
</head>
<body>
    <h2>You received a new message from Jbala Peak</h2>
    <p><strong>From Client:</strong> {{ $data['user_email'] }}</p>
    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
    <hr>
    <p><strong>Message:</strong></p>
    <p style="background-color: #f3f3f3; padding: 15px;">{{ $msg }}</p>
</body>
</html>