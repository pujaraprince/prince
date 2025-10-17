<!DOCTYPE html>
<html>
<head>
    <title>User Management (MVC Demo)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4 text-primary">👤 User Management</h2>

    <form method="POST" class="card p-3 mb-4 shadow-sm">
        <div class="row">
            <div class="col-md-5">
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="col-md-5">
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
            <div class="col-md-2">
                <button type="submit" name="add" class="btn btn-success w-100">Add User</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($users)): $i=1; foreach ($users as $user): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= htmlspecialchars($user['name']); ?></td>
                <td><?= htmlspecialchars($user['email']); ?></td>
            </tr>
        <?php endforeach; else: ?>
            <tr><td colspan="3" class="text-center">No users found!</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
