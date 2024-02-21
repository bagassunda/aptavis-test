<!DOCTYPE html>
<html>

<head>
    <title>Input Skor Pertandingan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .success-message {
            color: #4caf50;
            margin-top: 10px;
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            grid-gap: 10px;
        }

        label {
            font-weight: bold;
        }

        select,
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .other-btn {
            background-color: red;
            margin-top: 10px;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php if (session()->getFlashdata('success')): ?>
        <p class="success-message">
            <?php echo session()->getFlashdata('success'); ?>
        </p>
    <?php endif; ?>
    <?php if (session()->has('error')): ?>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php echo session('error'); ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <h2>Input Skor Pertandingan</h2>
        <form action="<?php echo base_url('matches/add'); ?>" method="post">
            <label for="home_team_id">Klub Tuan Rumah:</label>
            <select name="home_team_id" required>
                <?php foreach ($clubs as $club): ?>
                    <option value="<?php echo $club['id']; ?>">
                        <?php echo $club['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="away_team_id">Klub Tamu:</label>
            <select name="away_team_id" required>
                <?php foreach ($clubs as $club): ?>
                    <option value="<?php echo $club['id']; ?>">
                        <?php echo $club['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="home_team_score">Skor Klub Tuan Rumah:</label>
            <input type="number" name="home_team_score" min="0" required>
            <label for="away_team_score">Skor Klub Tamu:</label>
            <input type="number" name="away_team_score" min="0" required>
            <button type="submit">Simpan Skor</button>
        </form>
        <button class="other-btn" type="submit" onclick="window.location.href = '<?php echo base_url('/'); ?>'" >Lihat Klasemen</button>
    </div>
</body>

</html>