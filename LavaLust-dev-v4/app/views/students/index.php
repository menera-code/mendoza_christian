<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
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
            padding: 30px;
            width: 90%;
            max-width: 900px;
            color: #fff;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 700;
        }

        a.btn {
            margin-bottom: 20px;
            text-decoration: none;
        }

        a.btn-primary {
            background: rgba(255,255,255,0.3);
            border: none;
            color: #fff;
            transition: 0.3s;
        }

        a.btn-primary:hover {
            background: rgba(255,255,255,0.5);
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        thead {
            background: rgba(255, 255, 255, 0.2);
        }

        tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.05);
        }

        a.action-link {
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }

        a.action-link:hover {
            color: #ffd700;
        }

        @media(max-width: 600px){
            th, td {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="glass-card">
        <h1>Students List</h1>
        <a href="/students/create" class="btn btn-primary">Add Student</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($students)): ?>
                    <?php foreach($students as $student): ?>
                    <tr>
                        <td><?= $student['id'] ?></td>
                        <td><?= $student['first_name'] ?></td>
                        <td><?= $student['last_name'] ?></td>
                        <td><?= $student['email'] ?></td>
                        <td>
                            <a href="/students/edit/<?= $student['id'] ?>" class="action-link">Edit</a>
                            <a href="/students/delete/<?= $student['id'] ?>" onclick="return confirm('Delete this student?')" class="action-link">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5">No students found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
