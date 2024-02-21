<!DOCTYPE html>
<html>

<head>
    <title>Input Data Klub</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            justify-items: center;
            display: grid;
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
        }

        .success-message {
            color: #4caf50;
            margin-top: 10px;
            align-items: center;
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
            color:
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            display: flex;
            align-items: center margin: 0 auto;
        }

        .wrapper-button {
            justify-content: space-between;
            display: flex;

            .btn-create-match {
                background-color: red;
                
            }
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
    <h2>Input Data Klub</h2>
    <form action="<?php echo base_url('clubs/add'); ?>" method="post">
        <label for="name">Nama Klub:</label>
        <input type="text" name="name" required>
        <div class="wrapper-button">
            <button type="submit">Tambah Klub</button>
            <button class="btn-create-match" type="submit" onclick="window.location.href = '<?php echo base_url('matches'); ?>'">Tambah
                Match</button>
        </div>

    </form>


</body>

</html>