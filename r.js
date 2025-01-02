// ดึงข้อมูลทรัพย์สินจาก API
fetch('http://localhost/PropertyManagementSystem/fetch_assets.php')
    .then(response => response.json())
    .then(data => {
        // แสดงผลข้อมูลทรัพย์สินใน Frontend
        const assetsList = document.getElementById('assets-list');
        assetsList.innerHTML = ''; // ล้างข้อมูลเก่า

        data.forEach(asset => {
            const assetItem = document.createElement('div');
            assetItem.textContent = `${asset.AssetType} - ${asset.Location} - ${asset.Size} sqm - $${asset.Value}`;
            assetsList.appendChild(assetItem);
        });
    })
    .catch(error => console.error('Error fetching assets:', error));
