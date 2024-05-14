document.addEventListener("DOMContentLoaded", function() {
    // Fetch messages from PHP file
    fetch('Message.php')
    .then(response => response.json())
    .then(data => {
        const messageTableBody = document.getElementById('messageTableBody');
        // Clear existing table rows
        messageTableBody.innerHTML = '';

        // Populate table with messages
        data.forEach(message => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${message.name}</td>
                <td>${message.email}</td>
                <td>${message.subject}</td>
                <td>${message.message}</td>
                
            `;
            messageTableBody.appendChild(row);
        });
    })
    .catch(error => console.error('Error fetching messages:', error));
});
