<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/loginStyle.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.min.css" rel="stylesheet"/>
</head>
<body>
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="assets/images/saloon01.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="post" action="assets/hanndlers/registration.php">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <span class="h1 fw-bold mb-0">CUSTOMER REGISTRATION</span>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="username" class="form-control form-control-lg" name="username" required/>
                                            <label class="form-label" for="username">Username</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="address" class="form-control form-control-lg" name="addr" required/>
                                            <label class="form-label" for="address">Address</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <!-- Phone number validation (only digits, length 10-15) -->
                                            <input type="text" id="phone" class="form-control form-control-lg" name="phone" pattern="^\d{10,15}$" title="Please enter a valid phone number (10-15 digits)." required/>
                                            <label class="form-label" for="phone">Phone Number</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <!-- Email validation -->
                                            <input type="email" id="email" class="form-control form-control-lg" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address." required/>
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <!-- Password validation (at least 8 characters, with at least one uppercase letter, one lowercase letter, one number, and one special character) -->
                                            <input type="password" id="password" class="form-control form-control-lg" name="passw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=]).{8,}" title="Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character." required/>
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit" name="register">Register</button><br>
                                            <p>Already have an Account? <a href="index.php">Login here</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
