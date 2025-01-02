// ฟังก์ชันสำหรับเพิ่มทรัพย์สิน
function addAsset() {
  const assetData = {
      AssetType: document.getElementById('AssetType').value,
      Location: document.getElementById('Location').value,
      Size: document.getElementById('Size').value,
      Value: document.getElementById('Value').value
  };

  fetch('http://localhost/PropertyManagementSystem/add_asset.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify(assetData)
  })
  .then(response => response.json())
  .then(data => {
      console.log('Success:', data);
      // รีเฟรชรายการทรัพย์สิน
      fetchAssets(); // เรียกใช้ฟังก์ชันดึงข้อมูลใหม่
  })
  .catch((error) => {
      console.error('Error:', error);
  });
}
