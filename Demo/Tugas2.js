document.getElementById('add-btn').addEventListener('click', function() {
    const input = document.getElementById('todo-input');
    const task = input.value.trim();

    if (task === "") {
        alert("Please enter a task");
        return;
    }

    // Create a new list item
    const listItem = document.createElement('li');
    
    // Create a span to hold the task text
    const taskText = document.createElement('span');
    taskText.textContent = task;
    listItem.appendChild(taskText);

    // Create a container for buttons
    const buttonContainer = document.createElement('div');
    buttonContainer.classList.add('button-container');

    // Create edit button
    const editButton = document.createElement('button');
    editButton.textContent = 'Edit';
    editButton.classList.add('edit-btn');
    editButton.addEventListener('click', function() {
        const newTask = prompt("Edit your task:", taskText.textContent);
        if (newTask !== null && newTask.trim() !== "") {
            taskText.textContent = newTask.trim();
        }
    });

    // Create delete button
    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.addEventListener('click', function() {
        listItem.remove();
    });

    // Append buttons to the button container
    buttonContainer.appendChild(editButton);
    buttonContainer.appendChild(deleteButton);

    // Append the button container to the list item
    listItem.appendChild(buttonContainer);

    // Add the list item to the task list
    document.getElementById('todo-list').appendChild(listItem);

    // Clear the input field
    input.value = "";
});
