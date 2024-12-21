function calculateEulAndN() {
    const p = document.getElementById("p").value;
    const q = document.getElementById("q").value;
    const n = document.getElementById("n").value;
    const eul = document.getElementById("eul").value;
    const url = "http://localhost/calculateEulAndN" + "?" + new URLSearchParams({ p: p, q: q });
    const json = getData(url);
}

function calculateE() {
    const eul = document.getElementById("eul").value;
    const url = "http://localhost/calculateE" + "?" + new URLSearchParams({ eul: eul });
    const json = getData(url);
}

function calculateD() {
    const eul = document.getElementById("eul").value;
    const e = document.getElementById("e").value;
    const d = document.getElementById("d").value;
    const url = "http://localhost/calculateD" + "?" + new URLSearchParams({ eul: eul, e: e });
    const json = getData(url);
}

function encryptM() {
    const c = document.getElementById("c").value;
    const m = document.getElementById("m").value;
    const url = "http://localhost/encryptM" + "?" + new URLSearchParams({ c: c, m: m });
    const json = getData(url);
}

function decryptC() {
    const c = document.getElementById("c").value;
    const m = document.getElementById("m").value;
    const url = "http://localhost/decryptC" + "?" + new URLSearchParams({ c: c, m: m });
    const json = getData(url);
}

async function getData(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) {
          throw new Error(`Response status: ${response.status}`);
        }
    
        const json = await response.json();
        console.log(json);
        return(json);
      } catch (error) {
        console.error(error.message);
      }
}