
        // Populate form for editing
        function editMember(id, name, date, borrowedAmount) {
            document.getElementById('action').value = 'update';
            document.getElementById('id').value = id;
            document.getElementById('name').value = name;
            document.getElementById('date').value = date;
            document.getElementById('borrowed_amount').value = borrowedAmount;
            document.getElementById('borrowed_interest').value = (borrowedAmount * 0.02).toFixed(2);

            openModal();
        }

// Function to open the modal and overlay
function openModal() {
    document.getElementById("modal").style.display = "block";
    document.getElementById("overlay").style.display = "block";
  }
  
  // Function to close the modal and overlay
  function closeModal() {
    document.getElementById("modal").style.display = "none";
    document.getElementById("overlay").style.display = "none";
  }

        // DOM Content Loaded Event
        document.addEventListener('DOMContentLoaded', () => {
            // DOM Elements
            const addMembersButton = document.getElementById('addMembersButton');
            const closePopup = document.getElementById('closePopup');
            const overlay = document.getElementById('overlay');

            // Show modal for adding new members
            addMembersButton.addEventListener('click', () => {
                document.getElementById('action').value = 'add';
                document.getElementById('id').value = '';
                document.getElementById('name').value = '';
                document.getElementById('date').value = '';
                document.getElementById('borrowed_amount').value = '';
                document.getElementById('borrowed_interest').value = '';

                openModal();
            });

            // Close modal when clicking the close button
            closePopup.addEventListener('click', (e) => {
                e.preventDefault();
                closeModal();
            });

            // Close modal when clicking on the overlay
            overlay.addEventListener('click', closeModal);
        });

        // Auto-calculate interest
        document.getElementById('borrowed_amount').addEventListener('input', function () {
            const borrowedAmount = parseFloat(this.value) || 0;
            document.getElementById('borrowed_interest').value = (borrowedAmount * 0.02).toFixed(2);
        });