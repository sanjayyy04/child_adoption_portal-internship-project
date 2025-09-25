<h2>Add Child Profile</h2>
<form method="POST" action="pages/process_add_child.php" enctype="multipart/form-data">
    <label>Name:</label>
    <input type="text" name="name" required placeholder="Child's Name">

    <label>Age:</label>
    <input type="number" name="age" required placeholder="Age">

    <label>Gender:</label>
    <div class="radio-group">
        <label><input type="radio" name="gender" value="Male" required> Male</label>
        <label><input type="radio" name="gender" value="Female"> Female</label>
        <label><input type="radio" name="gender" value="Other"> Other</label>
    </div>

    <label>Health Status:</label>
    <textarea name="health_status" required placeholder="Health details"></textarea>

    <label>Photo:</label>
    <input type="file" name="photo" accept="image/*" required>

    <button type="submit">Add Profile</button>
</form>
