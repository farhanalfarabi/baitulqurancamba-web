const fs = require('fs');
const path = require('path');

function extractKTemplates(filename) {
  const content = fs.readFileSync(path.join(__dirname, filename), 'utf8');
  const results = [];
  
  // Find all k(`...`) or k('...') or k("...")
  // Note: template literals can span multiple lines
  const regex = /k\((`[\s\S]*?`|'[\s\S]*?'|"[\s\S]*?")\)/g;
  let match;
  while ((match = regex.exec(content)) !== null) {
    let raw = match[1];
    // remove surrounding quotes
    if (raw.startsWith('`') || raw.startsWith("'") || raw.startsWith('"')) {
      raw = raw.slice(1, -1);
    }
    results.push(raw);
  }
  return results;
}

const n0 = extractKTemplates('nodes_0.BRHeUxat.js');
const n2 = extractKTemplates('nodes_2.VWLQCu6w.js');
const n3 = extractKTemplates('nodes_3.DjxwJ9SD.js');
const ce = extractKTemplates('chunks_CEa5BnN2.js');

let output = '';
output += '=== NODES 0 (LAYOUT) ===\n' + n0.join('\n\n--- TEMPLATE ---\n\n');
output += '\n\n=== NODES 2 (HOME) ===\n' + n2.join('\n\n--- TEMPLATE ---\n\n');
output += '\n\n=== NODES 3 (GALERI) ===\n' + n3.join('\n\n--- TEMPLATE ---\n\n');
output += '\n\n=== CHUNKS CE (COMMON/NAV/FOOTER) ===\n' + ce.join('\n\n--- TEMPLATE ---\n\n');

fs.writeFileSync(path.join(__dirname, 'all_svelte_templates.html'), output, 'utf8');
console.log('Saved all_svelte_templates.html, length:', output.length);
