<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>
<body>
<h1>Create Category</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="parent_id">Parent Category:</label>
    <select name="parent_id" id="parent_id">
        <option value="">None</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
            >{{ $category->name }}</option>
            @include('categories.partials.option', ['children' => $category->children, 'prefix' => '-'])
        @endforeach
    </select>
    <button type="submit">Create</button>
</form>
</body>
</html>
