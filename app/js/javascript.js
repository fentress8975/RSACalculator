async function calculateEulAndN() {
    const p = document.getElementById("p");
    const q = document.getElementById("q");
    const n = document.getElementById("n");
    const eul = document.getElementById("eul");
    const url = "http://localhost/calculateEulAndN" + "?" + new URLSearchParams({ p: p.value, q: q.value });
    const data = await getData(url);
    eul.value = data.eul;
    n.value = data.n;
}

async function calculateE() {
    const eul = document.getElementById("eul");
    const e = document.getElementById("e");
    const url = "http://localhost/calculateE" + "?" + new URLSearchParams({ eul: eul.value });
    const data = await getData(url);
    e.value = data.e;
}

async function calculateD() {
    const eul = document.getElementById("eul");
    const e = document.getElementById("e");
    const d = document.getElementById("d");
    const url = "http://localhost/calculateD" + "?" + new URLSearchParams({ eul: eul.value, e: e.value });
    const data = await getData(url);
    d.value = data.d;
}

async function encryptM() {
    const c = document.getElementById("c");
    const m = document.getElementById("m");
    const url = "http://localhost/encryptM" + "?" + new URLSearchParams({ c: c.value, m: m.value });
    const data = await getData(url);
    c.value = data.c;
}

async function decryptC() {
    const c = document.getElementById("c");
    const m = document.getElementById("m");
    const url = "http://localhost/decryptC" + "?" + new URLSearchParams({ c: c.value, m: m.value });
    const data = await getData(url);
    m.value = data.m;
}

async function getData(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }

        const result = await response.json();
        return result;
    } catch (error) {
        console.error(error.message);
    }
}