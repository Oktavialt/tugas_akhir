<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
</head>
<body>
    <h1>Lupa Password</h1>
    <form action="<?php echo base_url('lupaPW/kirim'); ?>" method="post">
        <input type="text" name="username" placeholder="Masukkan Username" required>
        <input type="text" name="otp" placeholder="Masukkan Kode OTP" required>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>
