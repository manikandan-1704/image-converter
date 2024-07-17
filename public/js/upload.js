document.addEventListener('DOMContentLoaded', function() {
    const uploadButton = document.querySelector('.upload-button');

    if (uploadButton) {
        uploadButton.addEventListener('click', function() {

            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/*'; 
            fileInput.click();

            fileInput.addEventListener('change', function() {
                const file = fileInput.files[0];
                if (file) {
                    console.log('Selected file:', file);

                    const formData = new FormData();
                    formData.append('image', file);

                    fetch('/api/upload', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Upload response:', data);
                        
                        const uploadBox = document.querySelector('.upload-box');
                        uploadBox.innerHTML = `
                            <h2>Image Uploaded</h2>
                            <p class="mb-4">File name: ${file.name}</p>
                            <input type="hidden" id="imagePath" value="${data.image_path}">
                            <div class="form-group">
                                <label for="conversionFormat">Convert to:</label>
                                <select id="conversionFormat" class="form-control">
                                    <option value="jpeg">JPG</option>
                                    <option value="png">PNG</option>
                                    <option value="gif">GIF</option>
                                    <option value="webp">WebP</option>
                                    <option value="avif">AVIF</option>
                                    <option value="bmp">BMP</option>
                                </select>
                            </div>
                            <button class="btn btn-success convert-button">Convert</button>
                            <div id="loader" style="display: none;" class="text-center mt-3">
                                <img src="/images/loader.gif" alt="Loading..." style="width: 50px; height: 50px;">
                            </div>
                        `;

                        const convertButton = document.querySelector('.convert-button');
                        convertButton.addEventListener('click', function() {
                            const selectedFormat = document.getElementById('conversionFormat').value;
                            const imagePath = document.getElementById('imagePath').value;
                            console.log('Selected format:', selectedFormat);

                            const loader = document.getElementById('loader');
                            loader.style.display = 'block';

                            const convertFormData = new FormData();
                            convertFormData.append('image_path', imagePath);
                            convertFormData.append('format', selectedFormat);

                            fetch('/api/convert', {
                                method: 'POST',
                                body: convertFormData
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log('Convert response:', data);

                                loader.style.display = 'none';
                                
                                uploadBox.innerHTML = `
                                    <div class="text-center mb-4">
                                        <img src="/images/green-tick.png" class="rounded-circle" style="width: 100px; height: 100px;" alt="Green Tick">
                                    </div>
                                    <h2>Image Successfully Converted</h2>
                                    <p class="mb-4"><i class="fas fa-check-circle"></i> File name: ${data.converted_image_path.split('/').pop()}</p>
                                    <a href="/storage/${data.converted_image_path}" class="btn btn-primary" download>Download</a>
                                    <button class="btn btn-secondary upload-more-button">Upload More</button>
                                `;

                                const uploadMoreButton = document.querySelector('.upload-more-button');
                                uploadMoreButton.addEventListener('click', function() {
                                    window.location.href = '/';
                                });
                            })
                            .catch(error => {
                                console.error('Error converting image:', error);

                                loader.style.display = 'none';

                            });
                        });
                    })
                    .catch(error => {
                        console.error('Error uploading image:', error);
                    });
                }
            });
        });
    }
});
