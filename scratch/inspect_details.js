const fs = require('fs');
const path = require('path');

const n2 = fs.readFileSync(path.join(__dirname, 'nodes_2.VWLQCu6w.js'), 'utf8');
const n3 = fs.readFileSync(path.join(__dirname, 'nodes_3.DjxwJ9SD.js'), 'utf8');
const ce = fs.readFileSync(path.join(__dirname, 'chunks_CEa5BnN2.js'), 'utf8');

function extractVariable(code, varName, prefix) {
  const re = new RegExp(prefix + '\\[([\\s\\S]*?)\\];', 'g');
  let match = re.exec(code);
  return match ? match[0] : null;
}

// Let's print out all images referenced in N2 and N3
function getImages(code, label) {
  const re = /"(\.\.\/assets\/[^"]+)"/g;
  const list = [];
  let m;
  while ((m = re.exec(code)) !== null) {
    list.push(m[1]);
  }
  return list;
}

console.log('N2 assets:', getImages(n2, 'N2'));
console.log('N3 assets:', getImages(n3, 'N3'));

// Let's print the entire galeri array from N3
const galeriMatch = n3.match(/\[\{src:[\s\S]*?\}\];/);
if (galeriMatch) {
  fs.writeFileSync(path.join(__dirname, 'galeri_full.txt'), galeriMatch[0], 'utf8');
  console.log('Saved galeri_full.txt, length:', galeriMatch[0].length);
}

// Check Google maps link in N2
const mapsMatch = n2.match(/https:\/\/(www\.)?google\.com\/maps[^\s"']+/g) || n2.match(/https:\/\/maps\.app\.goo\.gl[^\s"']+/g) || n2.match(/https:\/\/[^"']*maps[^"']*/g);
console.log('Maps links:', mapsMatch);
