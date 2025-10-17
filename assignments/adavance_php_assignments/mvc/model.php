<?php
class Model {
    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=localhost;dbname=advance_ass", "root", "");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /* ---------- POSTS ---------- */
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM posts ORDER BY id DESC");
        $stmt->execute();
        return $stmt;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $content) {
        $stmt = $this->conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
        return $stmt->execute([$title, $content]);
    }

    public function update($id, $title, $content) {
        $stmt = $this->conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
        return $stmt->execute([$title, $content, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM posts WHERE id=?");
        return $stmt->execute([$id]);
    }

    /* ---------- COMMENTS ---------- */
    public function getCommentsByPost($post_id) {
        $stmt = $this->conn->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY id DESC");
        $stmt->execute([$post_id]);
        return $stmt;
    }

    public function addComment($post_id, $author, $content) {
        $stmt = $this->conn->prepare("INSERT INTO comments (post_id, author, content) VALUES (?, ?, ?)");
        return $stmt->execute([$post_id, $author, $content]);
    }

    public function updateComment($id, $content) {
        $stmt = $this->conn->prepare("UPDATE comments SET content = ? WHERE id = ?");
        return $stmt->execute([$content, $id]);
    }

    public function deleteComment($id) {
        $stmt = $this->conn->prepare("DELETE FROM comments WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getCommentById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM comments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
