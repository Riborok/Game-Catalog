let receiverSelect = document.getElementById('receiver');
let sendToAllCheckbox = document.getElementById('send-to-all');

sendToAllCheckbox.addEventListener('change', function() {
    if (this.checked) {
        let optionAllUsers = document.createElement('option');
        optionAllUsers.value = 'all';
        optionAllUsers.text = 'All Users';
        receiverSelect.appendChild(optionAllUsers);

        receiverSelect.selectedIndex = receiverSelect.options.length - 1;
    } else
        receiverSelect.remove(receiverSelect.options.length - 1);

    receiverSelect.disabled = this.checked;
});
