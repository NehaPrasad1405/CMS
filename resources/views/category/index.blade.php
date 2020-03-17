<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <div class="jumbotron">

    <h1>All Categories</h1>
    <a href="/categories/create"> <button class="btn btn-info" style="margin-left:700px">Add new category</button></a>

    <table class="table table-dark" style="margin-top:50px">

    <tr>
      <th>Name</th>
      <th>Blog</th>
      <th>Created on</th>
      <th>Updated on</th>
      <th>Action</th>
    
    </tr>

    
    @foreach($categories as $category)
<tr>
    <td>{{ $category->name}}</td>

    <td>
    {{ $category->blogs->count()}}

    </td>
    <td> {{ $category->created_at }}</td>
    <td> {{ $category->updated_at }} </td>
    <td class="form-group row" >
    <a href="/categories/{{$category->id}}/show"><button class="btn btn-success"  style="margin-left:50px">Show</button></a>
    <a href="/categories/{{$category->id}}/edit" ><button class="btn btn-warning" style="margin-left:50px">Edit</button></a>
    <form action="categories/{{$category->id}}/destroy" method="POST">
    @csrf()
    @method('delete')
    <button class="btn btn-danger" style="margin-left:50px">Delete</button></td>
    
    </form>
    
    
    </tr>
    @endforeach

  </table>
  {{$categories->links()}}
  
    </div>

    </div>
</body></html>