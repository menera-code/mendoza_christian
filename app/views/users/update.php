<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User | System Console</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
  --accent-blue: #007bff;
  --accent-blue-light: rgba(0, 123, 255, 0.6);
  --accent-blue-dark: #0056b3;
  --font-display: 'Oxanium', sans-serif;
  --font-mono: 'Share Tech Mono', monospace;
}

body {
  margin: 0;
  padding: 2rem 1rem;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  font-family: var(--font-mono);
  background: linear-gradient(135deg, #e0f0ff, #f5faff);
}

.form-container {
  width: 100%;
  max-width: 540px;
  background: rgba(255, 255, 255, 0.25);
  border: 1px solid rgba(255, 255, 255, 0.3);
  border-radius: 16px;
  padding: 2.5rem;
  box-shadow: 0 8px 20px rgba(0, 123, 255, 0.15);
  backdrop-filter: blur(12px);
  animation: fadeSlideUp 0.9s ease;
}

@keyframes fadeSlideUp {
  0% { opacity: 0; transform: translateY(25px); }
  100% { opacity: 1; transform: translateY(0); }
}

h1 {
  font-family: var(--font-display);
  font-size: clamp(1.6rem, 4vw, 2.4rem);
  color: var(--accent-blue-dark);
  margin-bottom: 2rem;
  text-align: center;
  letter-spacing: 2px;
  text-transform: uppercase;
}

form {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

label {
  font-size: 0.9rem;
  font-weight: 700;
  color: var(--accent-blue-dark);
  margin-bottom: 0.4rem;
  text-transform: uppercase;
  letter-spacing: 1px;
}

input[type="text"],
input[type="email"] {
  width: 100%;
  padding: 0.85rem 1rem;
  background: rgba(255, 255, 255, 0.6);
  border: 1px solid rgba(0, 123, 255, 0.3);
  border-radius: 12px;
  color: #1e293b;
  font-family: var(--font-mono);
  font-size: 1rem;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input:focus {
  outline: none;
  border-color: var(--accent-blue);
  box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
}

button[type="submit"] {
  padding: 1rem;
  border: none;
  background: rgba(0, 123, 255, 0.7);
  backdrop-filter: blur(6px);
  color: #fff;
  font-family: var(--font-display);
  font-weight: 700;
  text-transform: uppercase;
  border-radius: 12px;
  font-size: 1rem;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
}

button[type="submit"]:hover {
  background: rgba(0, 123, 255, 0.9);
  transform: translateY(-2px) scale(1.03);
  box-shadow: 0 6px 18px rgba(0, 123, 255, 0.5);
}

.back-link {
  display: inline-block;
  margin-top: 1.5rem;
  text-decoration: none;
  color: var(--accent-blue-dark);
  font-family: var(--font-display);
  font-size: 0.9rem;
  border: 1px solid rgba(0, 123, 255, 0.4);
  padding: 0.5rem 1rem;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.back-link:hover {
  background: rgba(0, 123, 255, 0.15);
  color: var(--accent-blue);
  box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
}
  </style>
</head>
<body>
  <div class="form-container">
    <h1>// Update User</h1>
    <form action="<?=site_url('users/update/'.$user['id']);?>" method="post">
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" value="<?=html_escape($user['last_name']);?>" required>
      </div>

      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" value="<?=html_escape($user['first_name']);?>" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?=html_escape($user['email']);?>" required>
      </div>

      <button type="submit">Update Record</button>
    </form>
    <a href="<?=site_url('users/show');?>" class="back-link">// Back to Dashboard</a>
  </div>
</body>
</html>
