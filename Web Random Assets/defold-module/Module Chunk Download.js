(async () => {
  const CHUNK_SIZE = 1024 * 1024 * 10; // 10 MB per chunk
  const heap = Module.HEAPU8;
  const totalSize = heap.length;
  const totalChunks = Math.ceil(totalSize / CHUNK_SIZE);

  console.log(`Toplam bellek: ${(totalSize / 1024 / 1024).toFixed(2)} MB`);
  console.log(`Toplam parça: ${totalChunks}`);

  for (let i = 0; i < totalChunks; i++) {
    const start = i * CHUNK_SIZE;
    const end = Math.min(start + CHUNK_SIZE, totalSize);
    const chunk = heap.slice(start, end);

    const blob = new Blob([chunk], { type: "application/octet-stream" });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = `heap_part_${i.toString().padStart(3, "0")}.bin`;
    a.click();
    URL.revokeObjectURL(url);

    console.log(`Chunk ${i + 1}/${totalChunks} indi`);

    await new Promise((r) => setTimeout(r, 500));
  }

  console.log("Heheheh done!");
})();
