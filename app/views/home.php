<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | System Console</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-gradient: linear-gradient(135deg, #dbeafe 0%, #ffffff 100%);
      --glass-bg: rgba(255, 255, 255, 0.15);
      --text-main: #1e293b;
      --text-light: #64748b;
      --accent: #2563eb; /* modern blue */
      --accent-glow: rgba(37, 99, 235, 0.6);
      --shadow-glass: 0 8px 32px rgba(37, 99, 235, 0.1);
      --radius: 18px;
    }

    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
      background: var(--bg-gradient);
      background-attachment: fixed;
      padding: 2rem;
    }

    @keyframes fadeUp {
      0% { opacity: 0; transform: translateY(30px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    .container {
      width: 100%;
      max-width: 520px;
      background: var(--glass-bg);
      border-radius: var(--radius);
      padding: 2.5rem;
      backdrop-filter: blur(20px) saturate(180%);
      -webkit-backdrop-filter: blur(20px) saturate(180%);
      border: 1px solid rgba(255, 255, 255, 0.3);
      box-shadow: var(--shadow-glass);
      text-align: center;
      animation: fadeUp 0.9s ease forwards;
    }

    h1 {
      font-size: clamp(1.8rem, 5vw, 2.4rem);
      font-weight: 600;
      margin-bottom: 2rem;
      color: var(--accent);
      text-shadow: 0 0 10px var(--accent-glow);
      letter-spacing: 1px;
      animation: fadeUp 1s ease forwards;
    }

    .btn-group {
      display: flex;
      flex-direction: column;
      gap: 1.2rem;
      align-items: center;
    }

    .main-btn {
      display: inline-block;
      width: 100%;
      max-width: 280px;
      padding: 0.9rem 1rem;
      border-radius: var(--radius);
      border: 2px solid var(--accent);
      background: rgba(255, 255, 255, 0.25);
      color: var(--accent);
      font-size: 1rem;
      font-weight: 600;
      text-decoration: none;
      text-align: center;
      transition: all 0.3s ease;
      box-shadow: 0 0 12px rgba(37, 99, 235, 0.25);
    }

    .main-btn:hover {
      background: var(--accent);
      color: #fff;
      box-shadow: 0 6px 20px var(--accent-glow);
      transform: translateY(-3px);
    }

    /* Add subtle floating animation for modern vibe */
    .container:hover {
      transform: translateY(-4px);
      transition: transform 0.3s ease;
    }

    @media (max-width: 500px) {
      .container {
        padding: 2rem 1.5rem;
      }
      h1 {
        font-size: 1.7rem;
        margin-bottom: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Student Management</h1>
    <div class="btn-group">
      <a href="<?=site_url('users/show');?>" class="main-btn">📋 View Students List</a>
      <a href="<?=site_url('users/create');?>" class="main-btn">➕ Add Student</a>
    </div>
  </div>
</body>
</html>
