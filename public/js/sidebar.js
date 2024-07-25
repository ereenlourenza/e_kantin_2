// Function to show the sidebar
function showSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.left = '0';
  }
  
  // Function to hide the sidebar
  function hideSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.left = '-229px';
  }
  
  // Event listener to close sidebar when click outside sidebar
  document.addEventListener('click', function(event) {
    const sidebar = document.querySelector('.sidebar');
    const openSidebarButtons = document.querySelectorAll('.openSidebarButton');
    let isClickInsideSidebar = false;
  
    openSidebarButtons.forEach(function(button) {
      if (button.contains(event.target)) {
        isClickInsideSidebar = true;
      }
    });
  
    if (!sidebar.contains(event.target) && !isClickInsideSidebar) {
      hideSidebar();
    }
  });
  
  // Function to show menu (replace with your logic)
  function showMenu() {
    // Logic to show menu content
  }
  
  // Function to show About us (replace with your logic)
  function showAbout() {
    // Logic to show About us content
  }
  
  // Function to logout (replace with your logic)
  function logout() {
    // Logic to logout
    // Example: Redirect to login page
    window.location.href = "loginCustomer";
  }
  