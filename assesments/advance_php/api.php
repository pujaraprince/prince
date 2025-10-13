
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Kolkata');



header('Content-Type: application/json; charset=utf-8');



// simple session-based protection: only logged-in users can access
if (!isset($_SESSION['user'])) {
    echo json_encode(['success'=>false,'message'=>'Not authenticated']);
    exit;
}

class Ticket {
    public $id;
    public $title;
    public $description;
    public $category;
    public $priority;
    public $status; // open | closed
    public $assigned_to;
    public $date; // ISO string

    public function __construct($title, $description, $category, $priority, $assigned_to){
        $this->id = uniqid('T');
        $this->title = $this->sanitize($title);
        $this->description = $this->sanitize($description);
        $this->category = $this->sanitize($category);
        $this->priority = $this->sanitize($priority);
        $this->status = 'open';
        $this->assigned_to = $this->sanitize($assigned_to);
        $this->date = (new DateTime())->format('Y-m-d H:i:s');
    }

    private function sanitize($s){ return trim(preg_replace('/[\x00-\x1F]/u','',$s)); }
}

$DATA_FILE = __DIR__ . DIRECTORY_SEPARATOR . 'tickets.json';

function read_tickets($path){
    if (!file_exists($path)) return [];
    $j = file_get_contents($path);
    $arr = json_decode($j, true);
    return is_array($arr) ? $arr : [];
}

function write_tickets($path, $arr){
    // safe write with lock
    $tmp = $path . '.tmp';
    if (file_put_contents($tmp, json_encode($arr, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)) === false) return false;
    return rename($tmp, $path);
}

$action = $_REQUEST['action'] ?? '';

if ($action === 'create_ticket' && $_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $category = $_POST['category'] ?? 'Other';
    $priority = $_POST['priority'] ?? 'Medium';
    $assigned_to = $_POST['assigned_to'] ?? '';

    if (strlen(trim($title)) < 5) { echo json_encode(['success'=>false,'message'=>'Title too short']); exit; }
    if (trim($assigned_to) === '') { echo json_encode(['success'=>false,'message'=>'assigned_to required']); exit; }

    $t = new Ticket($title,$description,$category,$priority,$assigned_to);

    // ➕ Add creator username from session
    $t->created_by = $_SESSION['user']['username'];

    $all = read_tickets($DATA_FILE);
    array_unshift($all, $t); // newest first

    if (!write_tickets($DATA_FILE, $all)) { echo json_encode(['success'=>false,'message'=>'Failed to save ticket']); exit; }

    echo json_encode(['success'=>true,'ticket'=>$t]);
    exit;
}


// ➤ Count open vs closed tickets
if ($action === 'count_tickets' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $all = read_tickets($DATA_FILE);
    $user = $_SESSION['user'] ?? null;

    if (!$user) {
        echo json_encode(['success'=>false,'message'=>'No active session']);
        exit;
    }

    // Role-based filtering
    if ($user['role'] === 'employee') {
        $all = array_values(array_filter($all, function($t) use ($user) {
            return (($t['created_by'] ?? '') === $user['username']) ||
                   (($t['assigned_to'] ?? '') === $user['username']);
        }));
    } elseif ($user['role'] === 'technician') {
        $all = array_values(array_filter($all, function($t) use ($user) {
            return ($t['assigned_to'] ?? '') === $user['username'];
        }));
    }
    // Admin sees all tickets

    // Count open/closed
    $open = 0;
    $closed = 0;
    foreach ($all as $t) {
        $status = strtolower($t['status'] ?? '');
        if ($status === 'open') $open++;
        elseif ($status === 'closed') $closed++;
    }

    header('Content-Type: application/json');
    echo json_encode(['open' => $open, 'closed' => $closed]);
    exit;
}

if ($action === 'list_tickets' && $_SERVER['REQUEST_METHOD'] === 'GET'){
    $filter = $_GET['filter'] ?? 'all';
    $all = read_tickets($DATA_FILE);
    
    $user = $_SESSION['user'];

    // Count open vs closed tickets
if ($action === 'count_tickets' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $all = read_tickets($DATA_FILE);
    $user = $_SESSION['user'];

    // Role-based filtering (same as list_tickets)
    if ($user['role'] === 'employee') {
        $all = array_values(array_filter($all, function($t) use ($user) {
            return (($t['created_by'] ?? '') === $user['username']) ||
                   (($t['assigned_to'] ?? '') === $user['username']);
        }));
    } elseif ($user['role'] === 'technician') {
        $all = array_values(array_filter($all, function($t) use ($user) {
            return ($t['assigned_to'] ?? '') === $user['username'];
        }));
    }
    // Admin sees all tickets — no filtering

    // Count
    $open = count(array_filter($all, fn($t) => strtolower($t['status']) === 'open'));
    $closed = count(array_filter($all, fn($t) => strtolower($t['status']) === 'closed'));

    header('Content-Type: application/json');
    echo json_encode(['open' => $open, 'closed' => $closed]);
    exit;
}


    // 🎯 Filter results based on role
    if ($user['role'] === 'employee') {
    $all = array_values(array_filter($all, function($t) use ($user) {
        // Show tickets created by OR assigned to this employee
        return ($t['created_by'] ?? '') === $user['username'] ||
               ($t['assigned_to'] ?? '') === $user['username'];
    }));
}
    elseif ($user['role'] === 'technician') {
        // Show only tickets assigned to this tech
        $all = array_values(array_filter($all, fn($t) => ($t['assigned_to'] ?? '') === $user['username']));
    }

    // ensure old data deserialized objects become associative arrays
    $all = array_map(function($it){ return is_object($it)?(array)$it:$it; }, $all);
    $counts = ['open'=>0,'closed'=>0];
    foreach ($all as $it){ if (($it['status'] ?? 'open') === 'closed') $counts['closed']++; else $counts['open']++; }

    if ($filter === 'open') $filtered = array_values(array_filter($all, fn($x)=>($x['status'] ?? 'open') === 'open'));
    elseif ($filter === 'closed') $filtered = array_values(array_filter($all, fn($x)=>($x['status'] ?? 'open') === 'closed'));
    else $filtered = $all;

    echo json_encode(['success'=>true,'tickets'=>$filtered,'counts'=>$counts]);
    exit;
}

if ($action === 'toggle_status' && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'] ?? '';
    if (!$id) { echo json_encode(['success'=>false,'message'=>'id required']); exit; }
    $all = read_tickets($DATA_FILE);
    $found = false;
    foreach ($all as &$t){ if (($t['id'] ?? '') === $id) { $t['status'] = (($t['status'] ?? 'open') === 'open') ? 'closed' : 'open'; $found = true; $updated = $t; break; } }
    if (!$found) { echo json_encode(['success'=>false,'message'=>'Ticket not found']); exit; }
    if (!write_tickets($DATA_FILE, $all)) { echo json_encode(['success'=>false,'message'=>'Failed to save']); exit; }
    echo json_encode(['success'=>true,'ticket'=>$updated]);
    exit;
}

// default
http_response_code(400);
echo json_encode(['success'=>false,'message'=>'Invalid action']);
?>