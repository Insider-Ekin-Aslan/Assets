const alfabe = `ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789:"'_-=?<>[] {}
\n`;

const minLength = 100;

function logAlfabetik() {
  const heap = Module.HEAPU8;
  let current = [];
  let startIndex = 0;

  for (let i = 0; i < heap.length; i++) {
    const ch = String.fromCharCode(heap[i]);

    if (alfabe.includes(ch)) {
      if (current.length === 0) startIndex = i;
      current.push(ch);
    } else {
      if (current.length >= minLength) {
        console.log(`${startIndex} - ${current.join("")} - text block`);
      }
      current = [];
    }
  }

  if (current.length >= minLength) {
    console.log(`${startIndex} - ${current.join("")} - text block`);
  }
}

logAlfabetik();
