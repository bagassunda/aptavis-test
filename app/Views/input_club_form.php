<!DOCTYPE html>
<html>
<head>
    <title>Input Data Klub</title>
</head>
<body>
    <h2>Input Data Klub</h2>
    <?php if(isset($validation)): ?>
        <p style="color: red;"><?php echo $validation->listErrors(); ?></p>
    <?php endif; ?>
    <form action="<?php echo base_url('clubs/add'); ?>" method="post">
        <label for="name">Nama Klub:</label>
        <input type="text" name="name" required>
        <button type="submit">Tambah Klub</button>
    </form>
</body>
</html>
