// Function to populate the form with member data for editing
function editMember(id, name, shares) {
  document.getElementById('action').value = 'update';
  document.getElementById('id').value = id;
  document.getElementById('name').value = name;
  document.getElementById('shares').value = shares;

  // Open the modal and overlay
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
document.addEventListener("DOMContentLoaded", () => {
  // DOM Elements
  const addMembersButton = document.getElementById("addMembersButton");
  const closePopup = document.getElementById("closePopup");
  const overlay = document.getElementById("overlay");

  // Show modal for adding new members
  addMembersButton.addEventListener("click", () => {
      document.getElementById('action').value = 'add'; // Set the action to "add"
      document.getElementById('id').value = ""; // Clear ID field
      document.getElementById('name').value = ""; // Clear Name field
      document.getElementById('shares').value = ""; // Clear Shares field
      openModal();
  });

  // Close modal when clicking the close button
  closePopup.addEventListener("click", (e) => {
      e.preventDefault(); // Prevent form submission
      closeModal();
  });

  // Close modal when clicking on the overlay
  overlay.addEventListener("click", closeModal);
});
