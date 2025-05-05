<!DOCTYPE html>
<html>
<head>
    <title>Application Submitted</title>
</head>
<body>
    <h1>Your Application has been Submitted!</h1>
    <p>Dear {{ $application->user->name }},</p>
    <p>Your application has been submitted successfully.</p>
    
    <p>Thank you for your submission!</p>

    <h1 class="urdu-lbl" dir="rtl" style="text-align: right; ">آپ کی درخواست جمع کر دی گئی ہے!</h1>
<p class="urdu-lbl" dir="rtl" style="text-align: right; "> {{ $application->user->name }} محترم </p>
<p class="urdu-lbl" dir="rtl" style="text-align: right; ">آپ کی درخواست کامیابی کے ساتھ جمع ہو چکی ہے۔</p>

<p class="urdu-lbl" dir="rtl" style="text-align: right; ">آپ کی درخواست دینے کا شکریہ!</p>
</body>
</html>
