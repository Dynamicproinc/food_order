<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ažuriranje Bodova</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 30px auto;
      background-color: #ffffff;
      border-radius: 6px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    h2 {
      color: #333333;
      font-size: 20px;
    }
    p {
      color: #555555;
      font-size: 16px;
      line-height: 1.5;
    }
    .points {
      font-weight: bold;
      color: #2E8B57;
    }
    .footer {
      font-size: 12px;
      color: #888888;
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Ažuriranje Bodova</h2>
    <p>Pozdrav {{ $email_data['user_name']}},</p>
    <p>Hvala vam na nedavnoj transakciji. Zaradili ste <span class="points">{{ $email_data['point']}}</span> bodova.</p>
    <p>Vaše trenutno stanje bodova je <span class="points">{{ $email_data['balance']}}</span>.</p>
    <p>Hvala što ste naš cijenjeni korisnik.</p>
    <div class="footer">
      &copy; M Brothers Food
    </div>
  </div>
</body>
</html>
