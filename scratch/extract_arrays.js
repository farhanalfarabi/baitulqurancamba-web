const fs = require('fs');
const path = require('path');

const n2 = fs.readFileSync(path.join(__dirname, 'nodes_2.VWLQCu6w.js'), 'utf8');
const n3 = fs.readFileSync(path.join(__dirname, 'nodes_3.DjxwJ9SD.js'), 'utf8');
const ce = fs.readFileSync(path.join(__dirname, 'chunks_CEa5BnN2.js'), 'utf8');

// Let's search for arrays containing objects: [{...}]
function extractArrayStructures(text, label) {
  console.log(`\n=== Analyzing ${label} ===`);
  // Regex to find arrays containing objects
  // In minified code: const something = [{name:"...", ...}, ...]
  const matches = text.match(/\[\{[^{}\[\]]*(?:\{[^{}\[\]]*\}[^{}\[\]]*)*\}\]/g) || [];
  console.log(`Found ${matches.length} array structures`);
  return matches;
}

const arr2 = extractArrayStructures(n2, 'NODES 2');
const arr3 = extractArrayStructures(n3, 'NODES 3');
const arrCe = extractArrayStructures(ce, 'CHUNKS CE');

fs.writeFileSync(path.join(__dirname, 'arrays_extracted.json'), JSON.stringify({
  nodes2: arr2,
  nodes3: arr3,
  chunksCe: arrCe
}, null, 2), 'utf8');

console.log('Saved arrays_extracted.json');
