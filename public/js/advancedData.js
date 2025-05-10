document.addEventListener('DOMContentLoaded', function () {
    const ktpInput = document.getElementById('ktp_img');
    const previewSection = document.getElementById('previewSection');
    const previewContent = document.getElementById('previewContent');

    ktpInput.addEventListener('change', function () {
        const file = this.files[0];

        if (file) {
            const fileReader = new FileReader();

            if (file.type === 'application/pdf') {
                previewContent.innerHTML = `<a href="#" target="_blank" id="pdfPreviewLink" class="btn btn-secondary">View PDF</a>`;
                fileReader.onload = function (e) {
                    const pdfPreviewLink = document.getElementById('pdfPreviewLink');
                    pdfPreviewLink.href = e.target.result;
                };
                fileReader.readAsDataURL(file);
            } else if (file.type.startsWith('image/')) {
                fileReader.onload = function (e) {
                    previewContent.innerHTML = `<img src="${e.target.result}" alt="KTP Preview" class="img-fluid" style="max-height: 300px;">`;
                };
                fileReader.readAsDataURL(file);
            } else {
                previewContent.innerHTML = `<p class="text-danger">Unsupported file type. Please upload an image or PDF.</p>`;
            }

            previewSection.style.display = 'block';
        } else {
            previewSection.style.display = 'none';
            previewContent.innerHTML = '';
        }
    });
});