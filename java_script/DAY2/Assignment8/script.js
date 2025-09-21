var userinput = prompt("pls Ente a 3 number splice between them by space")
let numbers = userinput.split(" ").map(Number)
var n1 = numbers[0]
var n2 = numbers[1]
var n3 = numbers[2]
function sum() {
    var sum = 0
    sum = n1 + n2 + n3
    document.writeln(`<h2>sum of the 3 values ${n1}+${n2}+${n3} =${sum} </h2> <br> <br>`)
}
function profuct() {
    var product = 1
    product = n1 * n2 * n3
    document.writeln(`<h2>product of the 3 values ${n1}*${n2}*${n3} =${product} </h2> <br> <br>`)
}
function divide() {

    var divide = 1
    divide = (n1 / n2) / n3
    document.writeln(`<h2>division of the 3 values ${n1}/${n2}/${n3} =${divide} </h2>`)
}

sum()
profuct()
divide()
