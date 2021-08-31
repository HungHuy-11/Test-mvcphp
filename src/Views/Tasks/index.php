<h1>List Tasks</h1>
<table class="table table-striped custab">
    <a href="/mvc/tasks/create/" class="btn btn-primary btn-xs float-right mb-3"><b>+</b> Add new task</a>
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Description</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <?php
    foreach ($tasks as $task)
    {
        echo '<tr>';
        echo "<td>" . $task['id'] . "</td>";
        echo "<td>" . $task['title'] . "</td>";
        echo "<td>" . $task['description'] . "</td>";
        echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/mvc/tasks/edit/" . $task["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/mvc/tasks/delete/" . $task["id"] . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Delete</a></td>";
        echo "</tr>";
    }
    ?>
</table>