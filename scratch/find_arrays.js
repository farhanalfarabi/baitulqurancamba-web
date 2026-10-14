const fs = require('fs');
const path = require('path');

const n2 = fs.readFileSync(path.join(__dirname, 'nodes_2.VWLQCu6w.js'), 'utf8');
const n3 = fs.readFileSync(path.join(__dirname, 'nodes_3.DjxwJ9SD.js'), 'utf8');

// Find all object or array declarations
// In JS, variables might be declared like `const something = [...]` or `var a=[{...}]`
// Let's search for `=[{` or `: [{`
function printArrayAssignments(code, label) {
  console.log(`\n=== Array assignments in ${label} ===`);
  const regex = /([a-zA-Z0-9_$]+)\s*=\s*(\[\s*\{[\s\S]*?\}\s*\])/g;
  let match;
  while ((match = regex.exec(code)) !== null) {
    console.log(`Variable: ${match[1]}, Length: ${match[2].length}`);
    try {
      // Evaluate or print
      fs.writeFileSync(path.join(__dirname, `${label}_${match[1]}.json`), match[2]);
    } catch(e) {}
    console.log(match[2].substring(0, 500) + '...\n');
  }
}

printArrayAssignments(n2, 'N2');
printArrayAssignments(n3, 'N3');
