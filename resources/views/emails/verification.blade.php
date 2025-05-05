<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-size: 14px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 1px solid #eaeaea;
        }
        .header h1 {
            margin: 0;
            color: #333;
        }
        .body {
            padding: 20px;
        }
        .body p {
            line-height: 1.6;
            color: #555;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #007BFF;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #eaeaea;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Email Verification</h1>
        </div>
        <div class="body">
            <p>Thank you for registering with <strong>APNI ZAMEEN APNA GHAR (AZAG)</strong>. To complete your registration, please verify your email address by clicking the button below:</p>
            <a href="{{ $url }}" style="color:white;" class="button">Verify Email</a>
            <p>If you did not sign up for this account, please ignore this email.</p>
            <p>Regards</p> <br>
            <p><strong>APNI ZAMEEN APNA GHAR (AZAG) </strong></p>
            <p class="urdu-lbl" style="text-align: right;" dir="rtl">
                آپ کا <strong>اپنی زمین اپنا گھر</strong> میں رجسٹر ہونے کا شکریہ۔ اپنی رجسٹریشن مکمل کرنے کے لیے، براہ کرم نیچے دیے گئے بٹن پر کلک کرکے اپنے ای میل ایڈریس کی تصدیق کریں
            </p>

    
            <a href="{{ $url }}" style="color:white;" class="button">ای میل کی تصدیق کریں</a>
            <p class="urdu-lbl" style="text-align: right;" dir="rtl">اگر آپ نے اس اکاؤنٹ کے لیے سائن اپ نہیں کیا، تو براہ کرم اس ای میل کو نظر انداز کر دیں۔</p>
            <p class="urdu-lbl" style="text-align: right;" dir="rtl">
                نیک تمنائیں،<br>
                <strong>اپنی زمین اپنا گھر</strong>
            </p>

        </div>
        <div class="footer">
            <p>&copy; 2025 AZAG. All rights reserved.</p>
        </div>
    </div>
</body>
</html>