function validateForm() {
  // ดึงค่าจากฟิลด์ต่าง ๆ ของฟอร์ม
  let assetType = document.getElementById("AssetType").value;
  let location = document.getElementById("Location").value;
  let size = document.getElementById("Size").value;
  let value = document.getElementById("Value").value;

  let errorMessages = "";

  // ตรวจสอบ Asset Type ไม่ให้เป็นค่าว่าง
  if (assetType.trim() === "") {
      errorMessages += "Asset Type is required.<br>";
  }

  // ตรวจสอบ Location ไม่ให้เป็นค่าว่าง
  if (location.trim() === "") {
      errorMessages += "Location is required.<br>";
  }

  // ตรวจสอบ Size ต้องเป็นตัวเลขมากกว่า 0
  if (size <= 0) {
      errorMessages += "Size must be greater than 0.<br>";
  }

  // ตรวจสอบ Value ต้องเป็นตัวเลขมากกว่า 0
  if (value <= 0) {
      errorMessages += "Value must be greater than 0.<br>";
  }

  // แสดงข้อความผิดพลาดหากมีข้อผิดพลาด
  if (errorMessages !== "") {
      document.getElementById("errorMessages").innerHTML = errorMessages;
      return false; // ป้องกันไม่ให้ส่งฟอร์มหากมีข้อผิดพลาด
  }

  // หากไม่มีข้อผิดพลาด ให้ส่งฟอร์มตามปกติ
  return true;
}
