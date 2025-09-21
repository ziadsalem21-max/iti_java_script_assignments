
const student = {
  name: "ziad",
  age: 22,
  grades: {
    math: 99,
    science: 98
  },
  contactinfo: {
    Email: "ziad.salem@gmail.com",
    phone: 1006029460
  }

}
function printObjectF(obj) {
  document.writeln(`<h2>Student Info:</h2>`);
  document.writeln(`<p><b>Name:</b> ${obj.name}</p>`);
  document.writeln(`<p><b>Age:</b> ${obj.age}</p>`);

  document.writeln(`<h3>Grades:</h3>`);
  document.writeln(`<p>Math: ${obj.grades.math}</p>`);
  document.writeln(`<p>Science: ${obj.grades.science}</p>`);

  document.writeln(`<h3>Contact Info:</h3>`);
  document.writeln(`<p>Email: ${obj.contactinfo.Email}</p>`);
  document.writeln(`<p>Phone: ${obj.contactinfo.phone}</p>`);
}

printObjectF(student);
