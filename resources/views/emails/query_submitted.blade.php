<!DOCTYPE html>
<html>
<head>
    <title>New Query Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
        }
        .header {
            background: linear-gradient(90deg, #1e3a8a, #3b82f6);
            color: #ffffff;
            padding: 15px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Query Submission</h1>
        </div>
        <div class="content">
            <p><strong>Name:</strong> {{ $data['name'] }}</p>
            <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
            <p><strong>Query:</strong></p>
            <p>{{ $data['query'] }}</p>
            <p>Thank you for using ArtHaat!</p>
        </div>
    </div>
</body>
</html>