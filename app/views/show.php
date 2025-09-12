<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Grid | System Console</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #121212;
            --text-color: #f0f0f0;
            --accent-color: #00ff80; /* Neon Green */
            --border-color: #333333;
            --table-header-bg: #1e1e1e;
            --hover-bg: #1e1e1e;
            --font-display: 'Orbitron', sans-serif;
            --font-mono: 'Roboto Mono', monospace;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: var(--font-mono);
            margin: 0;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-image: linear-gradient(to right, rgba(0, 255, 128, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(0, 255, 128, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin-top: 2rem;
            background: rgba(18, 18, 18, 0.6);
            backdrop-filter: blur(5px);
            border: 1px solid var(--border-color);
            box-shadow: 0 0 20px rgba(0, 255, 128, 0.1);
            padding: 2rem;
            border-radius: 8px;
            position: relative;
        }

        h1 {
            font-family: var(--font-display);
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            color: var(--accent-color);
            text-shadow: 0 0 10px var(--accent-color);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.95rem;
        }

        th, td {
            padding: 1rem;
            border: 1px solid var(--border-color);
        }

        th {
            background-color: var(--table-header-bg);
            font-weight: 700;
            color: var(--accent-color);
            text-transform: uppercase;
        }

        tr {
            transition: background-color 0.3s ease;
        }
        
        tr:hover {
            background-color: var(--hover-bg);
            box-shadow: inset 2px 0 0 0 var(--accent-color);
        }

        .action-links a {
            text-decoration: none;
            color: var(--accent-color);
            font-weight: 700;
            padding: 0.25rem 0.5rem;
            border: 1px solid transparent;
            transition: all 0.2s ease-in-out;
        }
        
        .action-links a:hover {
            border-color: var(--accent-color);
            box-shadow: 0 0 5px var(--accent-color);
        }

        .action-links a.delete-link {
            color: #ff3366; /* Neon Pink */
        }
        
        .action-links a.delete-link:hover {
            border-color: #ff3366;
            box-shadow: 0 0 5px #ff3366;
        }

        .create-record-btn {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.75rem 1.5rem;
            background-color: transparent;
            color: var(--accent-color);
            text-decoration: none;
            border: 2px solid var(--accent-color);
            border-radius: 8px;
            font-weight: 700;
            font-family: var(--font-display);
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
            text-shadow: 0 0 5px var(--accent-color);
            box-shadow: 0 0 10px rgba(0, 255, 128, 0.4);
        }

        .create-record-btn:hover {
            background-color: var(--accent-color);
            color: var(--bg-color);
            box-shadow: 0 0 20px var(--accent-color);
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>User Data Grid // Access Terminal</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (html_escape($users) as $user):?>
                    <tr>
                        <td><?=$user['id'];?></td>
                        <td><?=$user['last_name'];?></td>
                        <td><?=$user['first_name'];?></td>
                        <td><?=$user['email'];?></td>
                        <td class="action-links">
                            <a href="<?=site_url('users/update/'.$user['id']);?>">Update</a> |
                            <a href="<?=site_url('users/delete/'.$user['id']);?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <a href="<?=site_url('users/create');?>" class="create-record-btn">Create New Record</a>
    </div>
</body>
</html>