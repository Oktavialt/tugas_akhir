<!DOCTYPE html>
<html>
<head>
    <title>OTP Form</title>
</head>
<body>
    <h1>OTP Form</h1>
    <form action="<?php echo base_url('otp/send_otp'); ?>" method="post">
        <input type="text" name="nomor_telepon" placeholder="Masukkan Nomor Telepon Anda" required>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>
