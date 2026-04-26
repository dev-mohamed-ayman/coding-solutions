import * as pdfjsLib from './node_modules/pdfjs-dist/legacy/build/pdf.mjs';
import fs from 'fs';

async function extractText(pdfPath) {
    const data = new Uint8Array(fs.readFileSync(pdfPath));
    const loadingTask = pdfjsLib.getDocument({ 
        data,
        useNodeCanvas: false,
        disableFontFace: true
    });
    const pdf = await loadingTask.promise;
    let fullText = '';
    for (let i = 1; i <= pdf.numPages; i++) {
        const page = await pdf.getPage(i);
        const textContent = await page.getTextContent();
        const pageText = textContent.items.map(item => item.str).join(' ');
        fullText += pageText + '\n';
    }
    return fullText;
}

extractText('../coding website content.pdf').then(text => {
    fs.writeFileSync('pdf_text.txt', text);
    console.log('Done');
}).catch(err => {
    console.error(err);
});
