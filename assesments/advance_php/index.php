<?php


session_start();

// Simple users array (demo). In production store users in DB and use password_hash.
$USERS = [
    'employee' => password_hash('employee123', PASSWORD_DEFAULT),
    'tech'     => password_hash('tech123', PASSWORD_DEFAULT),
    'admin'    => password_hash('admin123', PASSWORD_DEFAULT),
];

// Handle logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}

// Handle login POST
$login_error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $u = trim($_POST['username'] ?? '');
    $p = $_POST['password'] ?? '';
    if ($u === '' || $p === '') {
        $login_error = 'Enter username & password';
    } elseif (isset($USERS[$u]) && password_verify($p, $USERS[$u])) {
        // store minimal user info in session
        $_SESSION['user'] = [
            'username' => $u,
            // map roles simply
            'role' => ($u === 'admin') ? 'admin' : (($u === 'tech') ? 'technician' : 'employee')
        ];
        header('Location: index.php');
        exit;
    } else {
        $login_error = 'Invalid credentials';
    }
}

// If not logged in show login form
if (!isset($_SESSION['user'])):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>AutoFix HelpDesk — Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        body{font-family:Arial,Helvetica,sans-serif;background:#f4f7fb;display:flex;align-items:center;justify-content:center;height:100vh}
        .card{background:white;padding:24px;border-radius:8px;box-shadow:0 6px 18px rgba(0,0,0,.06);width:320px}
        input{width:100%;padding:10px;margin:8px 0;border-radius:4px;border:1px solid #ddd}
        button{width:100%;padding:10px;border:none;background:#0366d6;color:white;border-radius:4px;cursor:pointer}
        .error{color:#c00;margin-top:8px}
    </style>
</head>
<body>
<div class="card">
    <h2>AutoFix HelpDesk — Login</h2>
    <form method="post" id="loginForm">
        <input name="action" type="hidden" value="login">
        <label>Username</label>
        <input name="username" id="username" placeholder="employee | tech | admin" required>
        <label>Password</label>
        <input name="password" id="password" type="password" required>
        <button type="submit">Sign in</button>
        <?php if ($login_error): ?><div class="error"><?php echo htmlspecialchars($login_error); ?></div><?php endif; ?>
    </form>
    <p style="font-size:13px;color:#555;margin-top:12px">Demo credentials: <strong>employee/employee123</strong>, <strong>tech/tech123</strong>, <strong>admin/admin123</strong></p>
</div>
</body>
</html>
<?php
exit;
endif;

// Logged-in UI
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>AutoFix HelpDesk</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        body{font-family:Arial,Helvetica,sans-serif;background:#f7f9fc;padding:20px}
        header{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
        .card{background:white;padding:16px;border-radius:8px;box-shadow:0 4px 14px rgba(20,20,40,.06)}
        .grid{display:grid;grid-template-columns:1fr 380px;gap:16px}
        label{display:block;margin-top:8px}
        input,textarea,select{width:100%;padding:8px;margin-top:6px;border-radius:4px;border:1px solid #ddd}
        button{padding:8px 12px;border-radius:6px;border:none;background:#0b63d0;color:white;cursor:pointer}
        .tickets{max-height:520px;overflow:auto;padding:12px}
        .ticket{border:1px solid #eee;padding:10px;border-radius:6px;margin-bottom:8px}
        .ticket h4{margin:0 0 6px 0}
        .f-row{display:flex;gap:8px;align-items:center}
        .filter {display:flex;gap:8px}
        .small{font-size:13px;color:#666}
        .status-open{color:green;font-weight:600}
        .status-closed{color:#888;font-weight:600}
    </style>
</head>
<body>
<header>
    <div>
        <h2>AutoFix HelpDesk</h2>
        <div class="small">Signed in as <strong><?php echo htmlspecialchars($user['username']); ?></strong> (<?php echo htmlspecialchars($user['role']); ?>)</div>
    </div>
    <div>
        <a href="?logout=1"><button>Logout</button></a>
    </div>
</header>

<div class="grid">
    <div>
        <div class="card">
            <h3>Create Ticket</h3>
            <form id="ticketForm">
                <label>Title</label>
                <input type="text" id="title" name="title" required minlength="5">

                <label>Description</label>
                <textarea id="description" name="description" rows="4"></textarea>

                <label>Category</label>
                <select id="category" name="category">
                    <option>IT</option>
                    <option>Maintenance</option>
                    <option>HR</option>
                    <option>Other</option>
                </select>

                <label>Priority</label>
                <select id="priority" name="priority">
                    <option value="Low">Low</option>
                    <option value="Medium" selected>Medium</option>
                    <option value="High">High</option>
                </select>

                <label>Assign To (username)</label>
                <input id="assigned_to" name="assigned_to" placeholder="teche/mployee">

                <div style="margin-top:10px">
                    <button type="submit">Submit Ticket</button>
                </div>
                <div id="formError" style="color:#c00;margin-top:8px"></div>
                <div id="formSuccess" style="color:green;margin-top:8px"></div>
            </form>
        </div>

        <div class="card" style="margin-top:12px">
            <h3>Tickets</h3>
            <div class="f-row" style="justify-content:space-between;margin-bottom:8px">
                <div class="filter">
                    <button id="showAll">All</button>
                    <button id="showOpen">Open</button>
                    <button id="showClosed">Closed</button>
                </div>
                <div id="ticketStats">Open: 0 | Closed: 0</div>
            </div>
            <div id="ticketsContainer" class="tickets"></div>
        </div>
    </div>

    <div>
        <div class="card">
            <h3>Actions</h3>
            <p class="small">Use these to open/close ticket updates.</p>
            <div style="display:flex;gap:8px">
                <input id="toggleId" placeholder="ticket id">
                <button id="toggleBtn">Toggle Open/Closed</button>
            </div>
           
           
        </div>
    </div>
</div>

<script>
// Client-side validation + AJAX interactions
const form = document.getElementById('ticketForm');
const formError = document.getElementById('formError');
const formSuccess = document.getElementById('formSuccess');
const ticketsContainer = document.getElementById('ticketsContainer');
const raw = document.getElementById('raw');
const countOpenEl = document.getElementById('countOpen');
const countClosedEl = document.getElementById('countClosed');
let currentFilter = 'all';

function showError(msg){ formError.textContent = msg; formSuccess.textContent = ''; }
function showSuccess(msg){ formSuccess.textContent = msg; formError.textContent = ''; }

form.addEventListener('submit', async function(e){
    e.preventDefault();
    formError.textContent = '';
    formSuccess.textContent = '';

    const title = document.getElementById('title').value.trim();
    const assigned_to = document.getElementById('assigned_to').value.trim();
    const description = document.getElementById('description').value.trim();

    // JS Validation rules
    if (title.length < 5) return showError('Title must be at least 5 characters.');
    if (assigned_to === '') return showError('Assigning to someone is required.');

    const payload = new FormData();
    payload.append('action', 'create_ticket');
    payload.append('title', title);
    payload.append('description', description);
    payload.append('category', document.getElementById('category').value);
    payload.append('priority', document.getElementById('priority').value);
    payload.append('assigned_to', assigned_to);

    const res = await fetch('api.php', { method: 'POST', body: payload });
    const j = await res.json();
    if (j.success) {
        form.reset();
        showSuccess('Ticket created — ID: ' + j.ticket.id);
        loadTickets(currentFilter);
    } else {
        showError(j.message || 'Server error');
    }
});

// Load tickets via AJAX
async function loadTickets(filter='all'){
    currentFilter = filter;
    const res = await fetch('api.php?action=list_tickets&filter=' + encodeURIComponent(filter));
    const j = await res.json();
    if (!j.success) { ticketsContainer.innerHTML = '<div style="color:#c00">'+(j.message||'Failed to load')+'</div>'; return; }
    const tickets = j.tickets;
    renderTickets(tickets);
    raw.textContent = JSON.stringify(tickets, null, 2);
    countOpenEl.textContent = j.counts.open;
    countClosedEl.textContent = j.counts.closed;
}

function loadTicketStats() {
  fetch('api.php?action=count_tickets')
    .then(r => r.json())
    .then(data => {
      document.getElementById('ticketStats').innerHTML =
        `Open: ${data.open} | Closed: ${data.closed}`;
    })
    .catch(err => console.error('Error loading stats:', err));
}

// Load once when page opens
loadTicketStats();

// Also refresh every 30 seconds (optional)
setInterval(loadTicketStats, 30000);


function renderTickets(tickets){
    if (!tickets.length) { ticketsContainer.innerHTML = '<div class="small">No tickets</div>'; return; }
    ticketsContainer.innerHTML = '';
    for (const t of tickets){
        const el = document.createElement('div');
        el.className = 'ticket';
        el.innerHTML = `
            <div class="f-row" style="justify-content:space-between"><h4>${escapeHtml(t.title)}</h4><div class="small ${t.status==='open'?'status-open':'status-closed'}">${t.status}</div></div>
            <div class="small">ID: ${t.id} • Assigned to: ${escapeHtml(t.assigned_to)} • ${escapeHtml(t.priority)} • ${escapeHtml(t.category)}</div>
            
            <p style="margin-top:8px">${escapeHtml(t.description)}</p>
            <div class="small">Created: ${escapeHtml(t.date)}</div>
        `;
        ticketsContainer.appendChild(el);
    }
}

function escapeHtml(s){ return (s||'').replaceAll('&','&amp;').replaceAll('<','&lt;').replaceAll('>','&gt;'); }

// Buttons
document.getElementById('showAll').addEventListener('click', ()=>loadTickets('all'));
document.getElementById('showOpen').addEventListener('click', ()=>loadTickets('open'));
document.getElementById('showClosed').addEventListener('click', ()=>loadTickets('closed'));

// Toggle button
document.getElementById('toggleBtn').addEventListener('click', async ()=>{
    const id = document.getElementById('toggleId').value.trim();
    if (!id) return alert('Enter ticket id');
    const payload = new FormData(); payload.append('action','toggle_status'); payload.append('id', id);
    const res = await fetch('api.php', { method:'POST', body: payload });
    const j = await res.json();
    if (j.success) { alert('Toggled. New status: '+j.ticket.status); loadTickets(currentFilter); }
    else alert(j.message||'Failed');
});

// initial load
loadTickets('all');
</script>
</body>
</html>


