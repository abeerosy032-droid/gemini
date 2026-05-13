// Custom Cursor Logic
const cursorDot = document.querySelector('.cursor-dot');
const cursorOutline = document.querySelector('.cursor-outline');

let mouseX = 0;
let mouseY = 0;
let outlineX = 0;
let outlineY = 0;

window.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
    
    // Dot moves instantly
    cursorDot.style.left = `${mouseX}px`;
    cursorDot.style.top = `${mouseY}px`;
});

// Animation loop for trailing outline (Linear Interpolation)
function animateCursor() {
    let dx = mouseX - outlineX;
    let dy = mouseY - outlineY;
    
    outlineX += dx * 0.15; // smooth factor
    outlineY += dy * 0.15;
    
    cursorOutline.style.left = `${outlineX}px`;
    cursorOutline.style.top = `${outlineY}px`;
    
    requestAnimationFrame(animateCursor);
}
animateCursor();

// Interactive element hover effects for cursor
const interactiveElements = document.querySelectorAll('a, button, input, textarea, .project-card');

interactiveElements.forEach(el => {
    el.addEventListener('mouseenter', () => {
        cursorOutline.style.width = '60px';
        cursorOutline.style.height = '60px';
        cursorOutline.style.backgroundColor = 'rgba(0, 242, 254, 0.1)';
    });
    
    el.addEventListener('mouseleave', () => {
        cursorOutline.style.width = '40px';
        cursorOutline.style.height = '40px';
        cursorOutline.style.backgroundColor = 'transparent';
    });
});

// Navbar Scrolled State
const nav = document.querySelector('nav');
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        nav.classList.add('scrolled');
    } else {
        nav.classList.remove('scrolled');
    }
});

// Form Validation Logic
const form = document.getElementById('contact-form');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const messageInput = document.getElementById('message');
const submitBtn = document.querySelector('.submit-btn');
const formSuccess = document.querySelector('.form-success');

function showError(input, message) {
    const formGroup = input.parentElement;
    formGroup.classList.add('error');
    if(message) {
        formGroup.querySelector('.error-message').innerText = message;
    }
}

function clearError(input) {
    const formGroup = input.parentElement;
    formGroup.classList.remove('error');
}

function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

form.addEventListener('submit', (e) => {
    e.preventDefault();
    let isValid = true;

    // Validate Name
    if (nameInput.value.trim() === '') {
        showError(nameInput, 'Name is required');
        isValid = false;
    } else {
        clearError(nameInput);
    }

    // Validate Email
    if (emailInput.value.trim() === '') {
        showError(emailInput, 'Email is required');
        isValid = false;
    } else if (!validateEmail(emailInput.value.trim())) {
        showError(emailInput, 'Please enter a valid email');
        isValid = false;
    } else {
        clearError(emailInput);
    }

    // Validate Message
    if (messageInput.value.trim() === '') {
        showError(messageInput, 'Message is required');
        isValid = false;
    } else {
        clearError(messageInput);
    }

    // Submit Simulation
    if (isValid) {
        submitBtn.classList.add('loading');
        submitBtn.innerText = 'Sending...';
        
        // Append spinner back since we changed innerText
        const spinner = document.createElement('span');
        spinner.className = 'spinner';
        spinner.style.display = 'block';
        submitBtn.appendChild(spinner);

        setTimeout(() => {
            submitBtn.classList.remove('loading');
            submitBtn.innerText = 'Send Message';
            form.reset();
            formSuccess.style.display = 'block';
            
            setTimeout(() => {
                formSuccess.style.display = 'none';
            }, 3000);
        }, 1500);
    }
});

// Clear errors on input
[nameInput, emailInput, messageInput].forEach(input => {
    input.addEventListener('input', () => clearError(input));
});
