<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call in Sick</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 20px;
            width: 80%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label,
        input,
        textarea {
            display: block;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            font-size: 18px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

 
    <div class="container">
       @if ($message = Session::get('success'))
        <script>
        setTimeout(function() {
        window.location.href = "{{ url('/dashboard') }}";
        }, 3000); // 1000 milliseconds = 1 second
        </script>
         @endif
           <x-message />


        <h1>Ziek melden</h1>
        <form action="{{ route('employee.sickreport') }}" method="POST">
            @csrf
            <label for="date">Datum:</label>
            <input type="date" id="date" name="date" required>

            <label for="reason">Reden:</label>
            <textarea id="reason" name="reason" placeholder="Reden" required></textarea>

            <button type="submit">Verzenden</button>
        </form>
    </div>
</body>

</html>
