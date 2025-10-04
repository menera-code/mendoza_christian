<?php
// Ensure $users exists and is an array
if (!isset($users) || !is_array($users)) {
    $users = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Data Grid | System Console</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-light: #e6f0fa;
      --glass-bg: rgba(255, 255, 255, 0.55);
      --text-main: #1e293b;
      --accent-blue: #3b82f6;
      --accent-blue-dark: #2563eb;
      --accent-delete: #ef4444;
      --border: rgba(255,255,255,0.3);
      --font-display: 'Oxanium', sans-serif;
      --font-mono: 'Share Tech Mono', monospace;
      --blur: blur(18px);
      --shadow-blue: 0 8px 30px rgba(59,130,246,0.25);
    }

    body {
      background: var(--bg-light);
      font-family: var(--font-mono);
      color: var(--text-main);
      margin: 0;
      padding: 2rem 1rem;
      display: flex;
      justify-content: center;
      min-height: 100vh;
      background-image: 
        radial-gradient(circle at top left, rgba(59,130,246,0.15), transparent 40%),
        radial-gradient(circle at bottom right, rgba(59,130,246,0.1), transparent 40%);
    }

    @keyframes fadeSlideUp {
      0% { opacity: 0; transform: translateY(25px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    .container {
      width: 100%;
      max-width: 1100px;
      background: var(--glass-bg);
      backdrop-filter: var(--blur);
      -webkit-backdrop-filter: var(--blur);
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 2.5rem;
      box-shadow: var(--shadow-blue);
      animation: fadeSlideUp 0.9s ease;
    }

    h1 {
      font-family: var(--font-display);
      font-size: clamp(1.6rem, 4vw, 2.4rem);
      text-align: center;
      color: var(--accent-blue-dark);
      text-shadow: 0 2px 8px rgba(59,130,246,0.3);
      margin-bottom: 2rem;
      letter-spacing: 1.5px;
    }

    /* Search */
    .search-container {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 0.75rem;
      margin-bottom: 2rem;
    }

    .search-container input {
      flex: 1;
      max-width: 400px;
      padding: 0.7rem 1.2rem;
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 12px;
      font-size: 1rem;
      outline: none;
      transition: all 0.3s ease;
    }

    .search-container input:focus {
      outline: none;
      border-color: var(--accent-blue);
      box-shadow: var(--shadow-blue);
    }

    .search-container button {
      padding: 0.7rem 1.2rem;
      background: var(--accent-blue);
      border: none;
      color: #fff;
      font-family: var(--font-display);
      font-weight: 700;
      text-transform: uppercase;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .search-container button:hover {
      background: var(--accent-blue-dark);
      box-shadow: var(--shadow-blue);
    }

    /* Table */
    .table-responsive { overflow-x: auto; }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 2rem;
      border-radius: 12px;
      overflow: hidden;
      background: rgba(255,255,255,0.55);
      backdrop-filter: blur(10px);
    }

    thead { background: rgba(59,130,246,0.12); }

    th, td {
      padding: 1rem;
      border-bottom: 1px solid var(--border);
      text-align: left;
    }

    th {
      font-family: var(--font-display);
      text-transform: uppercase;
      font-size: 0.85rem;
      color: var(--accent-blue-dark);
      letter-spacing: 1px;
    }

    tbody tr { transition: background 0.3s ease; }
    tbody tr:hover { background: rgba(59,130,246,0.08); }

    /* Action Links */
    .action-links a {
      margin-right: 0.8rem;
      text-decoration: none;
      font-weight: 700;
      transition: all 0.3s ease;
    }

    .action-links a:first-child { color: var(--accent-blue); }
    .action-links a:first-child:hover { text-decoration: underline; }
    .action-links a.delete-link { color: var(--accent-delete); }
    .action-links a.delete-link:hover { text-decoration: underline; }

    


    /* Buttons */
    .create-record-btn {
      display: inline-block;
      padding: 0.9rem 1.5rem;
      border: none;
      color: #fff;
      background: var(--accent-blue);
      text-transform: uppercase;
      font-family: var(--font-display);
      font-weight: 700;
      border-radius: 12px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .create-record-btn:hover {
      background: var(--accent-blue-dark);
      box-shadow: var(--shadow-blue);
    }
   .pagination-container {
  display: flex;
  justify-content: center;
  margin-bottom: 2rem;
}

.pagination-container ul {
  display: flex;       /* make list items horizontal */
  gap: 0.6rem;         /* spacing between items */
  padding: 0;
  margin: 0;
  list-style: none;    /* remove bullets */
}

.pagination-container li {
  list-style: none;
}

.pagination-container a,
.pagination-container strong {
  display: inline-block;
  padding: 0.6rem 1.2rem;
  border-radius: 8px;
  font-family: var(--font-display);
  font-size: 0.9rem;
  color: #fff;
  background: var(--accent-blue);
  text-transform: uppercase;
  text-decoration: none;
  transition: all 0.3s ease;
  box-shadow: var(--shadow-blue);
  border: none;
}

.pagination-container a:hover {
  background: var(--accent-blue-dark);
  transform: translateY(-2px);
}

.pagination-container strong {
  background: #0077b6;
  cursor: default;
}

  </style>
</head>
<body>
  <div class="container">
    <h1>STUDENTS</h1>

    <div class="search-container">
      <form action="<?= site_url('users/show'); ?>" method="get">
        <?php $q = $_GET['q'] ?? ''; ?>
        <input type="text" name="q" placeholder="Search records..." value="<?= htmlspecialchars($q); ?>">
        <button type="submit">Search</button>
      </form>
    </div>

    <div class="table-wrapper">
  <div class="table-responsive">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($users)): ?>
          <?php foreach ($users as $user): ?>
            <tr>
              <td><?= htmlspecialchars($user['id']); ?></td>
              <td><?= htmlspecialchars($user['last_name'] ?? ''); ?></td>
              <td><?= htmlspecialchars($user['first_name'] ?? ''); ?></td>
              <td><?= htmlspecialchars($user['email']); ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" style="text-align:center;">No users found</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
    <div class="pagination-container">
  <?php if (!empty($pagination_links)) echo $pagination_links; ?>
</div>


    <div style="text-align:center;">
      <a href="<?= site_url('users/create'); ?>" class="create-record-btn">+ Create New Record</a>
    </div>
  </div>
</body>
</html>
