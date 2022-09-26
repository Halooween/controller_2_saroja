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
                    <h2 class="mt-5">Update Page</h2>
                    <form action="{{ route('page.update', $page->id) }}" method="post" >
                        @method('PUT')
                        @csrf 
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control " value="<?php echo $page->title ?>" >
                        </div>
                        <div class="form-group">
                            <label for="slug">Comments</label>
                            <input type="text" name="comments" class="form-control " value="<?php echo $page->comments ?>" >
                        </div>
                        <div class="form-group">
                            <label>Likes</label>
                            <input type="number" name="likes" class="form-control " value="<?php echo $page->likes ?>" >
                        </div>
                       
                        <div class="form-group">
                            <label>Shares</label>
                            <input type="number" name="shares" class="form-control " value="<?php echo $page->shares?>" >
                        </div>


                        <input type="submit" name="create" class="btn btn-primary" value="Submit">
                        <a href="{{ route('page.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    
</body>
</html>


