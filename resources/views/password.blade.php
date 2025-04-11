<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Generator</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 2rem; background: #f0f0f0; }
        .box { background: white; padding: 2rem; max-width: 500px; margin: auto; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        label { display: block; margin: 0.5rem 0; }
        input[type="text"] { width: 100%; padding: 0.5rem; margin-top: 1rem; font-size: 1.2rem; }
        button { margin-top: 1rem; padding: 0.5rem 1rem; font-size: 1rem; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Custom Password Generator</h2>

        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <form action="{{ route('generate.password') }}" method="POST">
            @csrf

            <label>
                <input type="checkbox" name="lowercase" checked> Lowercase Letters
            </label>
            <label>
                <input type="checkbox" name="uppercase" checked> Uppercase Letters
            </label>
            <label>
                <input type="checkbox" name="numbers" checked> Numbers
            </label>
            <label>
                <input type="checkbox" name="symbols" checked> Symbols
            </label>

            <label>
                Minimum Length:
                <input type="number" name="length" value="12" min="4" max="100">
            </label>

            <button type="submit">Generate Password</button>
        </form>

        @if(session('password'))
            <label>
                Generated Password:
                <input type="text" value="{{ session('password') }}" readonly>
            </label>
        @endif
    </div>
</body>
</html>
