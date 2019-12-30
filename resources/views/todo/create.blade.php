<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form method="POST" action="{{route('todo.store')}}">
	 @csrf
	<p>Title</p><input type="text" name="title">
	@if ($errors->has('title'))
	@foreach ($errors->get('title') as $error)
     <p>{{ $error }}</p>
    @endforeach
	@endif
	<br>
	<br><br>
	<p>Message</p><textarea name="content" cols="30" rows="30"></textarea>
	@if ($errors->has('content'))
	@foreach ($errors->get('content') as $error)
     <p>{{ $error }}</p>
    @endforeach
	@endif
	<br><br>
	<input type="submit" name="submit">
	</form>
</body>
</html>