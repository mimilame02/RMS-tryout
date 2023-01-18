const typeWriter = document.getElementById('type-text');
const text = 'Black fox running on the road.';

typeWriter.innerHTML = text;
typeWriter.style.setProperty('--characters', text.length);