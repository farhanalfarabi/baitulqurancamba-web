const fs = require('fs');
const https = require('https');
const path = require('path');

function fetchUrl(url) {
  return new Promise((resolve, reject) => {
    https.get(url, { headers: { 'User-Agent': 'Mozilla/5.0' } }, (res) => {
      let data = '';
      res.on('data', (chunk) => data += chunk);
      res.on('end', () => resolve(data));
    }).on('error', reject);
  });
}

async function main() {
  const base = 'https://baitulqurancamba.com/_app/immutable/';
  const files = [
    'nodes/0.BRHeUxat.js',
    'nodes/2.VWLQCu6w.js',
    'nodes/3.DjxwJ9SD.js',
    'chunks/CEa5BnN2.js',
    'chunks/DtS3CdNz.js',
    'chunks/DfGtvEyU.js',
    'chunks/845gDevP.js',
    'chunks/CIkz_Avz.js'
  ];

  for (const f of files) {
    try {
      console.log(`Fetching ${f}...`);
      const content = await fetchUrl(base + f);
      const safeName = f.replace(/[\/\\]/g, '_');
      fs.writeFileSync(path.join(__dirname, safeName), content, 'utf8');
      console.log(`Saved ${safeName} (${content.length} bytes)`);
    } catch (err) {
      console.error(`Error fetching ${f}:`, err.message);
    }
  }
}

main();
