<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure.dreamstechnologies.com/html/template/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jun 2024 21:31:41 GMT -->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="The responsive professional Doccure cardiology care template features are the best for scheduling  appointments with  top cardiologists, clinics, and hospitals via voice, video call & chat.">
<meta name="keywords" content="practo clone, doccure, doctor appointment, Practo clone html template, doctor booking template">
<meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
<meta property="og:url" content="https://doccure.dreamstechnologies.com/html/">
<meta property="og:type" content="website">
<meta property="og:title" content="Doctors Appointment HTML Website Templates | Doccure">
<meta property="og:description" content="The responsive professional Doccure cardiology care template features are the best for scheduling  appointments with  top cardiologists, clinics, and hospitals via voice, video call & chat.">
<meta property="og:image" content="../assets/img/preview-banner.jpg">
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="https://doccure.dreamstechnologies.com/html/">
<meta property="twitter:url" content="https://doccure.dreamstechnologies.com/html/">
<meta name="twitter:title" content="Doctors Appointment HTML Website Templates | Doccure">
<meta name="twitter:description" content="The responsive professional Doccure cardiology care template features are the best for scheduling  appointments with  top cardiologists, clinics, and hospitals via voice, video call & chat.">
<meta name="twitter:image" content="assets/img/preview-banner.jpg">
<title>Doccure</title>

<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="../assets/css/feather.css">

<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="../assets/css/owl.carousel.min.css">

<link rel="stylesheet" href="../assets/css/aos.css">

<link rel="stylesheet" href="../assets/css/custom.css">
</head>


<div class="content top-space">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
            
            <div class="account-content">
            <div class="row align-items-center justify-content-center">
            <div class="col-md-7 col-lg-6 login-left">
            <img src="../assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">
            </div>
            <div class="col-md-12 col-lg-6 login-right">
            <div class="login-header">
            <h3>Login <span>Docteur</span></h3>
            </div>
            @if ($errors->any())
            <div style="background-color: rgb(230, 105, 105);">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:white;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
            <form action="{{route('login_store')}}" method="post">
            @csrf 
            @method('post')
            <div class="mb-3 form-focus">
                <input type="text" name="pseudo" class="form-control floating">
                <label class="focus-label">identifiant</label>
            </div>
            <div class="mb-3 form-focus">
                <input type="password" name="password" class="form-control floating">
                <label class="focus-label">Password</label>
            </div>
           
            <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Connexion</button>
        
            </form>
            </div>
            </div>
            </div>
        
        </div>
        </div>
    </div>
    </div>
