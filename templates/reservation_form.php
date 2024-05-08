<?php include 'header.php'; ?>



<section class="calendar">
    <h2>Make a reservation:</h2>
    <!-- Calendar for selecting a date -->
    <div class="calendar-input">
        <input type="date" id="date" name="date">
        <button type="submit" class="check-availability-btn">Check Availability</button>
    </div>

    <!-- Display available timeslots here -->
    <ul class="timeslots">
        <li>12:00 PM</li>
        <li>1:00 PM</li>
        <li>2:00 PM</li>
        <!-- Add more timeslots here -->
    </ul>

    <button type="submit" class="reserve-btn">Reserve</button>
</section>

<?php include 'footer.php'; ?>
