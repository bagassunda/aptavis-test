<!DOCTYPE html>
<html>
<head>
    <title>Input Skor Pertandingan</title>
</head>
<body>
    <h2>Input Skor Pertandingan</h2>
    <form action="<?php echo base_url('matches/add'); ?>" method="post">
        <label for="home_team_id">Klub Tuan Rumah:</label>
        <select name="home_team_id" required>
            <?php foreach ($clubs as $club): ?>
                <option value="<?php echo $club['id']; ?>"><?php echo $club['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="away_team_id">Klub Tamu:</label>
        <select name="away_team_id" required>
            <?php foreach ($clubs as $club): ?>
                <option value="<?php echo $club['id']; ?>"><?php echo $club['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="home_team_score">Skor Klub Tuan Rumah:</label>
        <input type="number" name="home_team_score" min="0" required>
        <label for="away_team_score">Skor Klub Tamu:</label>
        <input type="number" name="away_team_score" min="0" required>
        <button type="submit">Simpan Skor</button>
    </form>
</body>
</html>
