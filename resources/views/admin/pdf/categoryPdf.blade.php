<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Pdf</title>
    <style>
        #category{
            border-collapse:collapse;
            width:100%;
        }
        #category td,#category th{
            border:1px solid black;
            padding:8px;
        }
    </style>

</head>
<body>
    
    <table id="category">
    <thead>
        <tr>
            <th>Category Name</th>
            <th>Slug</th>
            <th>parent_id</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->category_name}}</td>
            <td>{{$category->slug}}</td>
            <td>{{$category->parent_id}}</td>
            <td>{{$category->status}}</td>
        </tr>
        @endforeach
    </tbody>


    </table>
    
</body>
</html>