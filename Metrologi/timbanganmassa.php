<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Timbangan Massa</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .form-container {
      display: none; /* Hidden by default */
      margin-top: 20px;
    }
    .form-container.active {
      display: block; /* Show when active */
    }
    .unit-form {
      border: 1px solid #ced4da;
      padding: 15px;
      margin-bottom: 10px;
      border-radius: 5px;
      position: relative; /* For positioning the cancel button */
    }
    .cancel-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #dc3545;
      border: none;
      color: white;
      padding: 5px 10px;
      border-radius: 5px;
      cursor: pointer;
    }
    .add-unit-btn {
      margin-top: 10px;
    }
    .action-buttons {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 20px;
    }

    /* Notification Styles */
    .notification-container {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1000;
    }
    .notification {
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: none;
      animation: slide-in 0.5s ease-out;
    }
    .success-notification {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    .error-notification {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
    @keyframes slide-in {
      from {
        transform: translateX(100%);
      }
      to {
        transform: translateX(0);
      }
    }
  </style>
</head>
<body>

  <div class="container mt-5">
    <h1>Permohonan Timbangan Massa</h1>

    <!-- Notification Container -->
    <div class="notification-container" id="notification-container"></div>

    <!-- Input for Applicant Details -->
    <div class="mb-3">
      <label for="applicant-name" class="form-label">Nama Pemohon</label>
      <input type="text" class="form-control" id="applicant-name" placeholder="Masukkan nama Anda">
    </div>
    <div class="mb-3">
      <label for="applicant-address" class="form-label">Alamat</label>
      <textarea class="form-control" id="applicant-address" rows="2" placeholder="Masukkan alamat Anda"></textarea>
    </div>
    <div class="mb-3">
      <label for="applicant-phone" class="form-label">No. Telepon</label>
      <input type="text" class="form-control" id="applicant-phone" placeholder="Masukkan nomor telepon Anda">
    </div>

    <!-- Dropdown for Scale Type -->
    <div class="mb-3">
      <label for="scale-type" class="form-label">Pilih Jenis Timbangan</label>
      <select class="form-select" id="scale-type">
        <option value="">-- Pilih Jenis Timbangan --</option>
        <option value="electronic">Timbangan Elektronik</option>
        <option value="spring">Timbangan Pegas</option>
      </select>
    </div>

    <!-- Form for Electronic Scale -->
    <div class="form-container" id="form-electronic">
      <h3>Form Timbangan Elektronik</h3>
      <div id="units-container">
        <!-- Initial Unit Form -->
        <div class="unit-form">
          <button class="cancel-btn" onclick="removeUnit(this)">×</button>
          <h5>Unit Timbangan 1</h5>
          <div class="mb-3">
            <label for="type-1" class="form-label">Jenis Timbangan</label>
            <select class="form-select" id="type-1" disabled>
              <option value="electronic">Timbangan Elektronik</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="merk-1" class="form-label">Merk/Buatan</label>
            <input type="text" class="form-control" id="merk-1" placeholder="Masukkan merk/buatan timbangan">
          </div>
          <div class="mb-3">
            <label for="model-1" class="form-label">Model/Tipe</label>
            <input type="text" class="form-control" id="model-1" placeholder="Masukkan model/tipe timbangan">
          </div>
          <div class="mb-3">
            <label for="serial-number-1" class="form-label">Nomor Seri</label>
            <input type="text" class="form-control" id="serial-number-1" placeholder="Masukkan nomor seri timbangan">
          </div>
          <div class="mb-3">
            <label for="capacity-1" class="form-label">Kapasitas/Daya Baca</label>
            <input type="text" class="form-control" id="capacity-1" placeholder="Masukkan kapasitas/daya baca timbangan">
          </div>
        </div>
      </div>
      <div class="action-buttons">
        <button type="button" class="btn btn-primary add-unit-btn" onclick="addUnit()">+ Tambah Unit</button>
        <button type="button" class="btn btn-success" onclick="submitApplication()">Kirim Permohonan</button>
      </div>
    </div>

    <!-- Form for Spring Scale -->
    <div class="form-container" id="form-spring">
      <h3>Form Timbangan Pegas</h3>
      <div id="units-container">
        <!-- Initial Unit Form -->
        <div class="unit-form">
          <button class="cancel-btn" onclick="removeUnit(this)">×</button>
          <h5>Unit Timbangan 1</h5>
          <div class="mb-3">
            <label for="type-1" class="form-label">Jenis Timbangan</label>
            <select class="form-select" id="type-1" disabled>
              <option value="spring">Timbangan Pegas</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="merk-spring-1" class="form-label">Merk/Buatan</label>
            <input type="text" class="form-control" id="merk-spring-1" placeholder="Masukkan merk/buatan timbangan">
          </div>
          <div class="mb-3">
            <label for="model-spring-1" class="form-label">Model/Tipe</label>
            <input type="text" class="form-control" id="model-spring-1" placeholder="Masukkan model/tipe timbangan">
          </div>
          <div class="mb-3">
            <label for="serial-number-spring-1" class="form-label">Nomor Seri</label>
            <input type="text" class="form-control" id="serial-number-spring-1" placeholder="Masukkan nomor seri timbangan">
          </div>
          <div class="mb-3">
            <label for="capacity-spring-1" class="form-label">Kapasitas/Daya Baca</label>
            <input type="text" class="form-control" id="capacity-spring-1" placeholder="Masukkan kapasitas/daya baca timbangan">
          </div>
        </div>
      </div>
      <div class="action-buttons">
        <button type="button" class="btn btn-primary add-unit-btn" onclick="addUnit()">+ Tambah Unit</button>
        <button type="button" class="btn btn-success" onclick="submitApplication()">Kirim Permohonan</button>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // JavaScript to toggle forms based on dropdown selection
    document.getElementById('scale-type').addEventListener('change', function() {
      const selectedValue = this.value;

      // Hide all forms
      document.getElementById('form-electronic').classList.remove('active');
      document.getElementById('form-spring').classList.remove('active');

      // Show the selected form
      if (selectedValue === 'electronic') {
        document.getElementById('form-electronic').classList.add('active');
      } else if (selectedValue === 'spring') {
        document.getElementById('form-spring').classList.add('active');
      }
    });

    // Function to add new unit with scale type selection
    function addUnit() {
      const unitContainer = document.querySelector('.form-container.active #units-container');
      const existingUnits = unitContainer.querySelectorAll('.unit-form');
      const newUnitNumber = existingUnits.length + 1;

      const newUnit = `
        <div class="unit-form">
          <button class="cancel-btn" onclick="removeUnit(this)">×</button>
          <h5>Unit Timbangan ${newUnitNumber}</h5>
          <div class="mb-3">
            <label for="type-${newUnitNumber}" class="form-label">Jenis Timbangan</label>
            <select class="form-select" id="type-${newUnitNumber}">
              <option value="electronic">Timbangan Elektronik</option>
              <option value="spring">Timbangan Pegas</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="merk-${newUnitNumber}" class="form-label">Merk/Buatan</label>
            <input type="text" class="form-control" id="merk-${newUnitNumber}" placeholder="Masukkan merk/buatan timbangan">
          </div>
          <div class="mb-3">
            <label for="model-${newUnitNumber}" class="form-label">Model/Tipe</label>
            <input type="text" class="form-control" id="model-${newUnitNumber}" placeholder="Masukkan model/tipe timbangan">
          </div>
          <div class="mb-3">
            <label for="serial-number-${newUnitNumber}" class="form-label">Nomor Seri</label>
            <input type="text" class="form-control" id="serial-number-${newUnitNumber}" placeholder="Masukkan nomor seri timbangan">
          </div>
          <div class="mb-3">
            <label for="capacity-${newUnitNumber}" class="form-label">Kapasitas/Daya Baca</label>
            <input type="text" class="form-control" id="capacity-${newUnitNumber}" placeholder="Masukkan kapasitas/daya baca timbangan">
          </div>
        </div>
      `;
      unitContainer.insertAdjacentHTML('beforeend', newUnit);
    }

    // Function to remove a unit and renumber remaining units
    function removeUnit(button) {
      const unitForm = button.closest('.unit-form'); // Find the parent unit form
      const unitTitle = unitForm.querySelector('h5').textContent; // Get the unit title
      const unitContainer = unitForm.parentElement; // Get the container of all units
      unitForm.remove(); // Remove the unit form from the DOM

      // Renumber all remaining units
      const remainingUnits = unitContainer.querySelectorAll('.unit-form');
      remainingUnits.forEach((unit, index) => {
        const unitTitle = unit.querySelector('h5');
        unitTitle.textContent = `Unit Timbangan ${index + 1}`;
      });

      // Show notification
      showNotification(`${unitTitle} telah terhapus`, 'success');
    }

    // Function to handle application submission
    function submitApplication() {
      const applicantName = document.getElementById('applicant-name').value;
      const unitsContainer = document.querySelector('.form-container.active #units-container');
      const totalUnits = unitsContainer.querySelectorAll('.unit-form').length;

      if (!applicantName || totalUnits === 0) {
        showNotification('Mohon lengkapi data pemohon dan tambahkan minimal satu unit.', 'error');
        return;
      }

      // Show success notification
      showNotification(`Permohonan dari ${applicantName} dengan ${totalUnits} unit berhasil dikirim!`, 'success');
    }

    // Function to show notifications
    function showNotification(message, type) {
      const notificationContainer = document.getElementById('notification-container');

      // Create a new notification element
      const notification = document.createElement('div');
      notification.className = `notification ${type === 'success' ? 'success-notification' : 'error-notification'}`;
      notification.textContent = message;

      // Make the notification visible
      notification.style.display = 'block';

      // Append the notification to the container
      notificationContainer.appendChild(notification);

      // Automatically remove the notification after 3 seconds
      setTimeout(() => {
        notification.remove();
      }, 3000);
    }
  </script>

</body>
</html>