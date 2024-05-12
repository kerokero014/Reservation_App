<?php
// Initialize session (if you're using sessions)
session_start();

// Include database connection and functions here
require_once 'includes/db_config.php';
require_once 'includes/functions.php';

$restaurants = get_restaurants();
$reservations = get_reservations();

// Include header template
include 'templates/header.php';
?>
<div class="container">

    <!--Hero section-->
    <div class="hero">
        <h1>Welcome to Restaurant Reservation System</h1>
        <p>Make reservations for your favorite restaurants.</p>
        <img src="./imgs/table__hero.jpg" alt="hero table image">
    </div>

    <!--Restaurant section-->

    <section class="restaurants__cards restaurants">
        <h2>Choose a restaurant:</h2>
        <?php foreach ($restaurants as $restaurant) : ?> <!-- Loop through the restaurants array obtained from mysql db-->
            <div class="Single__card">
                <h3><?php echo htmlspecialchars($restaurant['name']); ?></h3>
                <p><?php echo htmlspecialchars($restaurant['email']); ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <!--Reservation section-->
    <section class="reservations">
        <h3>Reservations:</h3>
        <div class="reservAll">
            <ul>
                <?php foreach ($reservations as $reservation) : ?> <!-- Loop through the reservations array obtained from mysql db-->
                    <li>
                        <h4>Reservation name: <?php echo htmlspecialchars($reservation['customer_name']); ?></h4>
                        <p>Date: <?php echo htmlspecialchars($reservation['date']); ?></p>
                        <p>Time: <?php echo htmlspecialchars($reservation['time']); ?></p>
                        <p>Guests: <?php echo htmlspecialchars($reservation['guests']); ?></p>
                        <p>Restaurant: <?php echo htmlspecialchars($reservation['restaurant_id']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</div>

<?php
//  This Includes footer template
include 'templates/footer.php';
?>