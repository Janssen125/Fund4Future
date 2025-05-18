document.addEventListener('DOMContentLoaded', function () {
    const addFundDetailButton = document.getElementById('addFundDetail');
    const fundDetailsContainer = document.getElementById('fundDetailsContainer');
    let detailIndex = 1;

    addFundDetailButton.addEventListener('click', function () {
        const newDetail = document.createElement('div');
        newDetail.classList.add('fund-detail', 'mb-3' , 'show');
        newDetail.innerHTML = `
            <label for="fund_details[${detailIndex}][types]" class="form-label">Type</label>
            <select class="form-select" name="fund_details[${detailIndex}][types]" required>
                <option value="" disabled selected>Select Type</option>
                <option value="image">Image</option>
                <option value="video">Video</option>
            </select>

            <label for="fund_details[${detailIndex}][imageOrVideo]" class="form-label mt-2">Upload File</label>
            <input type="file" class="form-control" name="fund_details[${detailIndex}][imageOrVideo]" accept="image/*" onchange="previewImage(event, ${detailIndex})" required>

            <!-- Preview Section -->
            <div id="previewContainer${detailIndex}" class="mt-3 show"></div>
        `;
        fundDetailsContainer.appendChild(newDetail);
        detailIndex++;
    });
});

function previewImage(event, index) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById(`previewContainer${index}`);

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            previewContainer.innerHTML = `<img src="${e.target.result}" alt="Preview Image" class="img-thumbnail" style="max-width: 200px;">`;
        };
        reader.readAsDataURL(file);
    } else {
        previewContainer.innerHTML = '';
    }
}