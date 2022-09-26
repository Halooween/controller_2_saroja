<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      form{
        height: auto;
        width: 60%;
        margin: 100px;
      }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 form">
                    <h2 class="mt-5">Update Blog</h2>
                    <form action="{{ route('blog.update', $blog->blog_id) }}" method="post" >
                        @method('PUT')
                        @csrf 
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control " value="<?php echo $blog->title ?>" >
                        </div>
                        <div class="form-group">
                            <label for="slug">Content</label>
                            <input type="text" name="content" class="form-control " value="<?php echo $blog->content ?>" >
                        </div>


                        <input type="submit" name="create" class="btn btn-primary" value="Submit">
                        <a href="{{ route('blog.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    
</body>
</html>


