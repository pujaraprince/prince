<?php include __DIR__ . '/../header.php'; ?>

<h3>Edit Comment</h3>
<form action="?action=updateComment&cid=<?= $comment['id'] ?>&id=<?= $_GET['id'] ?>" method="post">
    <textarea name="content" required><?= htmlspecialchars($comment['content']) ?></textarea><br>
    <button type="submit">Update Comment</button>
</form>

<p><a href="?action=show&id=<?= $_GET['id'] ?>">← Back</a></p>

<?php include __DIR__ . '/../footer.php'; ?>
