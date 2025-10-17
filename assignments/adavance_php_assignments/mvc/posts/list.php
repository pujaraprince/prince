
<?php include '../header.php'; ?>
<h2 style="margin-left:50px;">All Posts</h2>

<?php /*while ($row = $posts->fetch(PDO::FETCH_ASSOC)): ?>

<div class="post">
    <h3><?= htmlspecialchars($row['title']); ?></h3>
    <p><?= nl2br(htmlspecialchars(substr($row['content'], 0, 150))); ?>...</p>
    <a href="index.php?action=show&id=<?= $row['id']; ?>">Read</a> |
    <a href="index.php?action=edit&id=<?= $row['id']; ?>">Edit</a> |
    <a href="index.php?action=delete&id=<?= $row['id']; ?>" onclick="return confirm('Delete this post?');">Delete</a>
</div>
<?php endwhile; */?>








<?php if ($posts->rowCount() > 0): ?>
  <div class="row">
    <?php while($row = $posts->fetch(PDO::FETCH_ASSOC)): ?>
      <div class="col-md-4 mb-3" style="margin-left:40px;">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
            <p class="card-text text-muted"><?= substr(htmlspecialchars($row['content']), 0, 150) ?>...</p>
            <a href="?action=show&id=<?= $row['id'] ?>" class="btn btn-outline-primary btn-sm">Read More</a>
            <a href="index.php?action=edit&id=<?= $row['id'] ?>" class="btn btn-outline-primary btn-sm">Edit</a>
             <a href="index.php?action=delete&id=<?= $row['id']; ?>" class="btn btn-outline-primary btn-sm" onclick="return confirm('Delete this post?');">Delete</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php else: ?>
  <div class="alert alert-info">No posts found.</div>
<?php endif; ?>

<?php include '../footer.php'; ?>

