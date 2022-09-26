<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      .table{
        height: auto;
        width: 100%;
        /* margin: 100px; */
      }

    </style>
</head>
<body>
    <main role="main" class="container">

        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">Blog Details</h2>
                            
                            <a href="{{ route('blog.create') }}" class="btn btn-success pull-right">Create Blog</a>
                        </div>
    
                        <table class="table table-bordered table-striped " id="table_id">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Contents</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blog as $data)
                                <tr>
                                    <td>{{ $data->blog_id }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->content }}</td>
                                    <td>
                                       
                                      
                                        <form method="POST" action="{{ route('blog.destroy', $data->blog_id) }}">
                                            @method('DELETE')
                                            @csrf
                                            
                                            <a href="{{  route('blog.comment.index',$data->blog_id) }}" class="btn btn-info btn-sm" title="Index" data-toggle="tooltip">Comments</a>
                                      
                                            <a href="{{  route('blog.show',$data->blog_id) }}" class=" btn btn-primary btn-sm" title="View Record" data-toggle="tooltip">View</a>
                                            <a href="{{  route('blog.edit',$data->blog_id) }}" class=" btn btn-primary btn-sm" title="update Record" data-toggle="tooltip">Edit</a>

                                            
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
        
                                    </tr> 
                                @endforeach 
                            </tbody> 
                            
    
                        </table>
                    
                    </div>
                </div>
            </div>
        </div> 
    </main>
    
    
</body>
</html>


