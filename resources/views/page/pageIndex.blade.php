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
                            <h2 class="pull-left">Page Details</h2>
                            <a href="{{ route('page.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New records</a>
                        </div>
    
                        <table class="table table-bordered table-striped " id="table_id">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Comments</th>
                                    <th>Likes</th>
                                    <th>Shares</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    
                            </tbody>
                            @foreach ($datas as $data)
                            
                                <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->comments }}</td>
                                <td>{{ $data->likes}}</td>
                                <td>{{ $data->shares}}</td>
                                <td>
                                    <a href="{{  route('page.show',$data) }}" class="mr-3" title="View Record" data-toggle="tooltip"><span  class="fa fa-eye"></span></a>
                                    <a href="{{  route('page.edit',$data) }}" class="mr-3" title="update Record" data-toggle="tooltip"><span class="fa fa-edit"></span></a>
                                    <form method="POST" action="{{ route('page.destroy', $data->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                   
                                </td>
    
                                </tr>
                            @endforeach
    
                        </table>
                    
                    </div>
                </div>
            </div>
        </div> 
    </main>
    
    
</body>
</html>


