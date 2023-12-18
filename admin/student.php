<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    
    .container {
        max-width: 90%;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        
    }

    form {
        margin-bottom: 20px;
    }

    button {
        background-color: #4caf50;
        color: rgb(255, 255, 255);
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
    
</style>

<body>
    <?php include 'index.php'; ?>
    <div class="container">
        <div class="row" style="border-bottom: 2px solid #ccc" >
            <div class = "col-md-6">
                <h1>Quản lý sinh viên</h1>
            </div>
            <div class = "col-md-6 mb-3">
                <button class="btn btn-primary float-end" onclick="window.location.href='add_student.php'">Thêm sinh viên</button>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-6 mb-3 mt-3">
                <form method="post" class="d-flex" id="search-form">
                    <input type="text" class="form-control w-50" name="noidung" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="search-button">
                    <button class="btn btn-outline-success my-2 my-sm-0 ms-2" type="submit" id="search-button" name="search">Tìm kiếm</button>
                </form>
            </div>
        </div>
        <ul class="list-group">
            <?php include 'display_students.php'; ?>
        </ul>
    </div>
</body>

</html>