<?php
    // require the middleware for mentainance
    require __DIR__.'/../../../middleware/metainance.php';
?>
<section class="container d-grid vh-100" style="place-items: center;">
    <!-- form -->
    <form class="w-100 p-5 border rounded shadow" id="SignUpForm" style="max-width: 600px;">
        <h3>Sign Up</h3>
        <hr>
        <!-- name -->
        <input type="text" name="name" id="name" placeholder="Name" class="form-control mb-3" required>
        
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
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            // show password
            document.getElementById('ShowPassword').onchange = function(e){
                
                const pass = document.getElementById('password');

                if(e.target.checked){
                    pass.type = 'text';
                }else{
                    pass.type = 'password';
                }
            };

            // onsubmit form
            document.getElementById('SignUpForm').onsubmit = function(e){
                e.preventDefault();
                
                const form = new FormData(e.target);
                const url = './controller/auth/sign-up.php';
                fetch(url, {
                    method: 'POST',
                    body: form
                })
                .then(response => response.json())
                .then(response => {
                    if(response.success){
                        alertify.set('notifier','position', 'top-left');
                        alertify.success(response.success);
                    }
                    else if(response.error){
                        throw new Error(response.error);
                    }else{
                        throw new Error("Unexpected Error: " + response);
                    }
                })
                .catch(error => {
                    console.error(error.message);
                    alertify.set('notifier','position', 'top-left');
                    alertify.error(error.message);
                });
            };
        });
    </script>
</section>