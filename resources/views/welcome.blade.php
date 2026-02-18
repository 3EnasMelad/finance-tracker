<!-- resources/views/welcome.blade.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; }
        nav { background: #fff; padding: 1rem 2rem; display:flex; justify-content:space-between; align-items:center; box-shadow:0 2px 5px rgba(0,0,0,0.1);}
        .nav-left {display:flex; align-items:center; gap:.75rem;}
        .nav-left img {width: 80px; transition: transform .5s;}
        .nav-left img:hover {transform: rotate(15deg) scale(1.2);}
        .nav-left span {font-size:2rem; font-weight:bold; transition: transform .3s;}
        .nav-left span:hover {transform:translateY(-5px) scale(1.05); color:#3b82f6;}
        .nav-right a {margin-left:.5rem; padding:.5rem 1rem; border-radius:.5rem; text-decoration:none; color:#fff; transition:.3s;}
        .nav-right a.login {background:#3b82f6;} .nav-right a.login:hover {background:#2563eb;}
        .nav-right a.register {background:#10b981;} .nav-right a.register:hover {background:#059669;}
        .main-section {display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; height:calc(100vh - 80px); padding:0 1rem;}
        .main-section h1 {font-size:4rem; margin-bottom:1rem; color:#111827; transition:transform .3s, color .3s;}
        .main-section h1:hover {transform:translateY(-10px) scale(1.05); color:#3b82f6;}
.main-section p {
    font-size: 1.5rem;
    color: #4b5563;
    margin-bottom: 2rem; /* المسافة أسفل النص */
}

.main-section img {
    width: 300px;
    margin-top: 2rem; /* مساحة فوق الصورة مباشرة */
    animation: bounce 2s infinite;
}
        @keyframes bounce {0%,100% {transform:translateY(0);} 50% {transform:translateY(-20px);}}
    </style>
</head>
<body>
    <nav>
        <div class="nav-left">
            <img src="https://w7.pngwing.com/pngs/326/1004/png-transparent-cois-dollar-investment-money-finance-icon.png" alt="Logo">
            <span>Finance Tracker</span>
        </div>
        <div class="nav-right">
            <a href="{{ route('login') }}" class="login">Login</a>
            <a href="{{ route('register') }}" class="register">Register</a>
        </div>
    </nav>

    <div class="main-section">
        <h1>Welcome to Finance Tracker</h1>
        <p>Track your incomes, expenses, and budgets easily!</p>
        <img src="https://w7.pngwing.com/pngs/326/1004/png-transparent-cois-dollar-investment-money-finance-icon.png" alt="Finance Illustration">
    </div>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; }
        nav { background: #fff; padding: 1rem 2rem; display:flex; justify-content:space-between; align-items:center; box-shadow:0 2px 5px rgba(0,0,0,0.1);}
        .nav-left {display:flex; align-items:center; gap:.75rem;}
        .nav-left img {width: 80px; transition: transform .5s;}
        .nav-left img:hover {transform: rotate(15deg) scale(1.2);}
        .nav-left span {font-size:2rem; font-weight:bold; transition: transform .3s;}
        .nav-left span:hover {transform:translateY(-5px) scale(1.05); color:#3b82f6;}
        .nav-right a {margin-left:.5rem; padding:.5rem 1rem; border-radius:.5rem; text-decoration:none; color:#fff; transition:.3s;}
        .nav-right a.login {background:#3b82f6;} .nav-right a.login:hover {background:#2563eb;}
        .nav-right a.register {background:#10b981;} .nav-right a.register:hover {background:#059669;}
        .main-section {display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; height:calc(100vh - 80px); padding:0 1rem;}
        .main-section h1 {font-size:4rem; margin-bottom:1rem; color:#111827; transition:transform .3s, color .3s;}
        .main-section h1:hover {transform:translateY(-10px) scale(1.05); color:#3b82f6;}
        .main-section p {font-size: 1.5rem; color: #4b5563; margin-bottom: 2rem;}
        .main-section img {width: 300px; margin-top: 2rem; animation: bounce 2s infinite;}
        @keyframes bounce {0%,100% {transform:translateY(0);} 50% {transform:translateY(-20px);}}
    </style>
</head>
<body>
    <nav>
        <div class="nav-left">
            <img src="https://w7.pngwing.com/pngs/326/1004/png-transparent-cois-dollar-investment-money-finance-icon.png" alt="Logo">
            <span>Finance Tracker</span>
        </div>
       
   <div class="nav-right">
    @auth
                <a href="{{ route('dashboard') }}" class="login">Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="login">Login</a>
        <a href="{{ route('register') }}" class="register">Register</a>
    @endauth
</div>


    </nav>

    <div class="main-section">
        <h1>Welcome to Finance Tracker</h1>
        <p>Track your incomes, expenses, and budgets easily!</p>
        <img src="https://w7.pngwing.com/pngs/326/1004/png-transparent-cois-dollar-investment-money-finance-icon.png" alt="Finance Illustration">
    </div>
</body>
</html>

