<?php
// Set Kathmandu timezone
date_default_timezone_set('Asia/Kathmandu');

// Target date & time
$targetDate = '2026-2-24 08:30:00';

// Convert to Unix timestamp (seconds)
$targetTimestamp = strtotime($targetDate) * 1000; // JS uses milliseconds
?>
<head>
    <style>
        .timer {
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 1px;
        }
    </style>
</head>

<div class="timer" id="countdown">Loading...</div>

<script>
    const targetTime = <?php echo $targetTimestamp; ?>;

    function startCountdown() {
        const now = new Date().getTime();
        const distance = targetTime - now;

        if (distance <= 0) {
            document.getElementById("countdown").innerHTML = "⏰ Time Reached!";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML =
            `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }

    startCountdown();
    setInterval(startCountdown, 1000);
</script>