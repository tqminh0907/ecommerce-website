<div class="container">
    <h2 class="py-2">SIGN IN</h2>
    <form method="post" action="index.php">
        <input type="hidden" name="controller" value="account">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="user_email" class="form-control" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="user_pass" class="form-control" aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
        </div>
        <button type="submit" name="click" value="signin" class="btn btn-primary">Sign in</button>
    </form>
    <p>you don't have account ? <a href="index.php?controller=account&action=signup" class="link link-primary">sign up</a></p>
</div>
