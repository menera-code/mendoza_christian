<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User | System Console</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #121212;
            --card-bg: #1e1e1e;
            --text-color: #f0f0f0;
            --accent-color: #00ff80; /* Neon Green */
            --danger-color: #ff3366; /* Neon Pink */
            --border-color: #333333;
            --input-bg: #2d2d2d;
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
            justify-content: center;
            min-height: 100vh;
            background-image: linear-gradient(to right, rgba(0, 255, 128, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(0, 255, 128, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        .form-container {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 255, 128, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 500px;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        h1 {
            font-family: var(--font-display);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--accent-color);
            text-shadow: 0 0 10px var(--accent-color);
            letter-spacing: 1.5px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        label {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--accent-color);
            text-align: left;
            margin-bottom: -0.5rem;
            text-transform: uppercase;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 4px;
            color: var(--text-color);
            font-family: var(--font-mono);
            font-size: 1rem;
            box-sizing: border-box;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 5px var(--accent-color);
        }

        button[type="submit"] {
            padding: 0.75rem 1.5rem;
            background-color: var(--accent-color);
            color: var(--bg-color);
            border: none;
            border-radius: 4px;
            font-weight: 700;
            font-family: var(--font-display);
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 0 10px rgba(0, 255, 128, 0.4);
            letter-spacing: 0.5px;
            margin-top: 1rem;
            text-transform: uppercase;
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 15px rgba(0, 255, 128, 0.6);
        }

        .back-link {
            display: inline-block;
            margin-top: 1.5rem;
            text-decoration: none;
            color: var(--text-color);
            font-weight: 400;
            transition: color 0.2s ease;
            border: 1px solid transparent;
            padding: 0.5rem;
            border-radius: 4px;
        }

        .back-link:hover {
            color: var(--accent-color);
            border-color: var(--accent-color);
            box-shadow: 0 0 5px var(--accent-color);
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            body {
                padding: 0.5rem;
            }
            .form-container {
                padding: 1rem;
                max-width: 98vw;
            }
            h1 {
                font-size: 1.1rem;
                margin-bottom: 1rem;
            }
            label {
                font-size: 0.85rem;
            }
            input[type="text"],
            input[type="email"] {
                font-size: 0.95rem;
                padding: 0.5rem;
            }
            button[type="submit"] {
                padding: 0.5rem 1rem;
                font-size: 0.95rem;
                margin-top: 0.7rem;
            }
            .back-link {
                font-size: 0.9rem;
                margin-top: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>// UPDATE USER_REC</h1>
        <form action="<?=site_url('users/update/'.$user['id']);?>" method="post">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="<?=html_escape($user['last_name']);?>" required>

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?=html_escape($user['first_name']);?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?=html_escape($user['email']);?>" required>

            <button type="submit">Update Record</button>
        </form>
        <a href="<?=site_url('users/show');?>" class="back-link">// Back to Dashboard</a>
    </div>
</body>
</html>