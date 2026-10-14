const fs = require('fs');
const path = require('path');

const strings = JSON.parse(fs.readFileSync(path.join(__dirname, 'nodes_2_strings.json'), 'utf8'));

// Filter out svg paths (starting with M, m, etc.), CSS class names, etc.
const readable = strings.filter(s => {
  if (s.startsWith('M') || s.startsWith('m') || s.startsWith('C') || s.startsWith('c')) {
    if (s.includes(' ') && s.split(' ').every(p => /^[0-9\.\-\,A-Za-z]+$/.test(p) && /\d/.test(p))) return false;
  }
  if (/^[a-z0-9\-:\/\[\]\.\_ ]+$/.test(s) && (s.includes('text-') || s.includes('bg-') || s.includes('flex') || s.includes('grid') || s.includes('px-') || s.includes('py-'))) {
    return false;
  }
  return s.length > 3;
});

fs.writeFileSync(path.join(__dirname, 'clean_readable_content.txt'), readable.join('\n---\n'), 'utf8');
console.log('Saved clean_readable_content.txt, count:', readable.length);
