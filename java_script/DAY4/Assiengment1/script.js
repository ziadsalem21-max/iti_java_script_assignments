let id = 0;
const form = document.getElementById("studentForm");
const studentBody = document.getElementById("studentBody");
const nameInput = document.getElementById("studentName");
const ageInput = document.getElementById("studentAge");
const nameError = document.getElementById("nameError");
const ageError = document.getElementById("ageError");

form.addEventListener("submit", function (e) {
  e.preventDefault(); // منع الريلود

  let name = nameInput.value.trim();
  let age = parseInt(ageInput.value);

  let valid = true;

  // التحقق من الاسم
  if (name.length < 3) {
    nameError.textContent = "Name must be at least 3 characters";
    valid = false;
  } else {
    nameError.textContent = "";
  }

  // التحقق من العمر
  if (isNaN(age) || age < 18) {
    ageError.textContent = "Age must be greater than 18";
    valid = false;
  } else {
    ageError.textContent = "";
  }

  if (!valid) return;

  id++;
  let tr = document.createElement("tr");
  tr.innerHTML = `
    <td>${id}</td>
    <td>${name}</td>
    <td>${age}</td>
    <td><a href="#" class="deleteBtn">Delete Student</a></td>
  `;

  // زرار الحذف
  tr.querySelector(".deleteBtn").addEventListener("click", function (e) {
    e.preventDefault();
    tr.remove();
  });

  studentBody.appendChild(tr);

  // تفريغ الحقول بعد الإضافة
  nameInput.value = "";
  ageInput.value = "";
});

