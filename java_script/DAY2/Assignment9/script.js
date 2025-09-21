var userinputs=prompt("Pls Enter a five number seprated by a space")
 let numbers=(userinputs.split(" ")).map(Number)
  var ascending=numbers.slice()
  var ascending= ascending.sort((a,b)=>a-b)
  var descending=numbers.slice()
   var descending= descending.sort((a,b)=>b-a)
   console.log(descending);
   
document.writeln(`you have entered the values of: ${numbers} <br> <br>`)
document.writeln(`your values after being sorted ascending: ${ascending} <br> <br>`)
document.writeln(`your values after being sorted descending: ${descending} <br> <br>`)
