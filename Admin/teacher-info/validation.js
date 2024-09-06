document.addEventListener('DOMContentLoaded', function () {
    console.log("Script loaded and ready."); //debugging purposes*
  
    const TidInput = document.getElementById('Tid');
    TidInput.addEventListener('input', function () {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  
    const fnameInput = document.getElementById('fname');
    const mnameInput = document.getElementById('mname');
    const lnameInput = document.getElementById('lname');
  
    fnameInput.addEventListener('input', validateName);
    mnameInput.addEventListener('input', validateName);
    lnameInput.addEventListener('input', validateName);
  
    function validateName(event) {
      const input = event.target;
      const regex = /^[a-zA-ZÑñ\s]+$/; 
      if (!regex.test(input.value)) {
        input.value = input.value.replace(/[^a-zA-ZÑñ\s]/g, '');
      }
    }
  
    const emailInput = document.getElementById('email');
    emailInput.addEventListener('input', validateEmail);
  
    function validateEmail(event) {
      const input = event.target;
      const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; 
      if (!regex.test(input.value)) {
        input.value = input.value.replace(/[^a-zA-Z0-9._%+-@]/g, ''); 
      }
    }

    const usernameInput = document.getElementById('username');
    usernameInput.addEventListener('input', validateUsername);
  
    function validateUsername(event) {
      const input = event.target;
      const regex = /^[a-zA-Z0-9]+$/; // Allow only letters and numbers
      if (!regex.test(input.value)) {
        input.value = input.value.replace(/[^a-zA-Z0-9]/g, ''); // Remove invalid characters
      }
    }
  });