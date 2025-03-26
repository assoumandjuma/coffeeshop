
import { initializeApp } from "https://www.gstatic.com/firebasejs/11.4.0/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.4.0/firebase-auth.js";


const firebaseConfig = {
  apiKey: "AIzaSyDAHOslEKeBFHlFXBspti_k5O1pZ8hozIQ",
  authDomain: "coffeeshop-39b4e.firebaseapp.com",
  projectId: "coffeeshop-39b4e",
  storageBucket: "coffeeshop-39b4e.firebasestorage.app",
  messagingSenderId: "38590993143",
  appId: "1:38590993143:web:c78c366696ea69537db9f2",
  measurementId: "G-ZWBNVE51FV"
};


const app = initializeApp(firebaseConfig);
const auth = getAuth(app);


document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  
  form.addEventListener("submit", function (e) {
    e.preventDefault(); 


    const firstName = document.querySelector('input[name="firstname"]').value;
    const secondName = document.querySelector('input[name="secondname"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;
    const confirmPassword = document.querySelector('input[name="confirmpassword"]').value;

  
    if (password !== confirmPassword) {
      alert("Passwords do not match!");
      return;
    }

    
    createUserWithEmailAndPassword(auth, email, password)
      .then((userCredential) => {
        
        const user = userCredential.user;
        alert("Registration successful! Welcome, " + firstName + " " + secondName);
        window.location.href = "admin.php"; 
      })
      .catch((error) => {
        alert("Error: " + error.message);
      });
  });
});
