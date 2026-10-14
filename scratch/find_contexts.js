const fs = require('fs');
const path = require('path');

const n2 = fs.readFileSync(path.join(__dirname, 'nodes_2.VWLQCu6w.js'), 'utf8');
const n3 = fs.readFileSync(path.join(__dirname, 'nodes_3.DjxwJ9SD.js'), 'utf8');
const ce = fs.readFileSync(path.join(__dirname, 'chunks_CEa5BnN2.js'), 'utf8');

function findContexts(content, terms) {
  for (const term of terms) {
    let idx = 0;
    while ((idx = content.indexOf(term, idx)) !== -1) {
      console.log(`\n--- Match for "${term}" at index ${idx} ---`);
      console.log(content.substring(Math.max(0, idx - 150), Math.min(content.length, idx + 250)));
      idx += term.length;
    }
  }
}

console.log('=== TOKOH & FASILITAS IN N2 ===');
findContexts(n2, ['tokoh', 'fasilitas', 'Ustadz', 'KH', 'K.H', 'Pembina', 'Direktur', 'Pimpinan', 'Ketua', 'maps', 'google']);

console.log('=== GALERI IN N3 ===');
findContexts(n3, ['galeri', 'foto', 'title', 'kegiatan', 'img', 'assets']);
