<h2>Add Adoption Inquiry</h2>
<form method="POST" action="pages/process_inquiry.php">
    <label>Adopter Name:</label>
    <input type="text" name="adopter_name" required>

    <label>Contact Info:</label>
    <input type="text" name="contact_info" required>

    <label>Preferred Child (optional):</label>
    <input type="text" name="preferred_child">

        <label>Preferred Child:</label>
        <select name="preferred_child">
        <option value="">-- Select Child --</option>
        <?php
        include('../includes/db.php');
             $result = $conn->query("SELECT * FROM children WHERE status='Available' ORDER BY name ASC");
        while($row = $result->fetch_assoc()) {
        echo "<option value='{$row['name']}'>{$row['name']} (Age: {$row['age']})</option>";
        }
  ?>
</select>


    <label>Appointment Date:</label>
    <input type="date" name="appointment_date" required>

    <label>Message (optional):</label>
    <textarea name="message"></textarea>

    <button type="submit">Submit Inquiry</button>
</form>
