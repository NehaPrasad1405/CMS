<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/b200a985f2.js" crossorigin="anonymous"></script>
<style>

</style>

</head>
<body>
<form action="" method="GET">
    <div class="container">
    <div class="jumbotron">

    <input type="text" placeholder="Search Blog" name="searchB" value="{{$searchB}}" style="width:200px">
    
    <input type="text" placeholder="Search Category" name="searchC" value="{{$category}}" style="width:200px; margin-top:-35px">
    <button type="submit"><span class="fa fa-search form-control-feedback"></span></button>
    </form>
  

    <h1 style="margin-top:30px">All Blogs</h1>
    <a href="/blogs/create" class="btn btn-info" style="margin-left:700px; margin-top:50px">Add new Blog</a>
  
    <table class="table table-dark" style="margin-top:20px">

    <tr>
      <th>Name</th>
      <th>Category</th>
      <th>Action</th>
    
    </tr>

    
@foreach($blogs as $blog)
<tr>
    <td>{{ $blog->title }}</td>
    <td>{{ $blog->category->name }}</td>
    <td class="form-group row" >
    <a href="blogs/{{$blog->id}}/show"><i class="fas fa-eye" style="margin-left:50px"></i></a>
    <a href="blogs/{{$blog->id}}/edit"><i class="fas fa-edit"style="margin-left:50px"></i></a>
     
     <form action="blogs/{{$blog->id}}/destroy" method="POST">
    @csrf()
    @method('DELETE')
    <button type="submit" style="margin-left:40px" class="fas fa-trash"></button>
   
  
    </form>
    </td>
    
    </tr>
    @endforeach

  </table>
    {{$blogs->appends($_GET)->links()}}
 
    </div>

    </div>
    
</body></html>