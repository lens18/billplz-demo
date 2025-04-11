<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snail Climbing Calculation</title>
</head>
<body>
    <h1>Snail Climbing to the Top of the Well</h1>
    
    <p>- Well Depth is 11 meter</p>
    <p>- Climb up 3 meters a day</p>
    <p>- Drop 2 meters at night</p>
    
    <form action="{{ route('snail.calculate') }}" method="POST">
        @csrf
        <button type="submit">Calculate</button>
    </form>

    @if(isset($days))
        <h2>Result:</h2>
        <p>The snail will take {{ $days }} days to climb out of the well.</p>
    @endif
</body>
</html>