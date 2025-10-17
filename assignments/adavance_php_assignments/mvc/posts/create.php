<?php include '../header.php'; ?>
<h2>Create New Post</h2>

<form method="POST" action="index.php?action=store">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Content:</label><br>
    <textarea name="content" rows="6" required></textarea><br><br>

    <button type="submit">Save Post</button>
</form>
<?php include '../footer.php'; ?>
