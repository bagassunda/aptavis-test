CREATE TABLE clubs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    points INT DEFAULT 0, -- Kolom baru untuk menyimpan jumlah poin
    matches_played INT DEFAULT 0, -- Kolom baru untuk menyimpan jumlah pertandingan yang dimainkan
    wins INT DEFAULT 0, -- Kolom baru untuk menyimpan jumlah kemenangan
    draws INT DEFAULT 0, -- Kolom baru untuk menyimpan jumlah seri
    losses INT DEFAULT 0, -- Kolom baru untuk menyimpan jumlah kekalahan
    goals_for INT DEFAULT 0, -- Kolom baru untuk menyimpan jumlah gol yang dicetak
    goals_against INT DEFAULT 0 -- Kolom baru untuk menyimpan jumlah gol yang kebobolan
);

CREATE TABLE matches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    home_team_id INT,
    away_team_id INT,
    home_team_score INT,
    away_team_score INT,
    FOREIGN KEY (home_team_id) REFERENCES clubs(id),
    FOREIGN KEY (away_team_id) REFERENCES clubs(id)
);
