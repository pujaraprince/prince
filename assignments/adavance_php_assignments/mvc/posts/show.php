

<?php 
/*
include __DIR__ . '/../header.php'; ?>

<h2><?= htmlspecialchars($post['title']); ?></h2>
<p><?= nl2br(htmlspecialchars($post['content'])); ?></p>

<hr>
<h3>Comments</h3>

<form action="?action=addComment&id=<?= $post['id'] ?>" method="post">
    <input type="text" name="author" placeholder="Your Name" required><br><br>
    <textarea name="content" placeholder="Write your comment..." required></textarea><br>
    <button type="submit">Add Comment</button>
</form>

<hr>

<?php if ($comments->rowCount() > 0): ?>
    <ul>
        <?php while($c = $comments->fetch(PDO::FETCH_ASSOC)): ?>
            <li>
                <strong><?= htmlspecialchars($c['author']) ?>:</strong>
                <?= nl2br(htmlspecialchars($c['content'])) ?>
                <br>
                <a href="?action=editComment&cid=<?= $c['id'] ?>&id=<?= $post['id'] ?>">Edit</a> |
                <a href="?action=deleteComment&cid=<?= $c['id'] ?>&id=<?= $post['id'] ?>" onclick="return confirm('Delete this comment?')">Delete</a>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>No comments yet.</p>
<?php endif; ?>

<p><a href="../posts/">← Back to posts</a></p>

<?php include __DIR__ . '/../footer.php'; 
*/
?>

<?php include __DIR__ . '/../header.php'; ?>

<div class="card mb-4">
  <div class="card-body">
    <h2><?= htmlspecialchars($post['title']); ?></h2>
    <p class="text-muted"><?= nl2br(htmlspecialchars($post['content'])); ?></p>

    <a href="?action=edit&id=<?= $post['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="?action=delete&id=<?= $post['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this post?')">Delete</a>
    <a href="../posts/" class="btn btn-secondary btn-sm">Back</a>
  </div>
</div>

<div class="card mb-3">
  <div class="card-header bg-primary text-white">Add a Comment</div>
  <div class="card-body">
    <form action="?action=addComment&id=<?= $post['id'] ?>" method="post">
      <div class="mb-3">
        <input type="text" name="author" class="form-control" placeholder="Your Name" required>
      </div>
      <div class="mb-3">
        <textarea name="content" class="form-control" rows="3" placeholder="Write your comment..." required></textarea>
      </div>
      <button type="submit" class="btn btn-success">Add Comment</button>
    </form>
  </div>
</div>

<h4>Comments</h4>

<?php if ($comments->rowCount() > 0): ?>
  <?php while($c = $comments->fetch(PDO::FETCH_ASSOC)): ?>
    <div class="card mb-2">
      <div class="card-body">
        <strong><?= htmlspecialchars($c['author']) ?></strong>
        <p><?= nl2br(htmlspecialchars($c['content'])) ?></p>
        <a href="?action=editComment&cid=<?= $c['id'] ?>&id=<?= $post['id'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
        <a href="?action=deleteComment&cid=<?= $c['id'] ?>&id=<?= $post['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete comment?')">Delete</a>
      </div>
    </div>
  <?php endwhile; ?>
<?php else: ?>
  <div class="alert alert-secondary">No comments yet.</div>
<?php endif; ?>

<?php include __DIR__ . '/../footer.php'; ?>

