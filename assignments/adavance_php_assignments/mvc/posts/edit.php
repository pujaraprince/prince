<?php include '../header.php'; ?>
<h2>Edit Post</h2>
<form method="POST" action="index.php?action=update&id=<?= $post['id']; ?>">
    <label>Title:</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($post['title']); ?>" required><br><br>

    <label>Content:</label><br>
    <textarea name="content" rows="6" required><?= htmlspecialchars($post['content']); ?></textarea><br><br>

    <button type="submit">Update Post</button>
</form>
<?php include '../footer.php'; ?>
