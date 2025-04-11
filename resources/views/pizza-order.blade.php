<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pizza Ordering</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
            background: #f0f0f0;
        }

        .box {
            background: white;
            padding: 2rem;
            max-width: 500px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 0.5rem 0;
        }

        select,
        input[type="checkbox"] {
            margin-top: 0.5rem;
        }

        button {
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="box">
        <h2>Pizza Order</h2>

        <form action="{{ route('pizza.calculate') }}" method="POST">
            @csrf

            <label for="size">Choose Pizza Size:</label>
            <select name="size" id="size">
                <option value="small">Small - RM15</option>
                <option value="medium">Medium - RM22</option>
                <option value="large">Large - RM30</option>
            </select>

            <label>
                <input type="hidden" name="pepperoni" value="0">
                <input type="checkbox" name="pepperoni" value="1"> Add Pepperoni
            </label>
            <label>
                <input type="hidden" name="extra_cheese" value="0">
                <input type="checkbox" name="extra_cheese" value="1"> Add Extra Cheese
            </label>

            <button type="submit">Calculate Total</button>
        </form>

        @if(session('total'))
            <h3>Total Bill: RM{{ session('total') }}</h3>
        @endif
    </div>
</body>

</html>