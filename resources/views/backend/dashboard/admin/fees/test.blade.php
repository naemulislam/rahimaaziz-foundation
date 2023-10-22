<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$name}}</h1>
    <table class="inventory">
            <thead>
                <tr>
                    <th><span>S. No</span></th>
                    <th><span>Month</span></th>
                    <th><span>Amount</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>1</td>
                    <td>{{$row->month}}</td>
                    <td>300</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    
</body>
</html>