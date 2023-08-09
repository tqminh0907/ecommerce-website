<div class="container">
    <h2 class="py-2">SIGN UP</h2>
    <form method="post" action="index.php">
        <input type="hidden" name="controller" value="account">
        
        <div class="mb-3">
            <label class="form-label fw-bold">Email</label>
            <input type="email" name="user_email" class="form-control" aria-describedby="emailHelp" placeholder="name@example.com">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Password</label>
            <input type="password" name="user_pass" class="form-control" aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Name</label>
            <input type="text" name="user_name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label fw-bold">Phone</label>
            <input type="tel" name="user_phone" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Address</label>
            <input type="text" name="user_address" class="form-control">
        </div>

        <input type="hidden" name="controller" value="account">

        <button type="submit" name="click" value="signup" class="btn btn-primary">Sign up</button>
        
    </form>
</div>