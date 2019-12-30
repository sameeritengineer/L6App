<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Create New Post</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('post.store')}}">
	@csrf
	<input type="text" name="title">
	@if ($errors->has('title'))
	@foreach ($errors->get('title') as $error)
     <p>{{ $error }}</p>
    @endforeach
	@endif
	<br>
	<textarea name="content" cols="30" rows="30"></textarea>
	@if ($errors->has('content'))
	@foreach ($errors->get('content') as $error)
     <p>{{ $error }}</p>
    @endforeach
	@endif
	<br>
	<input type="submit" name="submit">
</form>

</body>
</html>
