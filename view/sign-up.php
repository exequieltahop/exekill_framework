<section class="container d-grid vh-100" style="place-items: center;">
    <!-- form -->
    <form class="w-100 p-5 border rounded shadow" style="max-width: 600px;">
        <h3>Sign Up</h3>
        <hr>

        <!-- username -->
        <input type="email" id="email" name="email" placeholder="Username" class="form-control mb-3" autocomplete="email" required>
        
        <!-- password -->
        <input type="password" id="password" name="password" class="form-control mb-3" placeholder="Password" autocomplete="current-password" minlength="8" required>

        <!-- show password -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center gap-2">
                <input type="checkbox" id="ShowPassword">
                <label for="ShowPassword" style="font-size: 0.9rem;">Show Password</label>
            </div>
            <a href="./" style="font-size: 0.9rem;">Sign In</a>
        </div>

        <!-- button submit -->
        <button class="btn btn-primary w-100" type="submit">Register</button>
    </form>

    <!-- script -->
    <?php 
        require __DIR__.'/../service-provider/script/ShowPassword.php';
    ?>
</section>