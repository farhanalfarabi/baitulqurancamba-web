const fs = require('fs');
const path = require('path');

const content = fs.readFileSync(path.join(__dirname, 'nodes_2.VWLQCu6w.js'), 'utf8');

// Look for data objects/arrays in Svelte code
// Let's dump matches of string literals or array literals
const parts = [];

// Regular expression to find blocks of text or string arrays
const stringRegex = /"([^"\\]|\\.)*"/g;
let match;
while ((match = stringRegex.exec(content)) !== null) {
  const str = JSON.parse(match[0]);
  if (str.length > 5 && !str.startsWith('../') && !str.startsWith('./')) {
    parts.push(str);
  }
}

fs.writeFileSync(path.join(__dirname, 'nodes_2_strings.json'), JSON.stringify(parts, null, 2), 'utf8');
console.log('Saved nodes_2_strings.json, count:', parts.length);
