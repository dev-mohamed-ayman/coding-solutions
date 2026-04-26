const fs = require('fs');
const pdf = require('pdf-parse');

async function extractText(file) {
    const dataBuffer = fs.readFileSync(file);
    const data = await pdf(dataBuffer);
    console.log(`\n\n--- CONTENT OF ${file} ---\n\n`);
    console.log(data.text);
}

async function main() {
    await extractText('coding website content.pdf');
    await extractText('coding website content arabic.pdf');
}

main().catch(console.error);
