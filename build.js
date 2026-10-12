// Node.js script to bundle components into components.js and/or dist/index.html
const fs = require('fs');
const path = require('path');

const componentsDir = path.join(__dirname, 'components');
const files = fs.readdirSync(componentsDir).filter(f => f.endsWith('.html'));

const components = {};

files.forEach(file => {
  const name = path.basename(file, '.html');
  const content = fs.readFileSync(path.join(componentsDir, file), 'utf-8');
  components[name] = content;
});

// Write components.js for instant zero-CORS browser loading
const jsContent = `/**
 * Pre-compiled Krackerz Component Registry
 * Generated automatically from components/*.html
 */
window.KRACKERZ_COMPONENTS = ${JSON.stringify(components, null, 2)};
`;

fs.writeFileSync(path.join(__dirname, 'assets', 'js', 'components.js'), jsContent);
console.log('Successfully generated assets/js/components.js from', files.length, 'components.');
