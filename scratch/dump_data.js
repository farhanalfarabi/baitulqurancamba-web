const fs = require('fs');
const path = require('path');

const n2 = fs.readFileSync(path.join(__dirname, 'nodes_2.VWLQCu6w.js'), 'utf8');
const n3 = fs.readFileSync(path.join(__dirname, 'nodes_3.DjxwJ9SD.js'), 'utf8');

// Look for data arrays in n2 and n3
// Often structured like `[{title:...}]` or `[...name:...]` or `{name:...}`
fs.writeFileSync(path.join(__dirname, 'n2_dump.js'), n2, 'utf8');
fs.writeFileSync(path.join(__dirname, 'n3_dump.js'), n3, 'utf8');

// Let's search for arrays with objects
function findDataArrays(code) {
  const matches = code.match(/\[\{[^{}]*?:[^{}]*?\}\]/g) || [];
  return matches;
}

console.log('n2 length:', n2.length, 'n3 length:', n3.length);
