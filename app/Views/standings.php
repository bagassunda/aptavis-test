<!-- app/Views/standings.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasemen</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            margin-top: 10px;
            border-radius: 3px;
            cursor: pointer;
            display: flex;
            align-items: center margin: 0 auto;
        }

    </style>
</head>
<body>
    <h2>Tampilan Klasemen</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Klub</th>
                <th>Ma</th>
                <th>Me</th>
                <th>S</th>
                <th>K</th>
                <th>GM</th>
                <th>GK</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($standings as $key => $club): ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $club['club']; ?></td>
                    <td><?php echo $club['matches_played']; ?></td>
                    <td><?php echo $club['wins']; ?></td>
                    <td><?php echo $club['draws']; ?></td>
                    <td><?php echo $club['losses']; ?></td>
                    <td><?php echo $club['goals_for']; ?></td>
                    <td><?php echo $club['goals_against']; ?></td>
                    <td><?php echo $club['goal_difference']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button type="submit" onclick="window.location.href = '<?php echo base_url('clubs'); ?>'">Klub Baru</button>
</body>
</html>
