
<?php
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Setup Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body.hold-transition.login-page {
            background: url('https://images.unsplash.com/photo-1468581264429-2548ef9eb732?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .setup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }
        .setup-box {
            display: flex;
            width: 80%;
            max-width: 900px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            position: relative;
        }
        .left-panel {
            background-color: #fcd535;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            color: white;
            width: 40%;
            text-align: center;
        }
        .left-panel img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin-bottom: 1rem;
        }
        .right-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            flex: 1;
        }
        .form-container {
            width: 100%;
            max-width: 400px;
        }
        .close-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="setup-container">
        <div class="setup-box">
            <div class="close-icon" onclick="goBack()">&times;</div>
            <div class="left-panel">
                <img src="<?=BASE_URL.$admin['anh_dai_dien']?>" alt="Avatar">
                <h2>Let's get you set up</h2>
                <p>It should only take a couple of minutes to pair with your watch</p>
            </div>
            <div class="right-panel">
                <div class="form-container">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <button class="form-control text-left "><h5><?=$admin['ho_ten']?></h5></button>
                        </div>
                        <div class="form-group">
                            <label>Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input  class="form-check-input" type="radio" name="gender" id="genderMale" value="male">
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female">
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <button class="form-control text-left "><h5><?=$admin['ngay_sinh']?></h5></button>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <button class="form-control text-left "><h5><?=$admin['email']?></h5></button>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <button class="form-control text-left "><h5><?=$admin['so_dien_thoai']?></h5></button>
                        </div>
                        <div class="form-group">
                            <label for="customerID">Địa chỉ</label>
                            <button class="form-control text-left "><h5><?=$admin['dia_chi']?></h5></button>
                        </div>
                       
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
