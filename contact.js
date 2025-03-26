(function() {
    
    emailjs.init("gzQ45xKNMDCtEbXFZ"); 
})();

window.onload = function() {
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const button = this.querySelector('button');
        const originalText = button.textContent;
        button.textContent = 'Sending...';
        button.disabled = true;

        
        const templateParams = {
            from_name: document.getElementById('name').value,
            from_email: document.getElementById('email').value,
            subject: document.getElementById('subject').value,
            message: document.getElementById('message').value,
            to_email: 'nizeyimanaassouman9@gmail.com'
        };

        
        emailjs.send('service_lcfi22q', 'template_32oxg6m', templateParams)
            .then(function() {
                button.textContent = 'Message Sent!';
                document.getElementById('contactForm').reset();
                setTimeout(() => {
                    button.textContent = originalText;
                    button.disabled = false;
                }, 3000);
            }, function(error) {
                console.error('Error:', error);
                button.textContent = 'Error Sending';
                setTimeout(() => {
                    button.textContent = originalText;
                    button.disabled = false;
                }, 3000);
            });
    });
};
