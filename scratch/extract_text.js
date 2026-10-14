const fs = require('fs');
const path = require('path');

const files = [
  'nodes_0.BRHeUxat.js',
  'nodes_2.VWLQCu6w.js',
  'nodes_3.DjxwJ9SD.js',
  'chunks_CEa5BnN2.js',
  'chunks_DtS3CdNz.js',
  'chunks_DfGtvEyU.js'
];

let fullAnalysis = '';

for (const file of files) {
  const filePath = path.join(__dirname, file);
  if (!fs.existsSync(filePath)) continue;
  const content = fs.readFileSync(filePath, 'utf8');

  // Extract strings inside `...` or "..." or '...'
  // In Svelte compiled code, templates are usually inside `D('...')` or `D("...")` or `D(\`...\`)`
  // Also look for arrays/objects
  fullAnalysis += `\n\n==================== FILE: ${file} ====================\n`;
  
  // Find all template strings passed to D(...)
  const dMatches = content.match(/D\((['"`])([\s\S]*?)\1\)/g) || [];
  fullAnalysis += `--- D() TEMPLATES (${dMatches.length}) ---\n`;
  for (const m of dMatches) {
    fullAnalysis += m + '\n---\n';
  }

  // Find strings with Indonesian or key words
  const strings = content.match(/"([^"\\]|\\.)*"|'([^'\\]|\\.)*'/g) || [];
  const textStrings = strings.filter(s => {
    const val = s.slice(1, -1);
    return val.length > 10 && !val.startsWith('http') && !val.includes('{') && !val.includes(';');
  });

  fullAnalysis += `\n--- TEXT STRINGS (${textStrings.length}) ---\n`;
  fullAnalysis += Array.from(new Set(textStrings)).join('\n');
}

fs.writeFileSync(path.join(__dirname, 'extracted_content.txt'), fullAnalysis, 'utf8');
console.log('Saved extracted_content.txt');
