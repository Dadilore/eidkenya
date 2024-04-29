@extends('includes.main')
@section('pageTitle', 'Change of particulars')
@section('content')

<div class="container">
       <div class="row" style="margin-top:50px">
             <div class="col-md-11  justify-content-center">
                 <h1>ID Application</h1><hr>
                 @livewire('change_of_particulars')
             </div>
       </div>
   </div>

   <!-- Add this JavaScript snippet at the bottom of your Blade file -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let startTime = localStorage.getItem('startTime');
        let timerInterval;

        if (!startTime) {
            startTime = new Date();
            localStorage.setItem('startTime', startTime);
        } else {
            startTime = new Date(startTime);
        }

        function startTimer() {
            timerInterval = setInterval(updateTimer, 1000); // Update timer every second
        }

        function updateTimer() {
            const currentTime = new Date();
            const elapsedTime = currentTime - startTime; // Time difference in milliseconds

            // Calculate hours, minutes, and seconds
            const hours = Math.floor(elapsedTime / (1000 * 60 * 60));
            const minutes = Math.floor((elapsedTime % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((elapsedTime % (1000 * 60)) / 1000);

            // Display the timer in a suitable format
            const timerDisplay = document.getElementById('timer');
            timerDisplay.textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }

        // Start the timer when the page loads
        startTimer();

        // Pause and resume timer when the window loses and regains focus
        window.addEventListener('blur', function () {
            clearInterval(timerInterval); // Pause the timer when the window loses focus
        });

        window.addEventListener('focus', function () {
            startTimer(); // Resume the timer when the window regains focus
        });

        // Reset timer when the user logs out
        window.addEventListener('unload', function () {
            localStorage.removeItem('startTime'); // Remove stored start time from local storage
        });
    });
</script>

@endsection