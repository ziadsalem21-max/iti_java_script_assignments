let userinput= prompt("pls enter the series of number sepraded by space")
let numbers= userinput.split(" ").map(Number)
const minValue = Math.min(...numbers);
const maxValue = Math.max(...numbers);
 var secondL=Infinity;
 var secondG=-Infinity;
function secondLowestGreatestF(arr){ 
    for(i=0;i<arr.length;i++){
        let num=arr[i]
        if(num>minValue&& num<secondL){
            secondL=num
        }
        if(num<maxValue && num >secondG){
            secondG=num
        }
    }
}
secondLowestGreatestF(numbers)

document.writeln(`<h2>the series have you entered ${numbers}</h2> <br><br>`)
document.writeln((secondL!==Infinity)?`<h2>the second Lowest value is ${secondL}</h2> <br><br>`:`NOt availabel`)
document.writeln((secondL!==-Infinity)?`<h2>the second greatest value is ${secondG}</h2> <br><br>`:`NOt availabel`)