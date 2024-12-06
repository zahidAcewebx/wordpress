

<div class="login-form-container">
    <h2>Login</h2>
    <form method="post" action="">
        <?php if (isset($error_message)) : ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" name="login_submit" value="Login">
    </form>
</div>
