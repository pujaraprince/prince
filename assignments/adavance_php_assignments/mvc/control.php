<?php
require_once __DIR__ . '/model.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

class PostControl {
    private $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? 'index';
        $id = $_GET['id'] ?? null;
        $cid = $_GET['cid'] ?? null;

        switch ($action) {
            /* --- Post actions --- */
            case 'create':
                $this->create();
                break;
            case 'store':
                $this->store();
                break;
            case 'show':
                $this->show($id);
                break;
            case 'edit':
                $this->edit($id);
                break;
            case 'update':
                $this->update($id);
                break;
            case 'delete':
                $this->delete($id);
                break;

            /* --- Comment actions --- */
            case 'addComment':
                $this->addComment($id);
                break;
            case 'editComment':
                $this->editComment($cid, $id);
                break;
            case 'updateComment':
                $this->updateComment($cid, $id);
                break;
            case 'deleteComment':
                $this->deleteComment($cid, $id);
                break;

            default:
                $this->index();
                break;
        }
    }

    /* ---------------- POSTS ---------------- */
    public function index() {
        $posts = $this->model->getAll();
        include __DIR__ . '/posts/list.php';
    }

    public function show($id) {
        $post = $this->model->getById($id);
        $comments = $this->model->getCommentsByPost($id);
        include __DIR__ . '/posts/show.php';
    }

    public function create() {
        include __DIR__ . '/posts/create.php';
    }

    public function store() {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $this->model->create($title, $content);
        header("Location: ../posts/");
    }

    public function edit($id) {
        $post = $this->model->getById($id);
        include __DIR__ . '/posts/edit.php';
    }

    public function update($id) {
        $this->model->update($id, $_POST['title'], $_POST['content']);
        header("Location: ../posts/");
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: ../posts/");
    }

    /* ---------------- COMMENTS ---------------- */
    public function addComment($post_id) {
        $author = $_POST['author'];
        $content = $_POST['content'];
        $this->model->addComment($post_id, $author, $content);
        header("Location: ?action=show&id=$post_id");
    }

    public function editComment($cid, $post_id) {
        $comment = $this->model->getCommentById($cid);
        include __DIR__ . '/posts/edit_comment.php';
    }

    public function updateComment($cid, $post_id) {
        $content = $_POST['content'];
        $this->model->updateComment($cid, $content);
        header("Location: ?action=show&id=$post_id");
    }

    public function deleteComment($cid, $post_id) {
        $this->model->deleteComment($cid);
        header("Location: ?action=show&id=$post_id");
    }
}

$controller = new PostControl();
$controller->handleRequest();
?>
