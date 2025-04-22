<!-- resources/views/user/form.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h1>Submit Your Details</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div style="color: green;">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- Form -->
    <form action="{{ url('/user/submit') }}" method="POST">
        @csrf
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="{{ old('username') }}" required>
        <br>

        <label for="phone">Phone:</label>
        {{-- <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required> --}}

        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
