<?php
include('../includes/db.php');

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $child = $conn->query("SELECT * FROM children WHERE id=$id")->fetch_assoc();
}
?>

<h2>Edit Child Profile</h2>
<form method="POST" action="pages/update_child.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $child['id']; ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $child['name']; ?>" required>

    <label>Age:</label>
    <input type="number" name="age" value="<?php echo $child['age']; ?>" required>

    <label>Gender:</label>
    <div class="radio-group">
        <label><input type="radio" name="gender" value="Male" <?php if ($child['gender']=='Male') echo 'checked'; ?>> Male</label>
        <label><input type="radio" name="gender" value="Female" <?php if ($child['gender']=='Female') echo 'checked'; ?>> Female</label>
        <label><input type="radio" name="gender" value="Other" <?php if ($child['gender']=='Other') echo 'checked'; ?>> Other</label>
    </div>

    <label>Health Status:</label>
    <textarea name="health_status" required><?php echo $child['health_status']; ?></textarea>

    <label>Photo (leave blank to keep current):</label>
    <input type="file" name="photo" accept="image/*">

    <button type="submit">Update Profile</button>
</form>
