<?php require 'header.php'; ?>

<main>
    <div class="userCreation">
        <h1>Create an account</h1>
        <form action="process_user_creation.php" method="post">
            <label for="username">User Name:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Sign up</button>
        </form>
    </div>
</main>

<!--SaulIM@example.com -->
<!--password10-->

<!--kevinjrm.kr@gmail.com-->
<!--password11-->

<?php require 'footer.php'; ?>