// Function to fetch users data from customers.php using AJAX
function fetchUsers() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'customers.php', true);

    xhr.onload = function() {
        if (xhr.status == 200) {
            var users = JSON.parse(xhr.responseText);
            displayUsers(users);
        } else {
            console.error('Error fetching users: ' + xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Error fetching users: Network error');
    };

    xhr.send();
}

// Function to display users data in the table
function displayUsers(users) {
    var tableBody = document.getElementById('user-table-body');
    tableBody.innerHTML = ''; // Clear existing data

    users.forEach(function(user) {
        var row = tableBody.insertRow();
        row.insertCell().textContent = user.id;
        row.insertCell().textContent = user.username;
        row.insertCell().textContent = user.password;
        row.insertCell().textContent = user.fullName || 'N/A';
        row.insertCell().textContent = user.email || 'N/A';
    });
}

// Call fetchUsers function when the page loads
window.onload = fetchUsers;
