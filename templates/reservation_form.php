<!-- reservation_form.php -->

<div class="container">
    <h2>Make a Reservation</h2>
    <form action="process_reservation.php" method="post">
        <div class="form-group">
            <label for="restaurant">Choose a Restaurant:</label>
            <select name="restaurant" id="restaurant">
                <option value="restaurant1">Restaurant 1</option>
                <option value="restaurant2">Restaurant 2</option>
                <!-- Add more restaurant options here -->
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" name="time" id="time" required>
        </div>
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <button type="submit" name="submit_reservation">Submit Reservation</button>
    </form>
</div>
