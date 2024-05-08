<?php
// Initialize session (if you're using sessions)
session_start();

// Include database connection and functions here
require_once 'includes/db_config.php';
require_once 'includes/functions.php';

$restaurants = get_restaurants();

// Check if the user is logged in or not (if you have user authentication)
// Include login/logout/register functionality here if needed

// Include header template
include 'templates/header.php';
?>

<!-- HTML content for the homepage -->
<div class="hero">
    <h1>Welcome to Restaurant Reservation System</h1>
    <p>Make reservations for your favorite restaurants.</p>
    <img src="./imgs/table__hero.jpg" alt="hero table image">
    <button>Get started</button>

</div>

<section class="restaurants__cards">
    <h2>Choose a restaurant:</h2>
    <?php foreach ($restaurants as $restaurant) : ?>
        <h3><?php echo htmlspecialchars($restaurant['name']); ?></h3>
    <?php endforeach; ?>
</section>

<section class="reservations">
    <h3>Your reservations:</h3>
    <ul>
        <li><a href="reservation.php?id=1">Reservation 1</a></li>
        <li><a href="reservation.php?id=2">Reservation 2</a></li>
        <li><a href="reservation.php?id=3">Reservation 3</a></li>
    </ul>
</section>

<section class="calendar">
    <!-- Calendar for selecting a date -->
    <input type="date" id="date" name="date">
    <button type="submit">Check availability</button>
    <!-- Display available timeslots here -->
    <ul>
        <li>12:00 PM</li>
        <li>1:00 PM</li>
        <li>2:00 PM</li>
        <!-- Add more timeslots here -->
    </ul>
    <button type="submit">Reserve</button>
</section>

<?php
// Include footer template
include 'templates/footer.php';
?>