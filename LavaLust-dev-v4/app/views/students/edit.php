<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #000000, #ff6600);
            font-family: 'Poppins', sans-serif;
            padding: 40px 0;
            color: #fff;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.5);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            color: #fff;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: #fff;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.25);
            color: #fff;
            box-shadow: none;
        }

        label {
            font-weight: 600;
        }

        .btn-primary {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: #fff;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.35);
            color: #000;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: #fff;
            transition: 0.3s;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            color: #000;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="glass-card">
        <h2>Edit Student</h2>
        <form method="POST" action="/students/update/<?= $student['id'] ?>">
            <div class="mb-3">
                <label>First Name</label>
                <input type="text" name="first_name" value="<?= $student['first_name'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name" value="<?= $student['last_name'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="<?= $student['email'] ?>" class="form-control" required>
            </div>
            <div class="buttons">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/students" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
