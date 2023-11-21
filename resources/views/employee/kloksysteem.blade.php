<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clock In/Out</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #clock-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 20px;
        }

        #clock {
            font-size: 48px;
            font-weight: bold;
        }

        #clock-buttons {
            margin-top: 20px;
        }

        #clock-buttons button {
            padding: 10px 20px;
            font-size: 18px;
            margin: 0 10px;
            border: none;
            cursor: pointer;
        }

        #clock-buttons button:hover {
            background-color: #007BFF;
            color: #fff;
        }

    </style>
</head>
<body>
  
        {{-- <x-message /> --}}

    <div id="clock-container">
        <div id="clock">00:00:00</div>
        <div id="clock-buttons">




            <form action="{{ route('employee.klokin') }}" method="POST" @if ($status == 1)
                style="display: none;"

            @endif>
                @csrf
                <button type="submit" name="clock-in" id="clock-in">Clock In</button>

            </form>
            <form action="{{ route('employee.klokout') }}" method="POST" @if ($status == 0)
                style="display: none;"

            @endif>
                @csrf
                <button type="submit" name="clock-out" id="clock-out">Clock Out</button>
            </form>
        </div>
    </div>

    <script>
        const clock = document.getElementById('clock');
        const clockInButton = document.getElementById('clock-in');
        const clockOutButton = document.getElementById('clock-out');

        let clockInterval;

        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            clock.textContent = `${hours}:${minutes}:${seconds}`;
        }

        clockInterval = setInterval(updateTime, 1000);
        updateTime();

        // clockInButton.addEventListener('click', () => {
        //     // Handle clocking in logic here
        //     alert('You have clocked in.');
        // });

        // clockOutButton.addEventListener('click', () => {
        //     // Handle clocking out logic here
        //     alert('You have clocked out.');
        // });
    </script>
</body>
</html>
