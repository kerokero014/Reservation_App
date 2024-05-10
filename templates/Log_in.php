<?php include 'header.php'; ?>

<!-- Log_in.php -->

<main>
    <div class="loginCreation">
        <h2>Log in</h2>
        <form action="Log_in.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Log in</button>
        </form>
        <p>Don't have an account? <a href="Sign_up.php">Sign up</a></p>
    </div>
</main>

<?php include 'footer.php'; ?>