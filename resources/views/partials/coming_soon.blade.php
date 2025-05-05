<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Tomorrow!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            overflow: hidden;
        }
        
        .container {
            max-width: 800px;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }
        
        h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .countdown {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .countdown-item {
            background: rgba(255, 255, 255, 0.2);
            padding: 1rem;
            border-radius: 8px;
            min-width: 80px;
            backdrop-filter: blur(5px);
        }
        
        .countdown-number {
            font-size: 2.5rem;
            font-weight: bold;
        }
        
        .countdown-label {
            font-size: 0.9rem;
            text-transform: uppercase;
            opacity: 0.7;
        }
        
        /* Animated Background Elements */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 15s infinite ease-in-out;
        }
        
        .circle:nth-child(1) {
            width: 150px;
            height: 150px;
            top: 10%;
            left: 10%;
        }
        
        .circle:nth-child(2) {
            width: 250px;
            height: 250px;
            bottom: 5%;
            right: 10%;
            animation-delay: 2s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0);
            }
            50% {
                transform: translateY(-20px) translateX(20px);
            }
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
            
            p {
                font-size: 1.2rem;
            }
            
            .countdown {
                gap: 0.8rem;
            }
            
            .countdown-item {
                min-width: 70px;
                padding: 0.8rem;
            }
            
            .countdown-number {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Animated background elements -->
    <div class="circle"></div>
    <div class="circle"></div>
    
    <!-- Main content -->
    <div class="container">
        <img class="logo" src="{{ asset('static/media/logo.svg') }}" alt="" />
        <h1>Launching Soon!</h1>
        <p>We're putting the finishing touches on our new site. Check back soon!</p>
        
        <!-- <div class="countdown">
            <div class="countdown-item">
                <div class="countdown-number" id="hours">00</div>
                <div class="countdown-label">Hours</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="minutes">00</div>
                <div class="countdown-label">Minutes</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="seconds">00</div>
                <div class="countdown-label">Seconds</div>
            </div>
        </div> -->
    </div>
    
    <script>
        // Set launch time to tomorrow at 9:00 AM
        const launchDate = new Date();
        launchDate.setDate(launchDate.getDate() + 1);
        launchDate.setHours(9, 0, 0, 0);
        
        function updateCountdown() {
            const now = new Date();
            const diff = launchDate - now;
            
            // If launch time has arrived
            if (diff <= 0) {
                window.location.reload(); // Will redirect to actual site
                return;
            }
            
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        }
        
        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>
</body>
</html>