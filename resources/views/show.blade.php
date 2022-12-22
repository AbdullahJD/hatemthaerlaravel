<!DOCTYPE html>
<html>
<head>
    <title>{{websiteTitle()}}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>HTML Table</h2>

<table>
    <tr>
        <th>الصورة</th>
        <th>الاسم</th>
        <th>السعر</th>
        <th>التعليق</th>
        <th>تعديل</th>
    </tr>
    @foreach($customers as $customer)
    <tr>
        @if(empty($customer->image))
            <td><img src="{{asset('img/default.png')}}" style="height: 50px; width: 50px;"></td>
        @else
            <td><img src="{{asset(imagePath().$customer->image)}}" style="height: 100px;"></td>
        @endif

        <td>{{$customer->name}}</td>
        <td>{{$customer->price}}</td>
        <td>{{$customer->comment}}</td>
            <td><a href="{{route('updateDataForm', ['id'=>$customer->id])}}">تعديل</a></td>
    </tr>
    @endforeach
</table>

</body>
</html>

