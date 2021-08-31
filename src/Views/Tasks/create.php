<h1>Create task</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label class="float-left" for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title">
    </div>

    <div class="form-group">
        <label class="float-left" for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/mvc/tasks/index" class="btn btn-danger ml-2">Cancel</a>
</form>