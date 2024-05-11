<?php include 'header.php'; ?>

<?php require_once '../includes/functions.php'; ?>

<section class="calendar">
    <h2>Make a reservation:</h2>

    <!-- Form for making a reservation -->
    <form action="process_reservation.php" method="POST">
        <!-- Dropdown menu for selecting a restaurant -->
        <div class="restaurant-select">
            <label for="restaurant">Select a Restaurant:</label>
            <select id="restaurant" name="restaurant">
                <?php
                // Fetch all restaurants
                $restaurants = get_all_restaurants();

                // Loop through restaurants and create dropdown options
                foreach ($restaurants as $restaurant_id => $restaurant_name) {
                    echo "<option value='$restaurant_id'>$restaurant_name</option>";
                }
                ?>
            </select>
        </div>

        <!-- Calendar for selecting a date -->
        <div class="calendar-input">
            <label for="date">Select a Date:</label>
            <input type="date" id="date" name="date">
            <button type="submit" class="check-availability-btn">Check Availability</button>
        </div>

        <!-- Display available timeslots here -->
        <div class="timeslots">
            <label for="time">Select a Timeslot:</label>
            <select id="time" name="time">
                <option value="10:00 AM">10:00 AM</option>
                <option value="11:00 AM">11:00 AM</option>
                <option value="12:00 PM">12:00 PM</option>
                <option value="1:00 PM">1:00 PM</option>
                <option value="2:00 PM">2:00 PM</option>
                <!-- Add more timeslots here -->
                <?php
                for ($i = 3; $i <= 11; $i++) {
                    echo "<option value='{$i}:00 PM'>{$i}:00 PM</option>";
                }
                ?>
            </select>
        </div>
        <!-- Additional input fields (e.g., customer name, email, guests) -->
        <div class="form-group">
            <label for="customer_name">Your Name:</label>
            <input type="text" id="customer_name" name="customer_name" required>
        </div>
        <div class="form-group">
            <label for="customer_email">Your Email:</label>
            <input type="email" id="customer_email" name="customer_email" required>
        </div>
        <div class="form-group">
            <label for="guests">Number of Guests:</label>
            <input type="number" id="guests" name="guests" required>
        </div>
        <!-- Reserve button -->
        <button type="submit" class="reserve-btn">Reserve</button>
    </form>
</section>



<!-- Add a Restaurant -->

<h1 class="AddHere">Don't see your favorite restaurant? Add it here!</h1>
<section class="add-restaurant">

    <h2>Add a Restaurant:</h2>

    <form action="process_add_restaurant.php" method="post">
        <div class="form-group">
            <label for="restaurant_name">Restaurant Name:</label>
            <input type="text" id="restaurant_name" name="restaurant_name" required>
        </div>
        <div class="form-group">
            <label for="restaurant_location">Location:</label>
            <input type="text" id="restaurant_location" name="restaurant_location" required>
        </div>

        <div class="form-group">
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" required>
        </div>

        <div class="form-group">
            <label for="restaurant_email">Email:</label>
            <input type="email" id="restaurant_email" name="restaurant_email" required>
        </div>
        <button type="submit" name="submit">Add Restaurant</button>
    </form>
</section>


<?php include 'footer.php'; ?>