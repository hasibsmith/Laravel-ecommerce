<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Classes and Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: rgb(255, 255, 255);
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        caption {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <table>
        <caption>School Classes and Students</caption>
        <thead>
            <tr>
                <th>Serial No.</th>
                <th>Class Name</th>
                <th>Student Name</th>
            </tr>
        </thead>
        <tbody>
   @php
       $serial =1;
      
   @endphp

       @foreach ($users as $item)
       <tr>
        <td>{{$serial++}}</td>
        <td> {{$item->schoolClass->class_name}} </td>
        <td> {{$item->student_name ?? 'No Student'}} </td>

        {{-- <td>  
            <ul>
            @foreach ($item->student as $student_info)  
            <li>{{ $student_info->student_name }}</li>  
            @endforeach
            </ul>  
         </td> --}}
       
    </tr>
       @endforeach

        </tbody>
    </table>
</body>
</html>
