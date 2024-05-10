<?php include 'header.php'; ?>

<?php require_once '../includes/functions.php'; ?>

<section class="calendar">
    <h2>Make a reservation:</h2>

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
        <input type="date" id="date" name="date">
        <button type="submit" class="check-availability-btn">Check Availability</button>
    </div>

    <!-- Display available timeslots here -->
    <select class="timeslots">
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

    <button type="submit" class="reserve-btn">Reserve</button>
</section>


<?php include 'footer.php'; ?>