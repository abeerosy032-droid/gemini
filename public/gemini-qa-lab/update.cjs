const fs = require('fs');

const question = `المشروع 14: لوحة إنفوجرافيك SVG تفاعلية
الوصف:
لوحة بيانات مرسومة بالكامل بـ SVG مع تفاعل وحركة.
ما يجب على النموذج إنجازه:
• Donut Chart: توزيع ميزانية بـ 5 فئات (SVG <circle> مع stroke-dasharray)
• Bar Chart: مقارنة أرقام شهرية بـ <rect> مع animate on scroll
• Line Chart: اتجاه نمو بـ <path> SVG مع gradient fill
• World Map SVG: تلوين 5 دول حسب قيمة مع tooltip عند hover
• Tooltip مُحرَّك يظهر عند hover على كل عنصر
• Legend تفاعلية: النقر على عنصر يُخفي/يُظهر البيانات المقابلة
المتطلبات التقنية:
• SVG خالص + Vanilla JS (بدون D3 أو أي library رسومية)
• <animate> أو CSS animation للحركة عند الدخول
• Accessible: <title> و<desc> داخل كل chart element
• Responsive: viewBox بدون width/height ثابتة`;

const answer = `لقد قمت بتنفيذ المشروع المطلوب بنجاح.

المشروع عبارة عن لوحة بيانات (Dashboard) مبنية بالكامل باستخدام **SVG** نقية مع **Vanilla JavaScript** و **CSS Animations**، بدون استخدام أي مكتبات خارجية (مثل D3.js).

**الميزات المنجزة:**
1. **Donut Chart**: رسم باستخدام \`<circle>\` وخصائص \`stroke-dasharray\` و \`stroke-dashoffset\`، مع Animation للدخول، و **Legend** تفاعلي (إخفاء/إظهار القطع عند النقر).
2. **Bar Chart**: رسم الأعمدة باستخدام \`<rect>\` مع تأثير حركة نمو رأسي عند الدخول (تغيير \`scaleY\` من الأسفل).
3. **Line Chart**: رسم بياني خطي (\`<path>\` للخط و \`<path>\` للمساحة المظللة تحته) باستخدام \`<linearGradient>\`، مع حركة رسم الخط وتأخير لظهور المساحة المظللة والنقاط (\`<circle>\`).
4. **World Map**: خريطة مبسطة مرسومة بمسارات SVG \`<path>\` مع التلوين، وإضافة تفاعل (hover effect).
5. **Tooltip ذكي**: Tooltip واحد يُستخدم لجميع العناصر (مربوط بخاصية \`data-tooltip\`)، يتتبع حركة الفأرة، مع معالجة حواف الشاشة لمنع خروج الـ Tooltip عن العرض (Viewport).
6. **الوصول (Accessibility) والتجاوب (Responsiveness)**: كل رسم بياني يحتوي على \`<title>\` و \`<desc>\`، ومصمم باستخدام \`viewBox\` فقط ليتجاوب مع أي حجم شاشة بسلاسة.

يمكنك الاطلاع على المشروع والمعاينة الحية عبر الرابط التالي:
[معاينة المشروع (المشروع 14 - إنفوجرافيك SVG)](http://34.136.31.84:8080/gemini-project14-viewer.html)

الرابط يحتوي على خيار لعرض الكود المصدري كاملاً وخيار للمعاينة المباشرة للتفاعلات.`;

const dataPath = '/home/abeerosy032/.openclaw/workspace/gemini_evaluation/Project1/public/gemini-qa-lab/data.json';
let data = [];

try {
    if (fs.existsSync(dataPath)) {
        const fileContent = fs.readFileSync(dataPath, 'utf8');
        if (fileContent.trim()) {
            data = JSON.parse(fileContent);
        }
    }
} catch (e) {
    console.error('Error reading data:', e);
}

const timestamp = new Date().toLocaleTimeString('ar-EG', { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true });

data.push({
    question: question,
    answer: answer,
    timestamp: timestamp
});

fs.writeFileSync(dataPath, JSON.stringify(data, null, 2));
console.log('Added question and answer successfully.');
